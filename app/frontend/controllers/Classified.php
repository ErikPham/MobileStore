<?php

class Classified extends Controller {

    private static $rules = array(
        'title' => array(
            'type' => 'string',
            'required' => true,
            'min' => 6,
            'max' => 255,
            'trim' => true
        ),
        'content' => array(
            'type' => 'string',
            'required' => true,
            'min' => 50,
            'max' => 500,
            'trim' => true
        ),
        'price' => array(
            'type' => 'numeric',
            'required' => true,
            'min' => 100,
            'max' => 20000,
            'trim' => true
        ),
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
        'mobile' => array(
            'type' => 'string',
            'required' => true,
            'min' => 10,
            'max' => 11,
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
        'title' => 'Tiêu đề',
        'content' => 'Nội dung',
        'price' => 'Giá',
        'email' => 'Đây',
        'name' => 'Họ tên',
        'mobile' => 'Số điện thoại',
        'captcha' => 'Xác nhận',
    );

    function __construct() {
        parent::__construct();
        $this->valid = new Validation();
        $this->util = new Util();
    }

    function index() {
        
    }

    function view() {
        $breadcrum = array(
            array('name' => 'Thông tin rao vặt')
        );
        $this->view->title = 'Thông tin rao vặt';
        $this->view->breadcrums = Breadcrumb::view($breadcrum);
        $this->view->layout = 'home';
        $this->view->render('classified/view');
    }

    function viewdetail() {
        $id = URI::getSegment(2);
        if (is_numeric($id)) {

            $data = $this->model->getClassified($id);
            $relates = $this->model->getListRelate();
            if (!empty($data)) {
                $breadcrum = array(
                    array('url' => 'classified/view/thong-tin-rao-vat.html', 'name' => 'Rao vặt'),
                    array('name' => $data['title'])
                );
                $this->view->title = 'Thông tin rao vặt';
                $this->view->breadcrums = Breadcrumb::view($breadcrum);
                $this->view->layout = 'home';
                $this->view->data = $data;
                $this->view->relates = $relates;
                $this->view->render('classified/viewdetail');
            } else {
                Util::redirectTo();
            }
        } else {
            Util::redirectTo();
        }
    }

    function getLocaltion() {
        $data = $this->model->getLocation();
        $location = array('id' => 0, 'label' => 'Toàn quốc');
        array_unshift($data, $location);

        echo json_encode($data);
    }

    function xhrList() {
        if (Request::isPost()) {
            $type = Request::post('type');
            $currentPage = Request::post('page');

            $display = 3;
            $pagination = new Pagination($display);
            $pagination->setTotal($this->getTotal($type));
            $start = $display * ($currentPage - 1);
            $pagination->type = 1;
            $pagination->setStart($currentPage);

            $options = $this->buildOption($type, $start, $display);
            $data = $this->model->getLists($options);
            $this->view->type = $type;
            $this->view->layout = 'blank';
            $this->view->items = $data;
            $this->view->page = $pagination->createLinks();
            $this->view->render('classified/list');
        }
    }

    function buildOption($type, $start = 0, $display = 0) {
        if (Request::isPost()) {
            $price = Request::post('price');
            $time = Request::post('time');
            $type = Request::post('type');
            if ($price == 10) {
                $where = 'price > 90000';
            } elseif ($price != '') {
                $where = 'price <= ' . $price . '000';
            } else {
                $where = 'price > 0';
            }
            switch ($time) {
                case '7':
                    $beforeTime = strtotime('-1weeks');
                    $where .= " and {$beforeTime} <= post_date";
                    break;
                case '30':
                    $beforeTime = strtotime('-1months');
                    $where .= " and {$beforeTime} <= post_date";
                    break;
                case '90':
                    $beforeTime = strtotime('-3months');
                    $where .= " and {$beforeTime} <= post_date";
                    break;
                default:
                    $beforeTime = strtotime('-1days');
                    $where .= " and {$beforeTime} <= post_date";
                    break;
            }

            if (is_numeric($type) && ($type == 1 || $type == 2)) {
                $where .= " and post_type = {$type}";
            }
            $where .= (Request::post('city') == 0) ? '' : ' and location_id = ' . Request::post('city') . ' ';
            $options = array('where' => $where, 'limit' => "{$start}, {$display}");
        }
        return $options;
    }

    function getTotal($type) {
        return $this->model->getTotals($this->buildOption($type, 0, 1));
    }

    function post() {
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST);
            $this->valid->run();
            $this->valid->changeLabel($this->change_label);
            if ($this->valid->isValid()) {
                if (Captcha::checkAnswer(Request::post('captcha'))) {
                    unset($_POST['captcha']);
                    $_POST['status'] = 1;
                    if ($this->model->post($_POST)) {
                        $this->view->classified = array();
                        $this->view->message = $this->util->alertMessage('Bạn đã đăng tin thành công. Chúng tôi sẽ xác nhận trong thời gian sớm nhất', 'Thành công', 'success');
                    } else {
                        $this->view->message = $this->util->alertMessage('Có lỗi xảy ra. Bạn vui lòng thử lại sau', 'Có lỗi', 'error');
                    }
                } else {
                    $this->view->classified = $_POST;
                    $this->view->message = $this->util->alertMessage('Câu trả lời xác nhận của bạn không chính xác. Lưu ý: Câu trả lời là số', 'Có lỗi', 'error');
                }
            } else {
                if (isset($this->valid->error['diff_key'])) {
                    $message = 'Dữ liệu đầu vào không hợp lệ';
                } else {
                    $message = 'Bạn vui lòng kiểm tra lại các trường dữ liệu.';
                }
                $this->view->message = $this->util->alertMessage($message, 'Có lỗi', 'error');
                $this->view->util = $this->util;
                $this->view->classified = $_POST;
            }
        }

        $locations = $this->model->getLocation();
        array_unshift($locations, array('id' => 0, 'label' => 'Toàn quốc'));
        $this->view->locations = $locations;


        $this->util->errors = $this->valid->errors;
        $this->view->util = $this->util;
        $this->view->title = 'Đăng tin rao vặt';
        $this->view->layout = 'home';
        $this->view->render('classified/post');
    }

}

?>
