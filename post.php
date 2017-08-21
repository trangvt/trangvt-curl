<?php
require_once('config.php');

set_time_limit(10000);
$url = $_REQUEST['url'];

$param_arr = [
    'name' => $_REQUEST['name'],
    'pass' => $_REQUEST['pass'],
    'form_build_id' => $_REQUEST['form_build_id'],
    'form_id' => $_REQUEST['form_id'],
    'op' => $_REQUEST['op'],
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.bbcgoodfood.com/user/login");
curl_setopt($ch, CURLOPT_POST, true);

$data = array(
    'name' => $_REQUEST['name'],
    'pass' => $_REQUEST['pass'],
    'form_build_id' => $_REQUEST['form_build_id'],
    'form_id' => $_REQUEST['form_id'],
    'op' => $_REQUEST['op'],
);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.bbcgoodfood.com/user/5812671');
curl_exec($ch);
curl_close($ch);

// $ch = new MyCurl();
// $ch->post_data($url, $param_arr);
