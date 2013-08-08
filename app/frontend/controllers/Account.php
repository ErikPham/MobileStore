<?php

class Account extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->layout = 'home';
    }
   
    function index(){
        Util::redirectTo('index');
    }

    public function register() {
        $this->view->title = 'Đăng ký tài khoản';
        $this->view->render('account/register');
    }

    public function login() {
        if (Request::isPost()) {
            $data = array(
                'username' => $_POST['username'],
                'password' => HASH::create('sha1', "{$_POST['password']}", HASH_PASSWORD_KEY)
            );
            if ($this->model->checkLogin($data) == true) {
                Util::redirectTo('index');
            } else{
                $this->view->message = Util::alertMessage('Tên tài khoản hoặc mật khẩu sai', 'Có lỗi');
            }
        }
        $this->view->title = 'Đăng nhập tài khoản';
        $this->view->render('account/login');
    }

}

?>
