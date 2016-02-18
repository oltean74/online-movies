<?php

 if (!defined('BASE_PATH')) {
     exit('No direct script access allowed');
 }

class Movie
{
    public $html_page;
    private $url;
    private $caturl;
    private $query;
    private $categ;
    private $page;
    private $string_replace;

    public function set_query($set)
    {
        if (isset($set)) {
            $this->query = $set;
        }

        return $this->query;
    }
    public function set_url($set)
    {
        if (isset($set)) {
            $this->url = $set;
        }

        return $this->url;
    }

    public function set_page($set)
    {
        if (isset($set)) {
            $this->page = $set;
        }

        return $this->page;
    }
    public function set_categ($set)
    {
        if (isset($set)) {
            $this->categ = $set;
        }

        return $this->categ;
    }
    public function set_str_replace($set1, $set2)
    {
        $set = array($set1, $set2);
        if (isset($set)) {
            $this->string_replace = $set;
        }

        return $this->string_replace;
    }

    public function movie_link()
    {
        if (isset($this->query)) {
            if (preg_match($this->query, $this->categ)) {
                $this->caturl = $this->url.'/'.$this->categ.'/'.'page/'.$this->page.'/';
            } elseif (strpos($this->categ, $this->string_replace[0]) !== false) {
                $this->caturl = $this->url.'/'.$this->string_replace[1].'/'.'page/'.$this->page.'/';
            } else {
                $this->caturl = '';
            }

            return $this->caturl;
        }
    }

    public function get_html($caturl)
    {
        if (empty($caturl)) {
        } else {
            $this->html_page = file_get_contents($caturl);
        }

        return $this->html_page;
    }
}
