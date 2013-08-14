<?php

class URI {

    public $uri;
    public static $segments;
    public static $dir;

    function __construct() {
        $this->uri = isset($_GET['url']) ? $_GET['url'] : null;
        $this->uri = rtrim($this->uri, '/');
        URI::$dir = 'frontend';
        $this->splitUrl();
        $this->isBackEnd();
    }

    public static function isBackEnd() {
        if (URI::$segments[0] == 'backend') {
            URI::$dir = 'backend';
            return true;
        }
        return false;
    }

    public function splitUrl() {
        URI::$segments = explode('/', $this->uri);
    }

    public static function getSegment($index = 2) {
        if (URI::isBackEnd()) {
            $index = $index + 1;
        }

        if (isset(URI::$segments[$index])) {
            return URI::$segments[$index];
        }
    }
    

}

?>
