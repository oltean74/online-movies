<?php
if (!defined('BASE_PATH')) {
    exit('No direct script access allowed');
}
class Posters {
    private $images;
    private $poster;
    public function getPics() {
        if (file_exists(BASE_PATH . 'tmp/')) {
            $dir = BASE_PATH . 'tmp/';
            $dh = opendir($dir);
        }
        while (false !== ($filename = readdir($dh))) {
            $files[] = $filename;
        }
        $this->images = preg_grep('/\.jpg$/i', $files);
        return $this->images;
    }
    public function array_random_1($arr, $num = 1) {
        $keys = array_keys($arr);
        shuffle($keys);
        $r = array();
        for ($i = 0;$i < $num;++$i) {
            $r[$keys[$i]] = $arr[$keys[$i]];
        }
        return $r;
    }
    public function array_random_2($arr, $num = 1) {
        $keys = array_keys($arr);
        shuffle($keys);
        $rr = array();
        for ($i = 0;$i < $num;++$i) {
            $rr[$keys[$i]] = $arr[$keys[$i]];
        }
        return $rr;
    }
    public function array_random_3($arr, $num = 1) {
        $keys = array_keys($arr);
        shuffle($keys);
        $rr = array();
        for ($i = 0;$i < $num;++$i) {
            $rr[$keys[$i]] = $arr[$keys[$i]];
        }
        return $rr;
    }
    public function get_random($imgs) {
        foreach ($imgs as $image) {
            $url = 'tmp/' . $image;
        }
        return $url;
    }
    public function return_images() {
        $image = $this->getPics();
        $image1 = $this->array_random_1($image);
        $image2 = $this->array_random_2($image);
        $image3 = $this->array_random_3($image);
        $url1 = $this->get_random($image1);
        $url2 = $this->get_random($image2);
        $url3 = $this->get_random($image3);
        $this->poster = array($url1, $url2, $url3);
        return $this->poster;
    }
}
