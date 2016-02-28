<?php
require_once 'view.php';
require_once BASE_PATH . 'vendor/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(BASE_PATH . 'application/views/template');
$twig = new Twig_Environment($loader);
echo $twig->render('disclaimer.twig', array(
    'title' => $lang['PAGE_TITLE'],
    'message' => $lang['LANG_MSG'],
    'categories' => $lang['MENU_CTG'],
    'langs' => $diff_lang,
    'top_lang' => $top_lang,
    'categs' => $category,
    'http_lang' => $http_lang,
    'slogan' => $lang['SLOGAN'],
    'posters' => $images,
    'disclaimer'=>$lang['DISCLAIMER']
));
