<?php

class Session {

    public function __construct() {
        $this->init();
    }

    public static function init() {
        @session_start();
    }
    
    public static function exists($key){
        $tmp = false;
        if(isset($_SESSION[SESSION_KEY][$key])){
            $tmp = true;
        }
        return $tmp;
    }

    public static function set($key, $value) {
        $_SESSION[SESSION_KEY][$key] = $value;
    }

    public static function get($key) {
        if (self::exists($key)) {
            return $_SESSION[SESSION_KEY][$key];
        }
        return null;
    }
    
    public static function delete($key){
        if(self::exists($key)){
            unset($_SESSION[SESSION_KEY][$key]);
        }
    }
    
    public static function destroy() {
        session_destroy();
    }

}