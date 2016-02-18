<?php
$source = $_POST['source'];
$video = $_POST['videosrc'];
$mobilelink = $_POST['mobilelink'];
echo $source;
if ((strlen($video) > 7) && (strlen($mobilelink) > 7)) {
    if ($source == 's1') {
        ?>
   <div class="video-js-box vim-css"><video id="video-mobile" class="video-js" width="100%" height="400" poster="css/images/poster.png" controls preload><source src=<?php echo $mobilelink;
        ?> type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></video></div>
<?php 
    } elseif ($source == 's2') {
        ?>
      <div class="video-js-box vim-css"><video id="video-mobile" class="video-js" width="100%" height="400" poster="http://www.mindwork3d.com/images/poster.png" controls preload><source src=<?php echo $video;
        ?> type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></video>
<?php 
    }
} elseif (strlen($video) > 7) {
    ?>
   <div class="video-js-box vim-css"><video id="video-mobile" class="video-js" width="100%" height="400" poster="http://www.mindwork3d.com/images/poster.png" controls preload><source src=<?php echo $video;
    ?> type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></video></div>
<?php 
} elseif (strlen($mobilelink) > 7) {
    ?>
      <div class="video-js-box vim-css"><video id="video-mobile" class="video-js" width="100%" height="400" poster="http://www.mindwork3d.com/images/poster.png" controls preload><source src=<?php echo $mobilelink;
    ?> type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'></video>
<?php 
} else {
    echo 'ERROR, NO SOURCE FOUND';
}?>