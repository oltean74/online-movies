<?php

if (!defined('BASE_PATH')) {
    exit('No direct script access allowed');
}
$hosts = "/ok\.ru|moviki\.ru|videomega\.tv|indavideo\.hu|videakid\.hu|videa\.hu/";
$encode = array(
    'http://www.filme-bune.net' => 'mobile1',
    'http://www.divxonline.ro' => 'mobile2',
    'http://www.filmeonline2013.biz' => 'mobile3',
    'http://www.filmeonline.cc' => 'mobile4',
    'http://www.filmeonlinenoi.com' => 'mobile5',
    'http://www.voxfilmeonline.com' => 'mobile6',
    'http://mesekvilaga.x10.mx/mesevideo.php' => 'magyar1'
 );
//hide html5 links for folowing providers:
$no_html = "videomega.tv";
