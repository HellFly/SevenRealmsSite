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

	$result = mysqli_query($DB, 'SELECT * FROM user WHERE username=\'' . $name . '\' AND password=\'' . $pass . '\';');
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
?>
