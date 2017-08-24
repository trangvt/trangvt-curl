<?php
require_once('config.php');

set_time_limit(10000);

$url = $_REQUEST['url'];
$param_arr = array(
    'name' => $_REQUEST['name'],
    'pass' => $_REQUEST['pass'],
    'form_build_id' => $_REQUEST['form_build_id'],
    'form_id' => $_REQUEST['form_id'],
    'op' => $_REQUEST['op'],
);
$user_agent = "Mozilla/5.0 (X11; Linux i686; rv:24.0) Gecko/20140319 Firefox/24.0 Iceweasel/24.4.0";
$timeout = 5;
$cookie = 'cookie.txt';

$ch = new MyCurl();
$ch->post_data($url, $param_arr, $cookie, $user_agent, $timeout);

/**
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch,CURLOPT_USERAGENT,$user_agent);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie);

curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
curl_setopt( $ch, CURLOPT_ENCODING, "" );

curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );

$content = curl_exec( $ch );
var_dump($content);
$response = curl_getinfo( $ch );
$status_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
$newurl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);

$useragent = $_SERVER ['HTTP_USER_AGENT'];
echo "<b>Your User Agent is</b>: " . $useragent;
*/
