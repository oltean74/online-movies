<?php
if (!defined('BASE_PATH')) {
    exit('No direct script access allowed');
}
class MobileLink {
    private $url;
    public $category;
    public $page;
    public $language;
    public function showlink($ctg, $lang) {
        if ($ctg) {
            $qArr = explode(',', $ctg);
            $this->page = $qArr[0];
            $this->category = $qArr[1];
        }
        if ($lang) {
            $this->language = $lang;
        }
    }
    public function getcat() {
        return $this->category;
    }
    public function getpage() {
        return $this->page;
    }
    public function prev() {
        if ($this->page > 1) {
            $sFile = '' . $_SERVER['SCRIPT_NAME'];
            $this->url = $sFile . '?cat=' . ($this->page - 1) . ',';
            if ($this->category) {
                $this->url = $this->url . urlencode($this->category) . '&lang=' . $this->language;
            }
            return $this->url;
        }
    }
    public function next() {
        $sFile = '' . $_SERVER['SCRIPT_NAME'];
        $this->url = $sFile . '?cat=' . ($this->page + 1) . ',';
        if ($this->category) {
            $this->url = $this->url . urlencode($this->category) . '&lang=' . $this->language;
        }
        return $this->url;
    }
}
