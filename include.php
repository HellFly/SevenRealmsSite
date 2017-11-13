<?php
if (!file_exists('config.php')) {
	copy('config.php.example', 'config.php');
}
require_once('config.php');

$DB = mysqli_connect($DBADDRESS, $DBUSERNAME, $DBPASSWORD, $DBNAME);

$LOGGEDIN = false;

$USERID = 0;
$ISADMIN = false;
$USERNAME = '';
$USERREALNAME = '';

$PAGE = 'index';
$SHOW_JUMBOTRON = true;

session_start();

function get_datetime() {
	return date('Y-m-d H:i:s');
}

function get_modifier($score) {
	if ($score >= 10) {
		$score -= 10;
		return floor($score/2);
	}
	else {
		$rest = 10 - $score;
		return -ceil($rest/2);
	}
}

function html_mail($to, $subject, $header, $message) {
	// To send HTML mail, the Content-type header must be set
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=ISO-8859-1';

	// Additional headers
	$headers[] = 'From: Seven Realms <seven@sevenrealmsgame.com>';
	$headers[] = 'Reply-To: '. $to;
	$headers[] = 'X-Mailer: PHP/' . phpversion();

	$html = file_get_contents('template/mail_template.html');
	$html = str_replace('{{header}}', $header, $html);
	$html = str_replace('{{message}}', $message, $html);

	// Mail it
	mail($to, $subject, $html, implode("\r\n", $headers));
}

if (isset($_GET['hide'])) {
	setcookie('jumbotron', 1);
	$SHOW_JUMBOTRON = false;
}
if (isset($_COOKIE['jumbotron'])) {
	$SHOW_JUMBOTRON = false;
}

if (isset($_GET['page'])) {
	$PAGE = $_GET['page'];
}

if (isset($_GET['log_out'])) {
	unset($_SESSION);
	session_destroy();
	header('Refresh: 0; url=' . $_SERVER['PHP_SELF']);
	exit();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$LOGGEDIN = true;
	$USERID = $_SESSION['userid'];
	$ISADMIN = $_SESSION['admin'];
	$USERNAME = $_SESSION['username'];
	$USERREALNAME = $_SESSION['name'];
}

if (isset($_POST['username']) && isset($_POST['password'])) {
	$name = $_POST['username'];
	$pass = $_POST['password'];

	$pass = md5($PASSWORDSALT . $pass);

	$result = mysqli_query($DB, 'SELECT * FROM user WHERE username=\'' . $name . '\' AND password=\'' . $pass . '\' AND activated=1;');
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$LOGGEDIN = true;
		$USERID = $row['id'];
		$ISADMIN = $row['admin'];
		$USERNAME = $row['username'];
		$USERREALNAME = $row['name'];

		$_SESSION['loggedin'] = true;
		$_SESSION['userid'] = $USERID;
		$_SESSION['admin'] = $ISADMIN;
		$_SESSION['username'] = $USERNAME;
		$_SESSION['name'] = $USERREALNAME;
	}
}

if (isset($_GET['activate'])) {
	$code = $_GET['activate'];
	$query = 'SELECT * FROM user WHERE activated=0 AND md5(CONCAT(\'' . $PASSWORDSALT . '\', `email`, `username`))=\'' . $code . '\';';
	$result = mysqli_query($DB, $query);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$query = 'UPDATE user SET activated=\'1\' WHERE id=\'' . $row['id'] . '\';';
		$result = mysqli_query($DB, $query);
		if ($result) {
			$message = 'Your account has been activated. You can now log in.';
		}
		else {
			$warning = mysqli_error($DB);
		}
	}
	else {
		$warning = 'Error activating account.';
	}
}
?>
