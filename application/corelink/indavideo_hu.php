<?php
$t1 = explode('/', $filelink);
$id = $t1[5];
$l1 = 'http://amfphp.indavideo.hu/SYm0json.php/player.playerHandler.getVideoData/' . $id;
$h1 = file_get_contents($l1);
$link = str_between($h1, '"video_file":"', '"');
