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
$stay_date = $_REQUEST['stay_date'];
$param_arr = [
	'stay_date' => $stay_date
];
$ch = new MyCurl();
$ch->get_data($url, $param_arr);