<?php
require_once('include.php');

//$html = file_get_contents('templates/' . $TEMPLATE . '.php');
ob_start();
include 'template/index.php';
$html = ob_get_clean();

$page = 'index';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
ob_start();
include 'pages/' . $page . '.php';
$page_content = ob_get_clean();

$html = str_replace('{{content}}', $page_content, $html);

echo $html;
?>