<?php
require_once('config.php');

if (!isset($_REQUEST['url']) || empty($_REQUEST['url'])) {
    echo "Input URL";
    echo '<br>';
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
    exit;
}

$url = $_REQUEST['url'];

// the simplest example
$ch = new MyCurl();
$ch->simple_curl($url);
?>
