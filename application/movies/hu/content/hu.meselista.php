<?php

class Meselista extends Movie
{
    public function get_my_movie($my_movie, $page, $search)
    {
        $mese = '/meselista/';
        $abq = $my_movie->set_query($mese);
        if ($page > '1') {
            $aburl = $my_movie->set_url('http://mesekvilaga.x10.mx/index.php?page='.$page);
        } else {
            $aburl = $my_movie->set_url('http://mesekvilaga.x10.mx');
        }
        $html = $my_movie->get_html($aburl);

        $videos = explode('class="jkep">', $html);
        unset($videos[0]);
        $videos = array_values($videos);
        foreach ($videos as $video) {
            $t1 = explode("href='", $video);
            $t2 = explode('"', $t1[1]);
            $t3 = explode("'", $t2[0]);
            $tt1 = explode("src='", $video);
            $tt2 = explode('"', $tt1[1]);
            $tt3 = explode("'", $tt2[0]);
            $tit = explode('"', $t1[2]);
            $tit1 = explode('>', $tit[2]);
            $img = 'http://mesekvilaga.x10.mx'.$tt3[0];
            $link = 'http://mesekvilaga.x10.mx/'.$t3[0];
            $title = fix_s(trim($tit1[2]));
            $encode = new SetLink();
            $link = $encode->codeMe($link);

            $link = 'mobile_link.php?file='.urlencode($link).'';
            $imgurl = takeimg($img);
            render_content($title, $link, $imgurl);
        }
    }
}
