<?php
require_once('config.php');

if (!isset($_REQUEST['url']) || empty($_REQUEST['url'])) {
    echo "Input URL";
    echo '<br>';
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
    exit;
}

$url = $_REQUEST['url'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
// http://www.useragentstring.com/pages/useragentstring.php
$useragent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:21.0) Gecko/20100101 Firefox/21.0';

$ch = new MyCurl();
$ch->basic_auth($url, $username, $password, $useragent);
