<?php

class Classified extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        
    }

    function view() {
        $this->view->title = 'Thông tin rao vặt';
        $this->view->layout = 'home';
        $this->view->render('classified/view');
    }

    function viewdetail() {
        $id = URI::getSegment(2);
        if (is_numeric($id)) {
            $data = $this->model->getClassified($id);
            $relates = $this->model->getListRelate();
            if (!empty($data)) {
                $this->view->title = 'Thông tin rao vặt';
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
        $this->view->title = 'Đăng tin rao vặt';
        $this->view->layout = 'home';
        $this->view->render('classified/post');
    }

}

?>
