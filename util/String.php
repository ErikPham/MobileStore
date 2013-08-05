<?php

class String {

    public static function theExcerpt($text, $strLen = 255) {
        $sanitized = htmlentities($text, ENT_COMPAT, 'UTF-8');
        if (strlen($sanitized) > $strLen) {
            $cutString = substr($sanitized, 0, $strLen);
            $words = substr($sanitized, 0,  strrpos($cutString, ' '));
            return $words;
        }
        return $sanitized;
    }

}

?>
