<?php
require_once BASE_PATH . 'common.php';
require_once BASE_PATH . 'application/movies/config.php';
$filelink = $_POST['linksender'];
$filelink = urldecode($filelink);
$flashlink = explode(',', $filelink);
$linkflash = '';

if (in_array('flash', $flashlink)) {
    $linkflash = $flashlink[1];
}
$flashlink = $flashlink[0];
require_once BASE_PATH . 'vendor/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(BASE_PATH . 'application/views/template');
$twig = new Twig_Environment($loader);

if (preg_match('/flash/', $linkflash)) {
    echo $twig->render('video_flash.html.twig', array(
        'video' => $flashlink
    ));
}
else {
    echo $twig->render('video_html5.html.twig', array(
        'video' => $link
    ));
}
