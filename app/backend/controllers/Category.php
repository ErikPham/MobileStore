<?php

/**
 * Create date: 04-08-2013
 * @author Lại Đạo 
 * Category
 */

class Category extends Controller {

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
        'position' => array(
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
        'name' => 'Tên chuyên mục',
        'summary' => 'Tóm tắt',
        'position' => 'Vị trí',
        'type' => 'Phân loại'
    );

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->layout = 'main';
        $this->valid = new Validation();
        $this->util = new Util();
    }

    function index() {
        $this->view();
    }

    function add() {
        $this->view->type = $this->model->getArrayType();
        $this->view->position = $this->model->getCountPosition();
        $this->view->title = 'Thêm mới chuyên mục';
        $this->view->render('category/add');
    }

    function view() {
        $this->view->category = $this->model->getAllCategory();
        $this->view->title = 'Danh sách chuyên mục';
        $this->view->render('category/view');
    }

    function delete() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            if ($this->model->deleteCategory($id)) {
                Util::redirectTo('backend/category');
            }
        } else {
            Util::redirectTo('backend/category');
        }
    }

    function edit() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            $this->view->category = $this->model->editCategory($id);
            $this->view->type = $this->model->getArrayType();
            $this->view->position = $this->model->getCountPosition();
            $this->view->title = 'Sửa chuyên mục';
            $this->view->render('category/edit');
        } else {
            Util::redirectTo('backend/category');
        }
    }

    function saveEdit() {
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST);
            $this->valid->run();
            $this->valid->changeLabel($this->change_lable);
            $this->view->title = 'Có lỗi xảy ra';
            if (Request::isPostNumber('id')) {
                $id = Request::post('id');
                $data = $_POST;
                if ($this->valid->isValid()) {
                    if ($this->model->saveEdit($data, $id)) {
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
                $this->view->position = $this->model->getCountPosition();
                $this->view->category = $_POST;
                $this->view->util = $this->util;
                $this->view->render('category/edit');
            } else {
                Util::redirectTo('backend/category');
            }
        } else {
            Util::redirectTo('backend/category');
        }
    }

    function saveAdd() {
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST, true);
            $this->valid->run();
            $this->valid->changeLabel($this->change_lable);
            $this->view->title = 'Có lỗi xảy ra';
            if ($this->valid->isValid()) {
                $data = $_POST;
                if ($this->model->insertCategory($data)) {
                    $this->view->title = 'Thêm mới chuyên mục thành công';
                    $this->view->message = $this->util->alertMessage('Bạn đã thêm mới chuyên mục thành công', 'Thành công', 'success');
                    $category = array();
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
            $this->view->position = $this->model->getCountPosition();
            $this->view->category = $_POST;
            $this->view->util = $this->util;
            $this->view->render('category/add');
        } else {
            Util::redirectTo('backend/category');
        }
    }

}

?>
