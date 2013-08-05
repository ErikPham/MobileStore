<?php

class Request {

    public static function isPost() {
        $tmp = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tmp = true;
        }
        return $tmp;
    }

    public static function existsPost($key) {
        $tmp = false;
        if (isset($_POST[$key])) {
            $tmp = true;
        }
        return $tmp;
    }

    public static function post($key) {
        $post = null;
        if (Request::existsPost($key)) {
            $post = $_POST[$key];
        }
        return $post;
    }

    public static function isPostNumber($key) {
        $tmp = false;
        if (Request::post($key) != null) {
            if (filter_var(Request::post($key), FILTER_VALIDATE_INT)) {
                $tmp = true;
            }
        }
        return $tmp;
    }

}

?>
