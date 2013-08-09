<?php

class Date {
    
    public static function convertTimestamp($value, $format = 'm/d/Y H:i:s') {
        return date($value, $format);
    }

    public static function getDate($value, $format = 'd/m/Y') {
        return $this->convertTimestamp($value, $format);
    }

    public static function getDatetime($value, $format = 'd/m/Y H:i:s') {
        return $this->convertTimestamp($value, $format);
    }

}

?>
