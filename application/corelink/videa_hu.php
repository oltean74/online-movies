<?php
  if (!defined('BASE_PATH')) {
      exit('No direct script access allowed');
  }

      preg_match('/(v=)([A-Za-z0-9_]+)/', $filelink, $m);
      $id = $m[2];
      $l1 = 'http://videa.hu/flvplayer_get_video_xml.php?v='.$id.'&m=0';
      $h1 = file_get_contents($l1);
      $link = str_between($h1, 'video_url="', '"');

      if ($id != '') {
          $filelink = 'http://videa.hu/videok/sport/'.$id;
          $html = file_get_contents($filelink);
          $id = str_between($html, 'flvplayer.swf?f=', '.0&');
          $link = 'http://videa.hu/static/video/'.$id;
      } else {
          $html = file_get_contents($filelink);
          $id = str_between($html, 'flvplayer.swf?f=', '.0&');
          $link = 'http://videa.hu/static/video/'.$id;
      }
