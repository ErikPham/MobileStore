<?php

class Account extends Controller {

    private $util;
    private $valid;
    private $url;
    private static $rules = array(
        'username' => array(
            'type' => 'string',
            'required' => true,
            'min' => 6,
            'max' => 32,
            'exists' => 'accounts',
            'trim' => true
        ),
        'password' => array(
            'type' => 'string',
            'required' => true,
            'min' => 6,
            'max' => 32,
            'trim' => true
        ),
        'confirm' => array(
            'type' => 'equals',
            'required' => true,
            'key' => 'password'
        ),
        'email' => array(
            'type' => 'email',
            'required' => true,
            'min' => 10,
            'max' => 150,
            'exists' => 'accounts',
            'trim' => true
        ),
        'fullname' => array(
            'type' => 'string',
            'required' => true,
            'min' => 10,
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
            'required' => true,
            'min' => 10,
            'max' => 255,
            'trim' => true
        ),
        'captcha' => array(
            'type' => 'numeric',
            'required' => true,
            'min' => 0,
            'max' => 1000,
            'trim' => true
        )
    );
    private $change_label = array(
        'username' => 'Tên tài khoản',
        'password' => 'Mật khẩu',
        'confirm' => 'Hai mật khẩu',
        'email' => 'Địa chỉ email',
        'fullname' => 'Họ tên',
        'mobile' => 'Số điện thoại',
        'address' => 'Địa chỉ',
    );
    private $rules_updateInfo = array(
        'fullname' => array(
            'type' => 'string',
            'required' => true,
            'min' => 10,
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
            'required' => true,
            'min' => 10,
            'max' => 255,
            'trim' => true
        )
    );
    private $rules_changepassword = array(
        'old' => array(
            'type' => 'string',
            'required' => true,
            'min' => 6,
            'max' => 32,
            'trim' => true
        ),
        'new' => array(
            'type' => 'string',
            'required' => true,
            'min' => 6,
            'max' => 32,
            'trim' => true
        ),
        'confirm' => array(
            'type' => 'equals',
            'required' => true,
            'key' => 'new'
        ),
    );
    private $label_changepass = array(
        'new' => 'Mật khẩu mới',
        'old' => 'Mật khẩu cũ',
        'confirm' => 'Hai mật khẩu'
    );

    function __construct() {
        parent::__construct();
        $this->view->layout = 'home';
        $this->util = new Util();
        $this->valid = new Validation();
        $this->url = "account/myaccount/" . Util::toSlug('tai-khoan-ca-nhan-' . Session::get('username'));
    }

    function index() {
        $this->myaccount();
    }

