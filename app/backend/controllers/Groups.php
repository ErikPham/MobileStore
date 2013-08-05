<?php

class Groups extends Controller {

    private $util;
    public static $rules = array(
        'name' => array(
            'type' => 'string',
            'required' => true,
            'min' => 3,
            'max' => 100,
            'trim' => true
        ),
        'summary' => array(
            'type' => 'string',
            'required' => true,
            'min' => 6,
            'max' => 255,
            'trim' => true
        ),
        'status' => array(
            'type' => 'numeric',
            'required' => true,
            'min' => 0,
            'max' => 999,
            'trim' => false
        ),
        'type' => array(
            'type' => 'numeric',
            'required' => true,
            'min' => 0,
            'max' => 999,
            'trim' => true
        )
    );
    private $change_lable = array(
        'name' => 'Tên nhóm',
        'summary' => 'Tóm tắt',
        'status' => 'Trạng thái',
        'type' => 'Phân loại'
    );

    public function __construct() {
        parent::__construct();
        Session::init();
        $this->view->layout = 'main';
        $this->valid = new Validation();
        $this->util = new Util();
    }

    public function index() {
        $this->view->groups = $this->model->getAllGroups();
        $this->view->title = 'Danh sách nhóm';
        $this->view->render('groups/view');
    }

    public function add() {
        $this->view->type = $this->model->getArrayType();
        $this->view->status = $this->model->getStatus();
        $this->view->title = 'Thêm mới nhóm';
        $this->view->render('groups/add');
    }

    public function edit() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            $this->view->group = $this->model->getEdit($id);
            $this->view->type = $this->model->getArrayType();
            $this->view->status = $this->model->getStatus();
            $this->view->title = 'Cập nhập nhóm';
            $this->view->render('groups/edit');
        } else {
            Util::redirectTo('backend/category');
        }
    }

    public function delete() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            if ($this->model->deleteGroup($id)) {
                Util::redirectTo('backend/groups');
            }
        } else {
            Util::redirectTo('backend/groups');
        }
    }

    public function saveAdd() {
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST, true);
            $this->valid->run();
            $this->valid->changeLabel($this->change_lable);
            $this->view->title = 'Có lỗi xảy ra';
            if ($this->valid->isValid()) {
                $data = $_POST;
                if ($this->model->saveAdd($data)) {
                    $this->view->title = 'Thêm mới nhóm thành công';
                    $this->view->message = $this->util->alertMessage('Bạn đã thêm mới nhóm thành công', 'Thành công', 'success');
                } else {
                    $this->view->message = $this->util->alertMessage('Đã xảy ra lỗi. Vui lòng thử lại', 'Có lỗi', 'error');
                }
            } else {
                if (isset($this->valid->error['diff_key'])) {
                    $message = 'Kiểm tra dữ liệu đầu vào';
                } else {
                    $message = 'Bạn vui lòng kiểm tra lại các trường dữ liệu';
                }
                $this->view->message = $this->util->alertMessage($message, 'Có lỗi', 'error');
                $this->util->errors = $this->valid->errors;
            }
            $this->view->type = $this->model->getArrayType();
            $this->view->status = $this->model->getStatus();
            $this->view->groups = $_POST;
            $this->view->util = $this->util;
            $this->view->render('groups/add');
        } else {
            Util::redirectTo('backend/groups');
        }
    }

    public function saveEdit() {
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST);
            $this->valid->run();
            $this->valid->changeLabel($this->change_lable);
            $this->view->title = 'Có lỗi xảy ra';
            $id = Request::post('id');
            $data = $_POST;
            if ($this->valid->isValid()) {
                if ($this->model->saveUpdate($data, $id)) {
                    $this->view->title = 'Cập nhập chuyên mục thành công';
                    $this->view->message = $this->util->alertMessage('Bạn đã cập nhập chuyên mục thành công', 'Thành công', 'success');
                } else {
                    $this->view->message = $this->util->alertMessage('Bạn chưa thay đổi thông tin hoặc đã xảy ra lỗi. Vui lòng thử lại', 'Có lỗi', 'error');
                }
            } else {
                if (isset($this->valid->error['diff_key'])) {
                    $message = 'Kiểm tra dữ liệu đầu vào';
                } else {
                    $message = 'Bạn vui lòng kiểm tra lại các trường dữ liệu';
                }
                $this->view->message = $this->util->alertMessage($message, 'Có lỗi', 'error');
                $this->util->errors = $this->valid->errors;
            }
            $this->view->type = $this->model->getArrayType();
            $this->view->status = $this->model->getStatus();
            $this->view->groups = $_POST;
            $this->view->util = $this->util;
            $this->view->render('groups/edit');
        } else {
            Util::redirectTo('backend/groups');
        }
    }

}

?>
