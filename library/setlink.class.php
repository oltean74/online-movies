<?php

 if (!defined('BASE_PATH')) {
     exit('No direct script access allowed');
 }

class SetLink
{
    private $http;
    private $link;
    private $video_link = array();



    public function codeMe($link)
    {
        if (strpos($link, 'http') !== false) {
            $t1 = explode('/', $link);
            $t2 = 'http://'.$t1[2];
            if ($t1[3]) {
                $t3 = explode('?', $t1[3]);
                $t4 = $t2.'/'.$t3[0];
            }
        }
      if (file_exists(BASE_PATH.'application/movies/config.php')) {
	  include(BASE_PATH.'application/movies/config.php');
        if (array_key_exists($t2, $encode)) {
            foreach ($encode as $o => $r) {
                if ($t2 == $o) {
                    $this->http = str_replace($t2, $r, $link);
                }
            }
        }
     }
        return $this->http;
    }

    public function DecodeMe($link, $hosts)
    {
        $t1 = explode('/', $link);
        $t2 = $t1[0];
     if (file_exists(BASE_PATH.'application/movies/config.php')) {
		  include(BASE_PATH.'application/movies/config.php');
        if (in_array($t2, $encode)) {
            foreach ($encode as $o => $r) {
                if ($t2 == $r) {
                    $t1 = str_replace($t2, $o, $link);
                    $t1 = explode(',', $t1);

                    $tlink = urldecode($t1[0]);
                    $tlink = str_replace('*', ',', $tlink);
                    $this->link = str_replace('@', '&', $tlink);

                    $html = file_get_contents($this->link);

                    if (preg_match_all("/(\/\/.*?)(\"|\')+/i", $html, $matches)) {
                        $links = $matches[1];
//print_r ($links);
                    }
                    for ($i = 0;$i < count($links);++$i) {
                        if (strpos($links[$i], 'http') !== false) {
                            $t1 = explode('http:', $links[$i]);
                            if (array_key_exists(1, $t1)) {
                                $all_link = 'http:'.$t1[1];
                            }
                        } else {
                            $all_link = 'http:'.$links[$i];
                        }

                        $t1 = explode(' ', $all_link);
                        $all_link = $t1[0];
                        $t1 = explode('&stretching', $all_link);
                        $all_link = $t1[0];
                        $all_link = str_replace(urldecode('%0D'), '', $all_link);
                        if (preg_match($hosts, $all_link)) {
                            $t1 = explode('proxy.link=', $all_link);
 //vezi-filme
if (array_key_exists(1, $t1)) {
    $t2 = explode('&', $t1[1]);
    $all_link = trim($t2[0]);
}

                            $link = urlencode($all_link);
                            $server = str_between($all_link, 'http://', '/');

                            if (!$server) {
                                $server = 'LINK';
                            }
                            $this->video_link[] = array($server => $link);
                        }
                    }
                }
            }
        }
    }
}
    public function top_link()
    {
        return $this->link;
    }
    public function get_title()
    {
        return $this->title;
    }
    public function all_link()
    {
        return $this->video_link;
    }
}
