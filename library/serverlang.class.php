<?php
if (!defined('BASE_PATH')) {
    exit('No direct script access allowed');
}

class Serverlang {
    private $user_lang;
    private $dir;
    public function setLang() {
        $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        if (isset($language)) {
            $http_lang = explode(',', $language);
            $server_lang = strtolower(substr(chop($http_lang[0]), 0, 2));
        } else {
            $server_lang = 'en';
        }
        return $server_lang;
    }
    public function userLang($lang) {
        $langdirs = scandir(BASE_PATH . 'application/movies/');
        foreach ($langdirs as $langdir) {
            if ((strpos($lang, $langdir) !== false) && file_exists(BASE_PATH . 'application/movies/' . strtolower($langdir) . '/' . strtolower($langdir) . '.lang.php')) {
                $this->dir = BASE_PATH . 'application/movies/' . strtolower($langdir) . '/' . strtolower($langdir) . '.lang.php';
                $this->user_lang = array_diff($langdirs, array($langdir));
                return false;
            } else {
                $this->dir = BASE_PATH . 'application/movies/en/en.lang.php';
                $this->user_lang = array_diff($langdirs, array('en'));
            }
        }
    }
    public function selectLang() {
        return $this->dir;
    }
    public function diffLang() {
        $movies_lang = array('en' => 'English', 'de' => 'German', 'da' => 'Danish', 'es' => 'Spanish', 'fr' => 'French', 'fi' => 'Finnish', 'cz' => 'Czech', 'nl' => 'Dutch', 'is' => 'Icelandic', 'tr' => 'Turkish', 'se' => 'Swedish', 'pt' => 'Portugues, Brazilian', 'bg' => 'Bulgarian', 'hu' => 'Hungarian', 'no' => 'Norwegian', 'pl' => 'Polish', 'ro' => 'Romanian', 'it' => 'Italian', 'ru' => 'Russian',);
        reset($movies_lang);
        $movie_langs = array_flip($movies_lang);
        $this->user_lang = array_intersect($movie_langs, $this->user_lang);
        return $this->user_lang;
    }
}
