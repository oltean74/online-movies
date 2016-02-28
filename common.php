<?php
if (!defined('BASE_PATH')) {
    exit('No direct script access allowed');
}
function str_between($string, $start, $end) {
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) {
        return '';
    }
    $ini+= strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
function fix_s($s) {
    $s = str_replace('&amp;', '&', $s);
    $s = str_replace('&ordm;', 's', $s);
    $s = str_replace('&Ordm;', 'S', $s);
    $s = str_replace('&thorn;', 't', $s);
    $s = str_replace('&Thorn;', 'T', $s);
    $s = str_replace('&icirc;', 'i', $s);
    $s = str_replace('&Icirc;', 'I', $s);
    $s = str_replace('&atilde;', 'a', $s);
    $s = str_replace('&Atilde;', 'I', $s);
    $s = str_replace('&ordf;', 'S', $s);
    $s = str_replace('&acirc;', 'a', $s);
    $s = str_replace('&Acirc;', 'A', $s);
    $s = str_replace('&ldquo;', "'", $s);
    $s = str_replace('&#8220;', "'", $s);
    $s = str_replace('&#8221;', "'", $s);
    $s = str_replace('&#8217;', "'", $s);
    $s = str_replace('&#8211;', '-', $s);
    $s = str_replace('&nbsp;', '', $s);
    $s = str_replace('&quot;', "'", $s);
    $s = str_replace('&#8', '', $s);
    $s = str_replace("\u015e", 'S', $s);
    $s = str_replace("\u015f", 's', $s);
    $s = str_replace("\u0163", 't', $s);
    $s = str_replace("\u0162", 'T', $s);
    $s = str_replace("\u0103", 'a', $s);
    $s = str_replace("\u0102", 'A', $s);
    $s = str_replace("\u00a0", ' ', $s);
    $s = str_replace("\u00e2", 'a', $s);
    $s = str_replace("\u021b", 't', $s);
    $s = str_replace("\u201e", "'", $s);
    $s = str_replace("\u201d", "'", $s);
    $s = str_replace("\u0219", 's', $s);
    $s = str_replace("\u00ee", 'i', $s);
    $s = str_replace("\u00ce", 'I', $s);
    $s = str_replace("\u021a", 'T', $s);
    $s = str_replace("\u00c2", 'A', $s);
    $s = str_replace("\u0218", 'S', $s);
    $s = str_replace("\u00f6", 'oe', $s);
    $s = str_replace("\u00fc", 'u', $s);
    $s = str_replace("\u00e4", 'a', $s);
    $s = str_replace("\u00e9", 'e', $s);
    $s = str_replace("\/", '/', $s);
    $s = urlencode($s);
    $s = str_replace('%C8%99', 's', $s);
    $s = str_replace('%C8%9B', 't', $s);
    $s = str_replace('%C8%98', 'S', $s);
    $s = str_replace('%C4%83', 'a', $s);
    $s = str_replace('%C3%A3', 'a', $s);
    $s = str_replace('%C3%AE', 'i', $s);
    $s = str_replace('%C3%A2', 'a', $s);
    $s = str_replace('%C5%A3', 't', $s);
    $s = str_replace('%C3%8E', 'I', $s);
    $s = str_replace('%C8%9A', 'T', $s);
    $s = str_replace('%C5%9F', 's', $s);
    $s = str_replace('%E2%80%99', "'", $s);
    $s = str_replace('%3E%3E', '<', $s);
    $s = str_replace('%3C%3C', '>', $s);
    $s = urldecode($s);
    return $s;
}
function str_prep($string) {
    $string = str_replace(' ', '%20', $string);
    $string = str_replace('[', '%5B', $string);
    $string = str_replace(']', '%5D', $string);
    $string = str_replace('%3A', ':', $string);
    $string = str_replace('%2F', '/', $string);
    $string = str_replace('#038;', '', $string);
    $string = str_replace('&amp;', '&', $string);
    return $string;
}
