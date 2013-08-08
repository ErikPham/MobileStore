<?php

class Account extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->layout = 'home';
    }
    
    public function register() {
        $this->view->title = 'Đăng ký tài khoản';
        $this->view->render('account/register');
    }
    
     public function login() {
        $this->view->title = 'Đăng nhập tài khoản';
        $this->view->render('account/login');
    }
    
}

?>
