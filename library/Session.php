<?php

class Session {

    public function __construct() {
        $this->init();
    }

    public static function init() {
        @session_start();
    }

    public static function set($key, $value) {
        $_SESSION[SESSION_KEY][$key] = $value;
    }

    public static function get($key) {
        if (isset($_SESSION[SESSION_KEY][$key])) {
            return $_SESSION[SESSION_KEY][$key];
        }
        return null;
    }

    public static function destroy() {
        session_destroy();
    }

}