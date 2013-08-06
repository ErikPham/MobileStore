<?php

/**
 * Create date: 04-08-2013
 * @author Lại Đạo 
 * Category
 */
class Adv extends Controller {

    private $util;

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->layout = 'main';
        $this->valid = new Validation();
        $this->util = new Util();
    }

    function index() {
        $this->view->advs = $this->model->getAllAdv();
        $this->view->title = 'Danh sách tin rạo vặt';
        $this->view->render('adv/view');
    }

    function detail() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            $this->view->adv = $this->model->getDetailAdv($id);
            $this->view->title = 'Chi tiết tin rạo vặt';
            $this->view->render('adv/detail');
        } else {
            Util::redirectTo('backend/adv');
        }
    }

    function delete() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            if ($this->view->adv = $this->model->deleteAdv($id)) {
                Util::redirectTo('backend/adv');
            }
        } else {
            Util::redirectTo('backend/adv');
        }
    }

    function updateStatus() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            if ($this->model->updateStatus($id)) {
                $this->view->title = 'Cập nhập chuyên mục thành công';
                $this->view->message = $this->util->alertMessage('Bạn đã cập nhập trạng thái thành công', 'Thành công', 'success');
                $this->detail();
            } else {
                $this->view->message = $this->util->alertMessage('Xác nhận tin rạo vặt không thành công', 'Có lỗi', 'error');
            }
            $this->view->util = $this->util;
        } else {
            Util::redirectTo('backend/adv');
        }
    }

}

?>
