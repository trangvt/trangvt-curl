<?php
define('__ROOT__', dirname(__FILE__));

require_once(__ROOT__.'/simplehtmldom_1_5/simple_html_dom.php');
require_once('MyCurl.php');

define('IMAGES_FOLDER', '/images/');
// http://php.net/manual/en/function.exif-imagetype.php
$GLOBALS['image_types'] = [
    1 => 'gif',
    2 => 'jpeg',
    3 => 'png',
    6 => 'bmp',
    7 => 'tiff',
    8 => 'tiff',
];
