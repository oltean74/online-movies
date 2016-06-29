<?php
ini_set('display_errors', 'Off');
define('DS', '/', true);
define('BASE_PATH', realpath(dirname(__FILE__)) . DS, true);
define('ROOT', dirname(dirname(__FILE__)) . DS, true);
/** Autoload any classes that are required **/
function __autoload($className) {
    if (file_exists(BASE_PATH . 'library/' . strtolower($className) . '.class.php')) {
        require_once BASE_PATH . 'library/' . strtolower($className) . '.class.php';
    } else {
        echo ' An error occured.Please check it real url of ' . strtolower($className) . '.class.php';
    }
}
function includeJs($fileName) {
    echo '<script src="js/' . $fileName . '.js"></script>';
}
function includeHostJs($fileName) {
    echo '<script src="' . $fileName . '"></script>';
}
function includeCss($fileName) {
    echo '   <link rel="stylesheet" href="css/' . $fileName . '.css " type="text/css" media="all" />';
}
function includeHostCss($fileName) {
    echo '   <link rel="stylesheet" href="' . $fileName . '" type="text/css" media="all" />';
}
function HtmlFilme($url) {
    if (empty($url)) {
    } else {
        $html = file_get_contents($url);
    }
    return $html;
}
function takeimg($img) {
    $imagename = basename($img);
    if (strpos($imagename, '?') !== false) {
        $st = str_split($imagename);
        $name = str_between($imagename, $st[0], '?');
        $name = $st[0] . $name;
    } else {
        $name = $imagename;
    }
    $imgurl = 'tmp/' . $name;
    if (file_exists($imgurl)) {
        $imgurl = 'tmp/' . $name;
    } else {
        copy($img, $imgurl);
    }
    return $imgurl;
}
