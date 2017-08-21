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
// $data = array(
//     'name' => 'trangvt.khtn@gmail.com', 
//     'pass' => '27081991',
//     'form_build_id' => 'form-6x1QcEJZxwJz8IyZY712wJar6ssyUsHRyldDKS24t3k',
//     'form_id' => 'user_login',
//     'op' => 'Sign in',
// );
$ch = new MyCurl();
$ch->post_data($url, $param_arr);
