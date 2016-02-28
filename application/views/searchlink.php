<?php
require_once 'view.php';
$encode = new SetLink();
$search_results = array();
$name = $_POST['search'];
$searchfb = file_get_contents('http://www.filme-bune.net/?s=' . $name);
$videos = explode('class="title"', $searchfb);
unset($videos[0]);
$videos = array_values($videos);

foreach ($videos as $video) {
    $v1 = explode('href="', $video);
    $v2 = explode('"', $v1[1]);
    $link = $v2[0];
    $v3 = explode('>', $v1[1]);
    $v4 = explode('<', $v3[1]);
    $v5 = explode(', film', $v4[0]);
    $titlu = trim($v5[0]);
    
    if ($link != '') {
        $link = $encode->codeMe($link);
        $link = "mobile_link.php?file=$link";
        $search_results[] = array(
            'title' => $titlu,
            'link' => $link
        );
    }
}
$searchbiz = file_get_contents('http://www.filmeonline2013.biz/?s=' . $name);
$videos = explode('div id="post-', $searchbiz);
unset($videos[0]);
$videos = array_values($videos);

foreach ($videos as $video) {
    $v1 = explode('href="', $video);
    $v2 = explode('"', $v1[1]);
    $link = $v2[0];
    $v3 = explode('>', $v1[2]);
    $v4 = explode('<', $v3[1]);
    $titlu = $v4[0];
    
    if ($link != '') {
        $link = $encode->codeMe($link);
        $link = 'mobile_link.php?file=' . $link . ',' . urlencode($titlu);
        $search_results[] = array(
            'title' => $titlu,
            'link' => $link
        );
    }
}
$searchcc = file_get_contents('http://www.filmeonline.cc/?s=' . $name);
$videos = explode('id="post-', $searchcc);
unset($videos[0]);
$videos = array_values($videos);

foreach ($videos as $video) {
    $v1 = explode('href="', $video);
    $v2 = explode('"', $v1[1]);
    $link = $v2[0];
    $v3 = explode('title="', $v1[1]);
    $v4 = explode('"', $v3[1]);
    $titlu = $v4[0];
    
    if ($link != '') {
        $link = $encode->codeMe($link);
        $link = 'mobile_link.php?file=' . $link . ',' . urlencode($titlu);
        $search_results[] = array(
            'title' => $titlu,
            'link' => $link
        );
    }
}
require_once BASE_PATH . 'vendor/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(BASE_PATH . 'application/views/template');
$twig = new Twig_Environment($loader);
echo $twig->render('search.twig', array(
    'title' => $lang['PAGE_TITLE'],
    'message' => $lang['LANG_MSG'],
    'categories' => $lang['MENU_CTG'],
    'langs' => $diff_lang,
    'top_lang' => $top_lang,
    'categs' => $category,
    'http_lang' => $http_lang,
    'slogan' => $lang['SLOGAN'],
    'posters' => $images,
    'results' => $name,
    'search' => $search_results,
    'submit' => $_POST['submit'],
    'msg_search' => $lang['MSG_SRCH']
));
