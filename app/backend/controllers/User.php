<?php

class User extends Controller {

    private $util;
    public static $rules = array(
        'fullname' => array(
            'type' => 'string',
            'required' => true,
            'min' => 6,
            'max' => 50,
            'trim' => true
        ),
        'mobile' => array(
            'type' => 'string',
            'required' => true,
            'min' => 10,
            'max' => 11,
            'trim' => true
        ),
        'address' => array(
            'type' => 'string',
            'required' => false,
            'min' => 10,
            'max' => 255,
            'trim' => true
        ),
        'bio' => array(
            'type' => 'string',
            'required' => false,
            'min' => 10,
            'max' => 255,
            'trim' => true
        )
    );
    private $change_label = array(
        'fullname' => 'Họ tên',
        'mobile' => 'Số điện thoại',
        'address' => 'Địa chỉ',
        'bio' => 'Sở thích'
    );
    public $valid;

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->layout = 'main';
        $this->valid = new Validation();
        $this->util = new Util();
    }

    function editProfile() {
        $this->view->user = $this->model->editProfile(Session::get('userid'));
        $this->view->title = 'Edit Profile';
        $this->view->render('user/editprofile');
    }

    function saveProfile() {
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST);
            $this->valid->run();
            $this->valid->changeLabel($this->change_label);
            $this->view->title = 'Có lỗi xảy ra';
            if ($this->valid->isValid()) {
                if ($this->model->updateProfile($_POST, Session::get('userid'))) {
                    $this->view->title = 'Thay đổi thông tin thành công';
                    $this->view->message = $this->util->alertMessage('Bạn đã cập nhật thành công', 'Thành công', 'success');
                } else {
                    $this->view->message = $this->util->alertMessage('Bạn chưa thay đổi thông tin hoặc đã xảy ra lỗi. Vui lòng thử lại', 'Có lỗi', 'error');
                }
            } else {
                if (isset($this->valid->error['diff_key'])) {
                    $message = 'Dữ liệu đầu vào không hợp lệ';
                } else {
                    $message = 'Bạn vui lòng kiểm tra lại các trường dữ liệu.';
                }
                $this->view->message = $this->util->alertMessage($message, 'Có lỗi', 'error');
                $this->util->errors = $this->valid->errors;
            }
            $this->view->user = $_POST;
            $this->view->util = $this->util;
            $this->view->render('user/editprofile');
        } else {
            Util::redirectTo('backend');
        }
    }

    function changePassword() {
        $this->view->render('user/changepassword');
    }

    function savePassword() {
        $rules = array(
            'old' => array(
                'type' => 'string',
                'required' => true,
                'min' => 6,
                'max' => 40,
                'trim' => true
            ),
            'new' => array(
                'type' => 'string',
                'required' => true,
                'min' => 6,
                'max' => 40,
                'trim' => true
        ));

        if (Request::isPost()) {
            $this->valid->addRules($rules);
            $this->valid->addSource($_POST, true);
            $this->valid->run();
            $this->valid->changeLabel(array('old' => 'Mật khẩu cũ', 'new' => 'Mật khẩu mới'));
            if ($this->valid->isValid()) {
                $this->view->title = 'Có lỗi xảy ra';
                if (Request::existsPost('old') && $this->model->checkPassword(HASH::create('sha1', $_POST['old'], HASH_PASSWORD_KEY), Session::get('userid'))) {
                    if (Request::post('new') == Request::post('confirm') && !is_null(Request::post('new'))) {
                        $password = HASH::create('sha1', Request::post('new'), HASH_PASSWORD_KEY);
                        if ($this->model->savePassword(array('password' => $password), Session::get('userid'))) {
                            $this->view->title = 'Thay đổi thông tin thành công';
                            $this->view->message = $this->util->alertMessage('Bạn đã cập nhật thành công', 'Thành công', 'success');
                        } else {
                            $this->view->message = $this->util->alertMessage('Bạn chưa thay đổi thông tin hoặc đã xảy ra lỗi. Vui lòng thử lại', 'Có lỗi', 'error');
                        }
                    } else {
                        $this->view->message = $this->util->alertMessage('Hai mật khẩu không trùng nhau. Vui lòng kiểm tra lại', 'Có lỗi', 'error');
                    }
                } else {
                    $this->view->message = $this->util->alertMessage('Mật khẩu cũ không đúng. Vui lòng kiểm tra lại', 'Có lỗi', 'error');
                }
            } else {
                if (isset($this->valid->error['diff_key'])) {
                    $message = 'Dữ liệu đầu vào không hợp lệ';
                } else {
                    $message = 'Bạn vui lòng kiểm tra lại các trường dữ liệu.';
                }
                $this->view->message = $this->util->alertMessage($message, 'Có lỗi', 'error');
                $this->util->errors = $this->valid->errors;
            }

            $this->view->util = $this->util;
            $this->view->render('user/changepassword');
        } else {
            Util::redirectTo('backend');
        }
    }

    function logout() {
        Session::destroy();
        Util::redirectTo('backend/login');
    }

}

?>
