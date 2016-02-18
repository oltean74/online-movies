<?php

require_once BASE_PATH.'common.php';
require_once BASE_PATH.'application/movies/config.php';
if ($hosts) {
    echo '<div class="log"><span>'.$lang['MSG_LINK'].'</span></div>';
    $filelink = $_GET['file'];
    $decode = new setLink();
    $decode->DecodeMe($filelink, $hosts);
    $links = $decode->all_link();
    foreach ($links as $link) {
        foreach ($link as $title => $stream) {
            if (preg_match($hosts, $stream)) {
                sendlink($stream, $title);
                flashlink($stream, $title);
            } else {
                echo '<span style="color: red;" /><strong>Sorry, no link available</strong>';
            }
        }
    }
} else {
    echo '<span style="color: red;" /><strong>Error: variable <b><i>$hosts</i></b> is missing or renamed</strong>';
    echo '<br/>Please, verify variable in :</span><b/>'.BASE_PATH.'application/movies/config.php';
}
