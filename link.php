<?php
 
 include_once 'main.php';
 include_once 'common.php';
include_once 'application/movies/config.php';
//$filelink = $_GET["file"];
$filelink = $_POST['linksender'];
$filelink = urldecode($filelink);
$flashlink = explode(',', $filelink);
 $linkflash = '';
if (in_array('flash', $flashlink)) {
    $linkflash = $flashlink[1];
}
$flashlink = $flashlink[0];
// echo $flashlink;

$filelink = str_prep($flashlink);
$video_link = new Video();
include $video_link->get_video($filelink, $hosts);

$video = $link;
if (preg_match('/flash/', $linkflash)) {
    include 'flash.php';
} else {
    include 'player.php';
}
