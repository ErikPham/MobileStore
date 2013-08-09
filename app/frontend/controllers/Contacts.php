<?php

class Contacts extends Controller {

    private $util;
    private $valid;
    private $rules = array(
        'name' => array(
            'type' => 'string',
            'required' => true,
            'min' => 10,
            'max' => 50,
            'trim' => true
        ),
        'email' => array(
            'type' => 'email',
            'required' => true,
            'min' => 10,
            'max' => 150,
            'trim' => true
        ),
        'title' => array(
            'type' => 'string',
            'required' => true,
            'min' => 10,
            'max' => 255,
            'trim' => true
        ),
        'content' => array(
            'type' => 'string',
            'required' => true,
            'min' => 20,
            'max' => 1000,
            'trim' => true
        )
    );
    private $label = array(
        'email' => 'Địa chỉ email',
        'name' => 'Họ tên',
        'title' => 'Tiêu đề',
        'content' => 'Nội dung'
    );

    function __construct() {
        parent::__construct();
        $this->view->layout = 'home';
        $this->util = new Util();
        $this->valid = new Validation();
    }

    function send() {
        if (Request::isPost()) {
            $this->valid->addRules($this->rules);
            $this->valid->addSource($_POST);
            $this->valid->run();
            $this->valid->changeLabel($this->label);
            if ($this->valid->isValid()) {
                $_POST['contact_date'] = time();
                $_POST['status'] = 0;
                if ($this->model->sendContact($_POST)) {
                    $this->view->title = 'Đăng ký tài khoản thành công';
                    $this->view->message = $this->util->alertMessage('Chúng mừng bạn đã gửi liên hệ thành công. Chúng tôi sẽ liên hệ lại với bạn qua email. Xin cảm ơn!', 'Thành công', 'success');
                    $_POST = array();
                } else {
                    $this->view->message = $this->util->alertMessage('Có lỗi xảy ra. Bạn vui lòng gửi lại sau.', 'Có lỗi');
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
            $this->view->contact = $_POST;
        }
        $this->view->util = $this->util;
        $this->view->title = 'Liên hệ với chúng tôi';
        $this->view->render('contacts/index');
    }

}

?>
