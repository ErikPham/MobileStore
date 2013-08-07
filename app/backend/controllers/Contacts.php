<?php

/**
 * Create date: 04-08-2013
 * @author Lại Đạo 
 * Category
 */
class Contacts extends Controller {

    private $util;
    public static $rules = array(
        'content' => array(
            'type' => 'string',
            'required' => true,
            'min' => 3,
            'max' => 255,
            'trim' => true
        )
    );
    private $change_lable = array(
        'content' => 'Nội dung'
    );

    public function __construct() {
        parent::__construct();
        Session::init();
        $this->view->layout = 'main';
        $this->valid = new Validation();
        $this->util = new Util();
    }

    public function index() {
        $this->view->contacts = $this->model->getAllContacts();
        $this->view->count = $this->model->getCountContactsNew();
        $this->view->title = 'Hộp thư đến';
        $this->view->render('contacts/view');
    }

    public function detail() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            $this->view->contact = $this->model->getIdContact($id);
            $this->view->title = 'Hộp thư đến';
            $this->view->render('contacts/detail');
        } else {
            Util::redirectTo('backend/contacts');
        }
    }

    public function delete() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            if ($this->model->deleteContact($id)) {
                Util::redirectTo('backend/contacts');
            }
        } else {
            Util::redirectTo('backend/contacts');
        }
    }

    public function saveReply() {
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST, true);
            $this->valid->run();
            $this->valid->changeLabel($this->change_lable);
            $this->view->title = 'Có lỗi xảy ra';
            $id = $_POST['id_contacts'];
            if ($this->valid->isValid()) {
                if ($this->model->replyContact($_POST)) {
                    $this->view->title = 'Trả lời thư thành công';
                    $this->view->message = $this->util->alertMessage('Bạn đã trả lời thư', 'Thành công', 'success');
                    if ($id == 0) {
                        if ($this->model->updateStatus($id)) {
                            //$this->view->contact = $this->model->getIdContact($id);
                            Util::redirectTo('backend/contacts');
                        }
                    } else {
                        Util::redirectTo('backend/contacts');
                    }
                } else {
                    $this->view->message = $this->util->alertMessage('Bạn chưa thay đổi nhập nội dung mới hoặc đã xảy ra lỗi. Vui lòng thử lại', 'Có lỗi', 'error');
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
            $this->view->contact = $_POST;
            $this->view->util = $this->util;
            Util::redirectTo('backend/contacts');
        } else {
            Util::redirectTo('backend/contacts');
        }
    }

}

?>
