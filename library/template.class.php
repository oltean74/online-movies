<?php

 if (!defined('BASE_PATH')) {
     exit('No direct script access allowed');
 }

class Template
{
    /** Display Template **/
    public $path;

    public function template_path()
    {
        if (file_exists(BASE_PATH.'application/views/view.php')) {
            $path = BASE_PATH.'application/views/view.php';
        } else {
            echo $path.' view.php file not found';
        }

        return $path;
    }
}