    function changepassword() {
        if (Session::get('auth') == 1) {
            if (Request::isPost()) {
                $this->valid->addRules($this->rules_changepassword);
                $this->valid->addSource($_POST, true);
                $this->valid->run();
                $this->valid->changeLabel($this->label_changepass);
                if ($this->valid->isValid()) {
                    if (Request::existsPost('old') && $this->model->checkPassword(HASH::create('sha1', $_POST['old'], HASH_PASSWORD_KEY), Session::get('user_id'))) {
                        if (Request::post('old') != Request::post('new')) {
                            $password = HASH::create('sha1', Request::post('new'), HASH_PASSWORD_KEY);
                            if ($this->model->savePassword(array('password' => $password), Session::get('user_id'))) {
                                $this->view->title = 'Thay đổi mật khẩu thành công';
                                $this->view->message = $this->util->alertMessage('Bạn đã cập nhật thành công', 'Thành công', 'success');
                            } else {
                                $this->view->message = $this->util->alertMessage('Bạn chưa thay đổi thông tin hoặc đã xảy ra lỗi. Vui lòng thử lại', 'Có lỗi', 'error');
                            }
                        } else {
                            $this->view->message = $this->util->alertMessage('Mật khẩu mới phải khác mật khẩu cũ', 'Có lỗi', 'error');
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
                    $this->view->util = $this->util;
                }
            }
            $breadcrum = array(
                array('url' => $this->url, 'name' => 'Tài khoản'),
                array('name' => 'Thay đổi mật khẩu')
            );
            $this->view->layout = 'account';
            $this->view->title = "Thay đổi mật khẩu";
            $this->view->breadcrums = Breadcrumb::view($breadcrum);
            $this->view->render('account/changepassword');
        } else {
            Util::redirectTo();
        }
    }

    function myaccount() {
        if (Session::get('auth') == 1) {
            $id = Session::get('user_id');
            if (Request::isPost()) {
                $this->valid->addRules($this->rules_updateInfo);
                $this->valid->addSource($_POST);
                $this->valid->run();
                $this->valid->changeLabel($this->change_label);
                if ($this->valid->isValid()) {
                    if ($this->model->updateProfile($_POST, $id)) {
                        $this->view->message = $this->util->alertMessage('Bạn đã cập nhật thông tin thành công', 'Thành công', 'success');
                    } else {
                        $this->view->message = $this->util->alertMessage('Có lỗi xảy ra hoặc bạn chưa thay đổi thông tin. Bạn vui lòng thử lại', 'Có lỗi', 'error');
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
            }


            $breadcrum = array(
                array('name' => 'Tài khoản cá nhân')
            );

            $this->view->account = $this->model->editProfile($id);
            $this->view->layout = 'account';
            $this->view->title = "Thông tin tài khoản";
            $this->view->breadcrums = Breadcrumb::view($breadcrum);
            $this->view->render('account/myaccount');
        } else {
            Util::redirectTo();
        }
    }

    public function register() {
        if (Session::get('auth') != 1) {
            $this->view->title = 'Đăng ký tài khoản';
            if (Request::isPost()) {
                $this->valid->addRules(self::$rules);
                $this->valid->addSource($_POST);
                $this->valid->run();
                $this->valid->changeLabel($this->change_label);
                if ($this->valid->isValid()) {
                    if (Captcha::checkAnswer(Request::post('captcha'))) {
                        $key = Hash::create('md5', uniqid(rand(), true), HASH_GENERAL_KEY);
                        $flag = true;
                        $exists = new CheckExists();
                        if (Request::post('subscribe') == 1 && !$exists->check(Request::post('email'), 'email', 'subscribes')) {
                            $data = array('email' => Request::post('email'));
                            $flag = $this->model->subscribe($data);
                        }
                        $_POST['key'] = $key;
                        $_POST['active'] = 0;
                        $_POST['password'] = Hash::create('sha1', Request::post('password'), HASH_PASSWORD_KEY);
                        unset($_POST['subscribe']);
                        unset($_POST['confirm']);
                        if ($this->model->register($_POST) && $flag) {
                            $this->view->title = 'Đăng ký tài khoản thành công';
                            $email = base64_encode(Request::post('email'));
                            $message = "Chúc mừng bạn đã đăng ký tài khoản thành công tại MobileStore.Com.\nClick vào đường link " . URL . "account/active/{$email}/{$key}/kich-hoat-tai-khoan.html  để kích hoạt tài khoản";
                            $mail = new Mail();
                            if ($mail->Send(Request::post('email'), Request::post('fullname'), 'Đăng ký tài khoản thành công', $message)) {
                                $this->view->message = $this->util->alertMessage('Bạn đã đăng ký tài khoản thành công. Vui lòng kiểm tra email để kích hoạt', 'Thành công', 'success');
                            } else {
                                $this->view->message = $this->util->alertMessage('Chúng tôi không thể gửi được email kích hoạt cho bạn. Bạn vui lòng sử dụng chức năng gửi lại mã kích hoạt. Xin cảm ơn', 'Có lỗi', 'error');
                            }
                            $_POST = array();
                        } else {
                            $this->view->message = $this->util->alertMessage('Có lỗi xảy ra. Bạn vui lòng thử lại', 'Có lỗi', 'error');
                        }
                    } else {
                        $this->view->message = $this->util->alertMessage('Câu trả lời xác nhận của bạn không chính xác. Lưu ý: Câu trả lời là số', 'Có lỗi', 'error');
                    }
                } else {
                    if (isset($this->valid->error['diff_key'])) {
                        $message = 'Dữ liệu đầu vào không hợp lệ';
                    } else {
                        $message = 'Bạn vui lòng kiểm tra lại các trường dữ liệu.';
                    }
                    $this->view->message = $this->util->alertMessage($message, 'Có lỗi', 'error');
                    $this->util->errors = $this->valid->errors;
                    $this->view->account = $_POST;
                }
            }
            $this->view->util = $this->util;
            $this->view->breadcrums = Breadcrumb::view($breadcrum);
            $this->view->render('account/register');
        } else {
            Util::redirectTo();
        }
    }

    public function login() {
        if (Session::get('auth') != 1) {
            $breadcrum = array(
                array('name' => 'Đăng nhập tài khoản')
            );
            if (Request::isPost()) {
                $url = Request::post('redirect') ? Request::post('redirect') : 'index';
                $data = array(
                    'username' => $_POST['username'],
                    'password' => HASH::create('sha1', "{$_POST['password']}", HASH_PASSWORD_KEY)
                );

                if ($this->model->checkLogin($data) == true) {
                    Util::redirectTo($url);
                } else {
                    $this->view->message = Util::alertMessage('Tên tài khoản, mật khẩu sai. Hoặc tài khoản của bạn chưa được kích hoạt', 'Có lỗi');
                }
            }
            
            $this->view->title = 'Đăng nhập tài khoản';
            $this->view->breadcrums = Breadcrumb::view($breadcrum);
            $this->view->render('account/login');
        } else {
            Util::redirectTo();
        }
    }

    public function logout() {
        Session::destroy();
        Util::redirectTo();
    }

    function active() {
        $email = base64_decode(URI::getSegment(2));
        $key = URI::getSegment(3);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $breadcrum = array(
                array('name' => 'Kích hoạt tài khoản')
            );
            if ($this->model->activeAccount($email, $key)) {
                $this->view->message = $this->util->alertMessage('Chúc mừng bạn đã kích hoạt thành công. Bây giờ bạn có thể đăng nhập tài khoản', 'Thành công', 'success');
            } else {
                $this->view->message = $this->util->alertMessage('Đường link kích hoạt của bạn không hợp lệ. Vui lòng kiểm tra lại', 'Có lỗi');
            }
            $this->view->breadcrums = Breadcrumb::view($breadcrum);
            $this->view->title = 'Kích hoạt tài khoản';
            $this->view->render('account/login');
        } else {
            Util::redirectTo('index');
        }
    }

    function order() {
        if (Session::get('auth') == 1) {
            $breadcrum = array(
                array('url' => $this->url, 'name' => 'Tài khoản'),
                array('name' => 'Hóa đơn')
            );
            $id = Session::get('user_id');
            $this->model->getAllOrder($id);
            $this->view->order = $this->model->getAllOrder($id);
            $this->view->layout = 'account';
            $this->view->title = "Danh sách hóa đơn";
            $this->view->breadcrums = Breadcrumb::view($breadcrum);
            $this->view->render('account/order_list');
        } else {
            Util::redirectTo();
        }
    }

    function orderdeail() {
        if ((Session::get('auth') == 1) && $id = URI::getSegment(2)) {
            $breadcrum = array(
                array('url' => $this->url, 'name' => 'Tài khoản'),
                array('url' => 'account/order/' . Util::toSlug('hoa don mua hang' . Session::get('username')), 'name' => 'Hóa đơn'),
                array('name' => 'Chi tiết hóa đơn #' . $id)
            );
            $order = $this->model->getInfoOrder($id);
            $this->view->order = $order;
            $this->view->items = $this->model->getInfoOrderDetail($id);
            $this->view->total = $order['total_amout'];
            $this->view->layout = 'account';
            $this->view->title = "Danh sách hóa đơn";
            $this->view->breadcrums = Breadcrumb::view($breadcrum);
            $this->view->render('account/order_detail');
        }
    }

    function confirmorder() {
        if ((Session::get('auth') == 1) && $id = URI::getSegment(2)) {
            $status = $this->model->getOrderStatus($id);
            if (!empty($status)) {
                if ($status[0] == 1) {
                    $data = array('status' => 2);
                    $this->model->updateStatus($data, $id);
                    $url = 'account/orderdeail/' . $id . '/xem-chi-tiet-hoa-don.html';
                    Util::redirectTo($url);
                }
            }
        }
        Util::redirectTo();
    }

}

?>
