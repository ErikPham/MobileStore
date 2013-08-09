<?php

class Date {

    public static function convertTimestamp($value, $format = 'm/d/Y H:i:s') {
        $result = date($value, $format);
        return $result;
    }

    public static function getDate($value, $format = 'd/m/Y') {
        return Date::convertTimestamp($format, $value);
    }

    public static function getDatetime($value, $format = 'd/m/Y H:i:s') {
        return Date::convertTimestamp($format, $value);
    }

}

?>
