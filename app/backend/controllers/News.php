<?php

/**
 * Create date: 04-08-2013
 * @author Lại Đạo 
 * Category
 */
class News extends Controller {

    private $util;
    public static $rules = array(
        'title' => array(
            'type' => 'string',
            'required' => true,
            'min' => 3,
            'max' => 255,
            'trim' => true
        ),
        'description' => array(
            'type' => 'string',
            'required' => true,
            'min' => 3,
            'max' => 255,
            'trim' => true
        ),
        'content' => array(
            'type' => 'string',
            'required' => true,
            'min' => 0,
            'max' => 0,
            'trim' => true
        ),
        'category_id' => array(
            'type' => 'numeric',
            'required' => true,
            'min' => 0,
            'max' => 999,
            'trim' => true
        ),
        'status' => array(
            'type' => 'numeric',
            'required' => true,
            'min' => 0,
            'max' => 999,
            'trim' => true
        )
    );
    private $change_lable = array(
        'title' => 'Tiêu đề ',
        'description' => 'Mô tả',
        'content' => 'Nội dung',
        'category_id' => 'Chuyên mục',
        'status' => 'Trạng thái'
    );

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->layout = 'main';
        $this->valid = new Validation();
        $this->util = new Util();
    }

    function index() {
        $this->view->news = $this->model->getAllNews();
        $this->view->title = 'Danh sách tin tức';
        $this->view->render('news/view');
    }

    function add() {
        $this->view->cats = $this->model->getCategoryNews();
        $this->view->status = $this->model->getStatus();
        $this->view->title = 'Thêm mới tin tức';
        $this->view->render('news/add');
    }

    function edit() {
        
    }

    function delete() {
        
    }

    function saveEdit() {
        
    }

    function saveAdd() {
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST, true);
            $this->valid->run();
            $this->valid->changeLabel($this->change_lable);
            $this->view->title = 'Có lỗi xảy ra';
            $data = $_POST;
            if ($this->valid->isValid()) {
                if ($this->model->saveAdd($_POST)) {
                    $this->view->title = 'Thêm mới tin tức thành công';
                    $this->view->message = $this->util->alertMessage('Bạn đã thêm mới tin tức thành công', 'Thành công', 'success');
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
            $this->view->cats = $this->model->getCategoryNews();
            $this->view->status = $this->model->getStatus();
            $this->view->category = $_POST;
            $this->view->util = $this->util;
            $this->view->render('news/add');
        } else {
            Util::redirectTo('backend/news');
        }
    }

}

?>
