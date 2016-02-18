<?php

      preg_match('/(v=)([A-Za-z0-9_]+)/', $filelink, $m);
      $id = $m[2];
      //http://videakid.hu/flvplayer_get_video_xml.php?v=UybVGzBIdoaQEtos&start=0&enablesnapshot=0&r=668048
      $l1 = 'http://videakid.hu/flvplayer_get_video_xml.php?v='.$id.'&m=0';
      $h1 = file_get_contents($l1);
      $link = str_between($h1, 'video_url="', '"');
