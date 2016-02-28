<?php
class Video {
    private $core;
    public function get_video($filelink, $hosts) {
        if (preg_match($hosts, $filelink) !== false) {
            $new_host = str_replace('/', '', $hosts);
            $new_host = str_replace("\.", '.', $new_host);
            $new_host = explode('|', $new_host);
            $new_filelink = str_between($filelink, '//', '/');
            if (in_array($new_filelink, $new_host)) {
                foreach ($new_host as $new => $host) {
                    if ($new_filelink == $host) {
                        $corelink = str_replace('.', '_', $host);
                        if (file_exists(BASE_PATH . 'application/corelink/' . strtolower($corelink) . '.php')) {
                            $this->core = BASE_PATH . 'application/corelink/' . strtolower($corelink) . '.php';
                        } else {
                            echo ' An error occured. Please check real url of ' . strtolower($corelink) . '.php';
                        }
                    }
                }
            }
        } else {
            echo 'No link available!';
        }
        return $this->core;
    }
}
