<?php
 if (!defined('BASE_PATH')) {
     exit('No direct script access allowed');
 }

class Biz extends Movie
{
    public function get_my_movie($my_movie, $page, $search)
    {
        $biz = '/actiune|animatie|aventura|comedie|drama|fantezie|horror|sf|thriller/';
        $abq = $my_movie->set_query($biz);
        $aburl = $my_movie->set_url('http://www.filmeonline2013.biz/category');
        $abst = $my_movie->set_str_replace('war', 'razboi');
        $movie = $my_movie->movie_link();

        $htmlbiz = $my_movie->get_html($movie);

        $videos = explode('div id="post-', $htmlbiz);
        unset($videos[0]);
        $videos = array_values($videos);

        foreach ($videos as $video) {

//  link  
  $v1 = explode('href="', $video);
            $v2 = explode('"', $v1[1]);
            $link = $v2[0];

//  titlu

  $v3 = explode('>', $v1[2]);
            $v4 = explode('<', $v3[1]);
            $titlu = $v4[0];

//  imagine
  //$v0=explode("images--",$video);
  $v1 = explode('src="', $video);
            $v2 = explode('"', $v1[1]);
            $image = $v2[0];
//  descriere  
  $v1 = explode('div class="entry-excerpt">', $video);
            $v2 = explode('<span class="meta-more"', $v1[1]);
            $descriere = $v2[0];

            $descriere = preg_replace_callback("/(<\/?)(\w+)([^>]*>)/", function ($matches) {
    return strtolower($matches[1].''.$matches[2]);
}, $descriere);
            $descriere = fix_s($descriere);

            if (strlen($descriere) >= 300) {
                $descriere = substr($descriere, 0, 500);
                $descriere = substr($descriere, 0, -strlen(strrchr($descriere, ' '))).'...';
            }

            if ($link != '') {
                //$link = "http://127.0.0.1/cgi-bin/scripts/filme/php/onlinemoca_link.php?file=".$link.",".urlencode($titlu);
      $link = 'mobile_link.php?file='.$link.','.urlencode($titlu);
                $imgurl = takeimg($image);
                $encode = new SetLink();
                $link = $encode->codeMe($link);
                render_content($titlu, $link, $imgurl);
            }
        }
    }
}
