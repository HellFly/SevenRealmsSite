<?php
require_once('include.php');

$meta_description = '';

//$html = file_get_contents('templates/' . $TEMPLATE . '.php');
ob_start();
include 'template/index.php';
$html = ob_get_clean();

ob_start();
include 'pages/' . $PAGE . '.php';
$page_content = ob_get_clean();

$html = str_replace('{{meta_description}}', $meta_description, $html);
$html = str_replace('{{content}}', $page_content, $html);

echo $html;
?>