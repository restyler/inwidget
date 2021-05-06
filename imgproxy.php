<?php

$url = isset($_GET['url']) ? $_GET['url'] : null;

if (!$url || substr($url, 0, 4) != 'http' || (strpos($url, 'cdninstagram.com') === FALSE && strpos($url, 'fbcdn.net') === FALSE)) {
    die('Please, provide correct URL');
}

$imgInfo = getimagesize( $url );

if (stripos($imgInfo['mime'], 'image/') === false) {
    die('Invalid image file');
}

header("Content-type: ".$imgInfo['mime']);
readfile( $url );
