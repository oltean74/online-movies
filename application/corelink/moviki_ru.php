<?php

   //http://www.moviki.ru/embed/29236/0/0/
   $h = file_get_contents($filelink);
   $l1 = str_between($h, "video_url: '", "'");
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $l1);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   curl_setopt($ch, CURLOPT_REFERER, $filelink);
   curl_setopt($ch, CURLOPT_HEADER, true);
   curl_setopt($ch, CURLOPT_NOBODY, 1);
   $h = curl_exec($ch);
   curl_close($ch);
   $t1 = explode('Location:', $h);
   $t2 = explode("\n", $t1[1]);
   $link = trim($t2[0]);
