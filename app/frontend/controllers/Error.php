<?php

class Error extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->layout = 'error';
    }

    function index() {
        $this->view->message = '<p>Xin lỗi! Chúng tôi không tìm thấy trang bạn yêu cầu. Vui lòng click <a href="' . URL . '">vào đây</a> để quay lại</p>';
        $this->view->render('error/index');
    }

}