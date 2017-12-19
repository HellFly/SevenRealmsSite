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

// http://php.net/manual/en/function.nl2br.php
/**
* Convert BR tags to nl
*
* @param string The string to convert
* @return string The converted string
*/
function br2nl($string)
{
    return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
}

// http://php.net/manual/en/function.nl2br.php
function nl2br_real($string) {
	$string = str_replace(array("\r\n", "\r", "\n"), "<br/>", $string);
	return $string;
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
	//$headers[] = 'From: Seven Realms <seven@sevenrealmsgame.com>';
	$headers[] = 'From: Seven Realms <noreply@sevenrealmsgame.com>';
	//$headers[] = 'Reply-To: '. $to;
	//$headers[] = 'X-Mailer: PHP/' . phpversion();

	$html = file_get_contents('template/mail_template.html');
	$html = str_replace('{{header}}', $header, $html);
	$html = str_replace('{{message}}', $message, $html);

	// Mail it
	mail($to, $subject, $html, implode("\r\n", $headers));
}

// http://digitcodes.com/create-simple-php-bbcode-parser-function/
// https://gist.github.com/afsalrahim/bc8caf497a4b54c5d75d
// Test at: https://regex101.com/
function bb_to_html($code) {
	$BB_CODE_FIND = array(
		'~\[b\](.*?)\[/b\]~s',
		'~\[i\](.*?)\[/i\]~s',
		'~\[u\](.*?)\[/u\]~s',
		'~\[color=(.*?)\](.*?)\[/color\]~s',
		'~\[url=(https?://.*?)\](.*?)\[/url\]~s',
		'~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s',
		'~\[page=(.*?)](.*?)\[/page\]~s',
		'~\[title\](.*?)\[/title\]~s',
		'~\[subtitle\](.*?)\[/subtitle\]~s'
	);
	$BB_HTML_REPLACE = array(
		'<b>$1</b>',
		'<i>$1</i>',
		'<span style="text-decoration:underline;">$1</span>',
		'<span style="color:$1;">$2</span>',
		'<a target="_blank" href="$1">$2</a>',
		'<img src="$1" alt="" />',
		'<a href="?page=wiki&wiki_page=$1">$2</a>',
		'<h2>$1</h2><hr/>',
		'<h4>$1</h4>'
	);
	return preg_replace($BB_CODE_FIND, $BB_HTML_REPLACE, $code);
}

function html_to_bb($code) {
	$BB_HTML_FIND = array(
		'~\<b\>(.*?)\</b\>~s',
		'~\<i\>(.*?)\</i\>~s',
		'~\<span style="text-decoration:underline;"\>(.*?)\</span\>~s',
		'~\<span style="color:(.*?);"\>(.*?)\</span\>~s',
		'~\<a target="_blank" href="(.*?)"\>(.*?)\</a\>~s',
		'~\<img src="(.*?)" alt="" /\>~s',
		'~\<a href="\?page=wiki&wiki_page=(.*?)"\>(.*?)\</a\>~s',
		'~\<h2\>(.*?)\</h2\>\<hr/\>~s',
		'~\<h4\>(.*?)\</h4\>~s'
	);
	$BB_CODE_REPLACE = array(
		'[b]$1[/b]',
		'[i]$1[/i]',
		'[u]$1[/u]',
		'[color=$1]$2[/color]',
		'[url=$1]$2[/url]',
		'[img]$1[/img]',
		'[page=$1]$2[/page]',
		'[title]$1[/title]',
		'[subtitle]$1[/subtitle]'
	);
	return preg_replace($BB_HTML_FIND, $BB_CODE_REPLACE, $code);
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
