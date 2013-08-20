<?php

class Captcha {

    private static $captcha = array(
        1 => array(
            'question' => 'Nàng bạch tuyết và ... chú lùn',
            'answer' => 7
        ),
        2 => array(
            'question' => 'Alibaba và ... tên cướp',
            'answer' => 40
        ),
        3 => array(
            'question' => 'Việt nam có bao nhiêu tỉnh thành?',
            'answer' => 63
        ),
        4 => array(
            'question' => 'Một cộng năm trừ hai bằng?',
            'answer' => 4
        ),
        5 => array(
            'question' => 'Bốn nhân bốn bằng?',
            'answer' => 16
        ),
        6 => array(
            'question' => 'Con chó có bao nhiêu chân?',
            'answer' => 4
        )
    );

    function __construct() {
        
    }

    public static function getCaptcha() {
        $rand_key = array_rand(self::$captcha);
        Session::set('captcha', self::$captcha[$rand_key]);
        return self::$captcha[$rand_key]['question'];
    }

    public static function checkAnswer($answer) {
        $tmp = false;
        $captcha = Session::get('captcha');
        if ($captcha['answer'] == $answer) {
            $tmp = true;
        }
        return $tmp;
    }

}

?>
