<?php
require_once 'view.php';
require_once BASE_PATH . 'common.php';
$qc = $_GET['cat'];
$ql = $_GET['lang'];
$query = new MobileLink();
$my_movie = new Movie();
$query->showlink($qc, $ql);
$pg = $query->getpage();
$ctg = $query->getcat();
$page = $my_movie->set_page($pg);
$search = $my_movie->set_categ($ctg);
$prev = $query->prev();
$next = $query->next();

if (file_exists(BASE_PATH . 'application/movies/' . strtolower($ql) . '/content/')) {
    $dir = BASE_PATH . 'application/movies/' . strtolower($ql) . '/content/';
    $dh = opendir($dir);
}
while (false !== ($moviefile = readdir($dh))) {
    
    if (strpos($moviefile, 'php')) {
        require_once $dir . $moviefile;
    }
}
$titles = $my_movie->titles;
if(is_null($titles)) 
$titles = array("");
$t = count($titles);
$descriptions = $my_movie->descriptions;
if(is_null($description)) 
$descriptions = array("");
$descriptions = array_pad($descriptions, $t, "");
$posters = $my_movie->posters;
if(is_null($posters))
$posters = array("");
$posters = array_pad($posters, $t, "");
$urls = $my_movie->urls;
$i = 0;

for ($i = 0;$i < $t;$i++) {
    $keys[] = 'movie-' . $i;
}
$all_movies = $my_movie->mobilemovies($keys, array(
    'title' => $titles,
    'poster' => $posters,
    'url' => $urls,
    'description' => $descriptions
));
require_once BASE_PATH . 'vendor/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem(BASE_PATH . 'application/views/template');
$twig = new Twig_Environment($loader);
echo $twig->render('mobilemovies.twig', array(
    'title' => $lang['PAGE_TITLE'],
    'message' => $lang['LANG_MSG'],
    'categories' => $lang['MENU_CTG'],
    'langs' => $diff_lang,
    'top_lang' => $top_lang,
    'categs' => $category,
    'http_lang' => $http_lang,
    'slogan' => $lang['SLOGAN'],
    'posters' => $images,
    'menu_movie' => $lang['MENU_MOVIES'],
    'prev' => $prev,
    'next' => $next,
    'msg_prev' => $lang['MSG_PREV'],
    'msg_next' => $lang['MSG_NEXT'],
    'lang' => $ql,
    'movies' => $all_movies,
    'page' => $pg
));
