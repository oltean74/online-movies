<?php

function showContent($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_POST, 0);
    $htm = curl_exec($ch);
//  curl_close ($ch);
return $htm;
}
$mobilelink = str_replace('ok.ru/', 'm.ok.ru/', $filelink);
 $mobilelink = str_replace('videoembed/', 'video/', $mobilelink);
$mobilelink = showContent($mobilelink);
$x = explode('data-objid', $mobilelink);
$mobilelink = str_between($x[1], 'href="', '"');
 $filelink = str_replace('video/', 'videoembed/', $filelink);
  $h1 = file_get_contents($filelink);
// echo '<xmp/>'.$h1;
//    echo $filelink;
$startpos = strpos($h1, 'data-player-id="embed_video_') + strlen('data-player-id="embed_video_');
$endpos = strpos($h1, '"', $startpos);
$id = substr($h1, $startpos, $endpos - $startpos);
  $l = 'http://ok.ru/dk?cmd=videoPlayerMetadata&mid='.$id;
//   echo $l;
  $h2 = file_get_contents($l);
//   echo '<br />'. $h2;
 // die();
  //http://217.20.145.42/?id=21387938310&expires=1423386297139&type=3&ct=0&sig=5d077c4020b136ce976f17801862b10848b0ba68&clientType=0
 //  $p=json_decode($h2);
$start = strpos($h2, '"hd","url":"') + strlen('"hd","url":"');
$end = strpos($h2, '","seekSchema"', $start);
$link = substr($h2, $start, $end - $start);
//  $link=str_between($h2,'hd","url":"','"');
  if (!$link) {
      $link = str_between($h2, 'sd","url":"', '"');
  }
  if (!$link) {
      $link = str_between($h2, '"low","url":"', '"');
  }
  //$link=$p["videos"][4]["url"];
  //die();
  $link = str_replace("\u0026", '&', $link);
