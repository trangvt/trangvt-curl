<?php
require_once('config.php');

if (!isset($_REQUEST['url']) || empty($_REQUEST['url'])) {
    echo "Input URL";
    echo '<br>';
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
    exit;
}

set_time_limit(10000);

$url = $_REQUEST['url'];
$path = __ROOT__.'/images/';

$ch = new MyCurl();
$ch->get_images($url, $path);