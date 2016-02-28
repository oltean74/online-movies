<?php
if (!defined('BASE_PATH')) {
    exit('No direct script access allowed');
}
class Template {
    /** Display Template **/
    public $path;
    public function template_path($path) {
        if (file_exists(BASE_PATH . 'application/views/' . $path . '.php')) {
            $path = BASE_PATH . 'application/views/' . $path . '.php';
        } else {
            echo $path . '.php file not found';
        }
        return $path;
    }
}
