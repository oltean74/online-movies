<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
curl_setopt($ch, CURLOPT_URL, $filelink);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_POST, 0);
$html = curl_exec($ch);
//curl_close ($ch);
$cookie = array();
preg_match('/^Set-Cookie:\s*([^;]*)/mi', $html, $m);
parse_str($m[1], $cookie);
$cookie = $m[1];
curl_setopt($ch, CURLOPT_REFERER, 'http://filmehd.net');
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
$html = curl_exec($ch);
curl_close($ch);
$h = urldecode($html);
$h = str_replace('scri', '', $h);
$x = explode('source', $h);
$link = str_between($x[1], 'src="', '"');
