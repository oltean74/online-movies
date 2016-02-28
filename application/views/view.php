<?php

if (!defined('BASE_PATH')) {
    exit('No direct script access allowed');
}
$u_lang = new Serverlang();

function language() {
    
    if (isset($_POST['lang'])) {
        $http_lang = $_POST['lang'];
    }
    elseif (isset($_GET['lang'])) {
        $http_lang = $_GET['lang'];
    }
    else {
        $http_lang = (new Serverlang())->setLang();
    }
    return $http_lang;
}
$http_lang = language();
$user_lang = $u_lang->userLang($http_lang);
$diff_lang = $u_lang->diffLang();
$user_dir = $u_lang->selectLang();
include_once $user_dir;
$image = new Posters;
$images = $image->return_images();

if (isset($_GET['lang'])) {
    $top_lang = 1;
}
else {
    $top_lang = 0;
}
