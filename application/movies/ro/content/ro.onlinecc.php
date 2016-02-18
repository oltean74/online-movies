<?php

 if (!defined('BASE_PATH')) {
     exit('No direct script access allowed');
 }

class Onlinecc extends Movie
{
    public function get_my_movie($my_movie, $page, $search)
    {
        $cc = '/actiune|animatie|aventura|comedie|drama|fantezie|sf|thriller/';

        $abq = $my_movie->set_query($cc);
        $my_movie->set_url('http://www.filmeonline.cc/category');
        $my_movie->set_str_replace('war', 'razboi');
        $my_movie->set_str_replace('horror', 'groaza');
        $movie = $my_movie->movie_link();

        $html = $my_movie->get_html($movie);
        $videos = explode('id="post-', $html);
        unset($videos[0]);
        $videos = array_values($videos);

        foreach ($videos as $video) {
            //echo $video;
//  link  
  $v1 = explode('href="', $video);
            $v2 = explode('"', $v1[1]);
            $link = $v2[0];

//  titlu
  $v3 = explode('title="', $v1[1]);
            $v4 = explode('"', $v3[1]);
            $titlu = $v4[0];
//  imagine  
  $v1 = explode('src="', $video);
            $v2 = explode('"', $v1[1]);
            $image = $v2[0];
//  descriere  
  $v1 = explode('<p>', $video);
            $v2 = explode('</p>', $v1[1]);
            $descriere = $v2[0];
            $descriere = preg_replace_callback("/(<\/?)(\w+)([^>]*>)/", function ($matches) {
    return strtolower($matches[1].''.$matches[2]);
}, $descriere);
            $descriere = str_replace('&nbsp;', '', $descriere);
            $descriere = fix_s($descriere);
            if (strlen($descriere) >= 300) {
                $descriere = substr($descriere, 0, 500);
                $descriere = substr($descriere, 0, -strlen(strrchr($descriere, ' '))).'...';
            }
            if ($link != '') {
                // echo $link;

$encode = new SetLink();
                $link = $encode->codeMe($link);

                $link = 'mobile_link.php?file='.$link.','.urlencode($titlu);

                $imgurl = takeimg($image);
                render_content($titlu, $link, $imgurl);
                render_desc($descriere);
            }
        }
    }
}
