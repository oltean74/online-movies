<?php
 if (!defined('BASE_PATH')) {
     exit('No direct script access allowed');
 }

class Filmebune extends Movie
{
    public function get_my_movie($my_movie, $page, $search)
    {
        $fball = '/filme-noi|actiune|animatie|aventura|biografic|comedie|crima|documentar|romantic|drama|familie|fantezie|mister|horror|sf|istoric|(muzical)|sport|western|thriller/';

        $my_movie->set_query($fball);
        $my_movie->set_url('http://www.filme-bune.net');
 if(strpos($fball,"filme-noi")!==false){
    	$my_movie->set_url('http://www.filme-bune.net/filme'); 
	}
        $movie = $my_movie->movie_link();
        $htm = $my_movie->get_html($movie);

        $videos = explode('class="title"', $htm);
        unset($videos[0]);
        $videos = array_values($videos);

        foreach ($videos as $video) {

//  link  
  $v1 = explode('href="', $video);
            $v2 = explode('"', $v1[1]);
            $link = $v2[0];
//  titlu

  $v3 = explode('>', $v1[1]);
            $v4 = explode('<', $v3[1]);
            $v5 = explode(', film', $v4[0]);
            $titlu = trim($v5[0]);

//  imagine
  //$v0=explode("images--",$video);
  $v1 = explode('src="', $video);
            $v2 = explode('"', $v1[1]);
            $image = $v2[0];
//  descriere  
  $v1 = explode('class="entry">', $video);
            $v2 = explode('<a', $v1[1]);
            $descriere = $v2[0];

            $descriere = preg_replace_callback("/(<\/?)(\w+)([^>]*>)/", function ($matches) {
    return strtolower($matches[1].''.$matches[2]);
}, $descriere);
            $descriere = fix_s($descriere);

            if (strlen($descriere) >= 300) {
                $descriere = substr($descriere, 0, 700);
                $descriere = substr($descriere, 0, -strlen(strrchr($descriere, ' '))).'...';
            }
            $encode = new SetLink();
            $link = $encode->codeMe($link);
            if ($link != '') {
                $link = "mobile_link.php?file=$link";
                $imgurl = takeimg($image);
                render_content($titlu, $link, $imgurl);
                render_desc($descriere);
            }
        }
    }
}
