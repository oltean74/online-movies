<?php 
include 'class.HtmlFilme.php';
include 'index.php';

 if (isset($_POST['submit'])) {
     $name = $_POST['search'];
     echo '<h2><b>Rezultatele cautarii pentru "'.$name.'"</b></h2>';
     $searchfb = file_get_contents('http://www.filme-bune.net/?s='.$name);
     $videos = explode('class="title"', $searchfb);
     unset($videos[0]);
     $videos = array_values($videos);
// print_r($videos);
foreach ($videos as $video) {
    //  link  
  $v1 = explode('href="', $video);
    $v2 = explode('"', $v1[1]);
    $link = $v2[0];
 //echo $link;
//  titlu

  $v3 = explode('>', $v1[1]);
    $v4 = explode('<', $v3[1]);
    $v5 = explode(', film', $v4[0]);
    $titlu = trim($v5[0]);

    if ($link != '') {
        //$link = "http://127.0.0.1/scripts/filme/php/onlinemoca_link.php?file=".$link.",".urlencode($titlu);
$link = CodeMe($link);
        $link = "mobile_link.php?file=$link";
        echo  '<br />'.' <a href='.$link.'><h2>'.$titlu.'</h2></a>';
    }
}

     $searchru = file_get_contents('http://go.mail.ru/search_video?tsg=l&q='.urlencode($name));
     $videos = explode('STP.results.items', $searchru);
     $t = explode('{{', $video);
     $t1 = explode('description":"', $videos[1]);
     unset($t1[0]);
     foreach ($t1 as $t) {
         $u1 = explode('","url":"', $t);
         $u2 = explode('","number"', $u1[1]);
         $link = $u2[0];
         $titlu = $u1[0];
         $s = "/ok\.ru|moviki\.ru|videomega\.tv|indavideo|videakid|videa\.hu|youtube\.com/i";

         if (preg_match($s, $link)) {
             $link = 'mobile_link.php?file='.$link.','.urlencode($titlu);
             echo  '<br />'.' <a href='.$link.'><h2>'.$titlu.'</h2></a>';
             echo $link;
         }
     }
     $searchbiz = file_get_contents('http://www.filmeonline2013.biz/?s='.$name);

     $videos = explode('div id="post-', $searchbiz);
     unset($videos[0]);
     $videos = array_values($videos);
// print_r($videos);
foreach ($videos as $video) {

//  link  
  $v1 = explode('href="', $video);
    $v2 = explode('"', $v1[1]);
    $link = $v2[0];
//  print($link);
//  titlu

  $v3 = explode('>', $v1[2]);
    $v4 = explode('<', $v3[1]);
    $titlu = $v4[0];
// echo $titlu; 
   if ($link != '') {
       //$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/onlinemoca_link.php?file=".$link.",".urlencode($titlu);
$link = CodeMe($link);

       $link = 'mobile_link.php?file='.$link.','.urlencode($titlu);
       echo  '<br />'.' <a href='.$link.'><h2>'.$titlu.'</h2></a>';
   }
}
     $searchcc = file_get_contents('http://www.filmeonline.cc/?s='.$name);

     $videos = explode('id="post-', $searchcc);
     unset($videos[0]);
     $videos = array_values($videos);

     foreach ($videos as $video) {
         //echo $video;
//  link  
  $v1 = explode('href="', $video);
         $v2 = explode('"', $v1[1]);
         $link = $v2[0];
// echo $link;
//  titlu
  $v3 = explode('title="', $v1[1]);
         $v4 = explode('"', $v3[1]);
         $titlu = $v4[0];
         if ($link != '') {
             $link = CodeMe($link);

             $link = 'mobile_link.php?file='.$link.','.urlencode($titlu);

  //echo $link;

      echo  '<br />'.'<br />'.' <a href='.$link.'><h2>'.$titlu.'</h2></a>';
         }
     }
 } else {
     echo '<p>Please enter a search query</p>';
 }
?>
<script>
$(document).ready(function(){ window.scroll(0,600); });
</script>
