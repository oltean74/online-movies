<?php

  if (!defined('BASE_PATH')) {
      exit('No direct script access allowed');
  }

 $u_lang = new Serverlang();
function language()
{
    if (isset($_POST['lang'])) {
        $http_lang = $_POST['lang'];
    } elseif (isset($_GET['lang'])) {
        $http_lang = $_GET['lang'];
    } else {
        $http_lang = (new Serverlang())->setLang();
    }

    return $http_lang;
}
$http_lang = language();
$user_lang = $u_lang->userLang($http_lang);
  $diff_lang = $u_lang->diffLang();
  $user_dir = $u_lang->selectLang();

include $user_dir;
include 'html.tpl.php';
function render_content($title, $link, $imgurl)
{
    $http_lang = language();
    if (isset($http_lang)) {
        $link = $link.'&lang='.$http_lang;
    }
     echo  '<div class="col-cnt">'.
'<a href='.$link.'><h2>'.$title.'.</h2></a>'.
'<br />'.'<a href='.$link.'><img src='.$imgurl.' width="320" height="240"/></a>'.
 '</div>' ;
 
}
function render_desc($description)
{
    echo  '<br/>'.'<br />'.'<div class="description">'.$description.' </div> '.'</div>';
}
function sendlink($link, $title)
{
    echo'
<div class="sendlink"><span>'.$title.' </span> 
<form method="post" action="link.php" id="sendlinkform">
<input type="hidden" name="linksender" value='.$link.'>
<input type="submit" name="submit" value="Watch online-HTML5 player">
</form></div><hr/>
';
}
function flashlink($link, $title)
{
    echo'
<div class="flashlink"><span>'.$title.'</span> 
<form method="post" action="link.php" id="sendlinkform">
<input type="hidden" name="linksender" value='.$link.',flash>
<input type="submit" name="submit" value="Watch online-Flash player">
</form></div><hr/>
';
}
