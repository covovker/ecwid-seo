<?php 

PHPUnit_Framework_Error_Warning::$enabled = FALSE;
PHPUnit_Framework_Error_Notice::$enabled = FALSE;

global $_SERVER, $ecwid_html_index, $ecwid_description, $ecwid_title, $ecwid_store_id;

$_SERVER['HTTP_HOST'] = 'www.example.com';
$_SERVER['SERVER_PORT'] = 80;
$_SERVER['REQUEST_URI'] = 'http://' . $_SERVER['HTTP_HOST'] . '/?_escaped_fragment_=' . $_GET['_escaped_fragment_'];

$ecwid_store_id = 46004;


include_once __DIR__ . '/../ecwid_catalog.php';
include_once __DIR__ . '/../ecwid_product_api.php';
include_once __DIR__ . '/../ecwid_platform.php';
include_once __DIR__ . '/../ecwid_misc.php';
include __DIR__ . '/../run.php';

// Uncomment this line and comment the includes above to be able to run all test simultaneously 
// otherwise "Cannot redeclare function" errors happen, therefore you can only run one test at a time on a compiled file
//include __DIR__ . '/../ecwid_ajax_indexing.php';
