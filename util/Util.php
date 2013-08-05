<?php

class Util {

    public $errors;

    public static function redirectTo($page = 'index') {
        header('Location: ' . URL . $page);
    }

    public function alertErrorField($key) {
        if (isset($this->errors) && array_key_exists($key, $this->errors)) {
            echo '<span for="textfield" class="help-block error">' . $this->errors[$key] . '</span>';
        }
    }

    public function alertMessage($notice, $name, $type = 'error') {
        $class = 'alert-';
        switch ($type) {
            case 'success':
                $class .= 'success';
                break;
            case 'info':
                $class .= 'info';
                break;
            default:
                $class .= 'error';
                break;
        }
        $message = '<div id="mgt8" class="alert ' . $class . '">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <strong>' . $name . '! </strong>' . $notice . '</div>';
        return $message;
    }

    public static function liActive($name = null, $index = 0) {
        if (($name === 'index' && is_null(URI::getSegment(0))) || URI::getSegment($index) == $name) {
            echo "class='active'";
        }
    }

    public static function convertViToEn($str) {
        $strReplate = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $strReplate = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $strReplate);
        $strReplate = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $strReplate);
        $strReplate = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $strReplate);
        $strReplate = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $strReplate);
        $strReplate = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $strReplate);
        $strReplate = preg_replace("/(đ)/", 'd', $strReplate);
        $strReplate = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $strReplate);
        $strReplate = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $strReplate);
        $strReplate = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $strReplate);
        $strReplate = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $strReplate);
        $strReplate = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $strReplate);
        $strReplate = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $strReplate);
        $strReplate = preg_replace("/(Đ)/", 'D', $strReplate);
        $strReplate = strtolower($strReplate);
        return $strReplate;
    }

    public static function toSlug($str, $type = '.html') {
        $strReplate = Util::convertViToEn($str);
        $strReplate = trim($strReplate);
        $strReplate = preg_replace('/[^a-z0-9-]/', '-', $strReplate);
        $strReplate = preg_replace('/-+/', "-", $strReplate);
        $strReplate = $strReplate . $type;
        return $strReplate;
    }
}
?>
