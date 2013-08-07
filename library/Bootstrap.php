<?php

class Bootstrap extends URI {

    public static $path;
    public static $segment = array();

    public function __construct() {
        parent::__construct();
        define('PATH', SITE_PATH . "app/" . URI::$dir . "/");
        define('CONTRONLLER', PATH . 'controllers/');
        define('VIEW', PATH . 'views/');
        define('LAYOUT', VIEW . 'layout/');
        define('MODEL', 'models/');
    }

    public function run() {
        if (empty(URI::$segments[0]) || ($this->isBackEnd() === true && empty(URI::$segments[1]))) {
            $this->index();
            return false;
        }

        if ($this->isBackEnd()) {
            array_shift(URI::$segments);
        }

        if (!empty(URI::$segments[0])) {
            $file = CONTRONLLER . URI::$segments[0] . '.php';

            if (file_exists($file)) {
                require $file;
            } else {
                return $this->error();
            }


            $controller = new URI::$segments[0];
            $controller->loadModel(URI::$segments[0]);

            //Gọi method
            if (isset(URI::$segments[1])) {
                if (method_exists($controller, URI::$segments[1])) {
                    $controller->{URI::$segments[1]}();
                } else {
                    $this->error();
                }
            } else {
                $controller->index();
            }
        } else {
            $this->error();
        }
    }

    private function index() {
        require CONTRONLLER . 'index.php';
        $controller = new Index();
        $controller->loadModel('index');
        $controller->index();
    }

    private function error() {
        require CONTRONLLER . 'error.php';
        $controller = new Error();
        $controller->index();
        return false;
    }

    public function import($imports, $path = './') {
        if (is_array($imports)) {
            foreach ($imports as $import) {
                $arg = explode('.', $import);
                $count = count($arg);
                $end = $arg[$count - 1];
                $folder = array_pop($arg);
                $folder = implode('/', $arg);
                //Check is fordel
                if (is_dir($folder)) {
                    if ($end == '*') {
                        $handle = opendir($folder);
                        if ($handle) {
                            while (($file = readdir($handle)) !== false) {
                                if ($file != "." && $file != "..") {
                                    $fullPath = $path . $folder . '/' . $file;
                                    if (is_file($fullPath)) {
                                        require $fullPath;
                                    }
                                }
                            }
                        }
                    } else {
                        $fullPath = $path . $folder . '/' . $end . '.php';
                        if (is_file($fullPath)) {
                            require $fullPath;
                        }
                    }
                }//No is_dir stop
            }
        }
        return false;
    }

}