<?php
require_once('include.php');

$meta_description = '';

// Get the template
ob_start();
include 'template/index.php';
$html = ob_get_clean();

// Get the page content
ob_start();
include 'pages/' . $PAGE . '.php';
$page_content = ob_get_clean();

// Put the content into the template
$html = str_replace('{{meta_description}}', $meta_description, $html);
$html = str_replace('{{content}}', $page_content, $html);

// Display the page
echo $html;
?>
