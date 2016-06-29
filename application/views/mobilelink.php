<?php
require_once 'view.php';
require_once BASE_PATH . 'common.php';
require_once BASE_PATH . 'application/movies/config.php';
$filelink = $_GET['file'];
$decode = new setLink();
$decode->DecodeMe($filelink, $hosts);
$links = $decode->all_link();
$decode->html5_link($links);
$h_link = $decode->html5;
require_once BASE_PATH . 'vendor/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(BASE_PATH . 'application/views/template');
$twig = new Twig_Environment($loader);
echo $twig->render('mobilelink.twig', array(
    'title' => $lang['PAGE_TITLE'],
    'message' => $lang['LANG_MSG'],
    'categories' => $lang['MENU_CTG'],
    'langs' => $diff_lang,
    'top_lang' => $top_lang,
    'menu-home' => $lang['MENU_HOME'],
    'categs' => $category,
    'http_lang' => $http_lang,
    'slogan' => $lang['SLOGAN'],
    'posters' => $images,
    'hosts' => $hosts,
    'msg_link' => $lang['MSG_LINK'],
    'html5' => $h_link,
    'noHtml' =>$no_html
));
