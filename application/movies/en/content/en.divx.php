<?php
if (!defined('BASE_PATH')) {
    exit('No direct script access allowed');
}
class Divx extends Movie {
    public function get_my_movie($my_movie, $page, $search) {
        $divx = '/actiune|animatie|aventura|biografic|comedie|craciun|crima|documentar|dragoste|drama|familie|mister|horror|sf|istoric|(muzical)|sport|western|thriller/';
        $abq = $my_movie->set_query($divx);
        $aburl = $my_movie->set_url('http://divxonline.biz');
        if (strpos($divx, 'war') !== false) {
            $aburl = $my_movie->set_url('http://divxonline.biz/razboi/');
        }
        $movie = $my_movie->movie_link();
        $htmlx = $my_movie->get_html($movie);
        $videos = explode('<div class="thumb"', $htmlx);
        unset($videos[0]);
        $videos = array_values($videos);
        foreach ($videos as $video) {
            $t1 = explode('href="', $video);
            $t2 = explode('"', $t1[1]);
            $link = $t2[0];
            $encode = new SetLink();
            $link = $encode->codeMe($link);
            $title = str_between($video, 'title="', '"');
            $title = trim(preg_replace('/- filme online subtitrate/i', '', $title));
            $t1 = explode('src="', $video);
            $t2 = explode('"', $t1[1]);
            $image = $t2[0];
            if ($link != '') {
                $link = 'mobile_link.php?file=' . $link . '';
                $imgurl = takeimg($image);
                $my_movie->movie_title($title);
                $my_movie->movie_url($link);
                $my_movie->movie_poster($imgurl);
            }
        }
    }
}
$dx = new Divx();
$dx->get_my_movie($my_movie, $page, $search);
