<?php

class Login extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $this->view->layout = 'login';
        $this->view->title = 'Login';
    }

    function index() {
        $this->view->render('login/index');
    }

    function run() {
        if (Request::isPost()) {
            $data = array(
                'username' => $_POST['username'],
                'password' => HASH::create('sha1', "{$_POST['password']}", HASH_PASSWORD_KEY)
            );
            if ($this->model->checkLogin($data) == true) {
                Util::redirectTo('backend');
            } else {
                $this->view->data = $_POST;
                $this->view->title = 'Có lỗi xảy ra';
                $this->index();
            }
        } else {
            Util::redirectTo('backend/login');
        }
    }
}

?>
