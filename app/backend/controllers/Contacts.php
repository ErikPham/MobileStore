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
            'min' => 10,
            'max' => 255,
            'trim' => true
        )
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
        $this->view->countReply =  $this->model->getCountReply();
        $this->view->title = 'Hộp thư đến';
        $this->view->render('contacts/view');
    }
    
    public function replys(){
        $this->view->count = $this->model->getCountContactsNew();
        $this->view->countReply =  $this->model->getCountReply();
        $this->view->replys =  $this->model->getAllReply();
        $this->view->title = 'Thư đã gửi';
        $this->view->render('contacts/replys');
    }

    public function detail() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            $this->view->contact = $this->model->getIdContact($id);
            $this->view->reply = $this->model->getIdReply($id);
            $contact = $this->model->getIdContact($id);
            if ($contact['status'] == 0) {
                if ($this->model->updateStatus($id)) {
                    $this->view->title = 'Hộp thư đến';
                    $this->view->render('contacts/detail');
                } else {
                    Util::redirectTo('backend/contacts');
                }
            } else {
                $this->view->title = 'Hộp thư đến';
                $this->view->render('contacts/detail');
            }
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

    public function reply() {
        $id = Request::post('id_contact');
        $email = Request::post('email');
        $title = "Trả lời: " . Request::post('title');
        $name = Request::post('name');
        $message = $_POST['content'];
        if (Request::isPost()) {
            $this->valid->addRules(self::$rules);
            $this->valid->addSource($_POST);
            $this->valid->run();
            $this->valid->changeLabel(array('content' => 'Nội dung'));
            if ($this->valid->isValid()) {
                unset($_POST['email']);
                unset($_POST['name']);
                unset($_POST['title']);
                if ($this->model->replyContact($_POST)) {
                    $mail = new Mail();
                    if ($mail->Send($email, $name, $title, $message)) {
                        $this->view->title = 'Đã trả lời thư thành công';
                        $this->view->message = $this->util->alertMessage('Bạn đã trả lời thư khách hàng thành công!', 'Thành công', 'success');
                     } else {
                        $this->view->message = $this->util->alertMessage('Không thể gửi tin. Xin cảm ơn', 'Có lỗi', 'error');
                    }
                } else {
                    $this->view->message = $this->util->alertMessage('Có lỗi xảy ra. Bạn vui lòng thử lại', 'Có lỗi', 'error');
                }
                $_POST = array();
            } else {
                if (isset($this->valid->error['diff_key'])) {
                    $message = 'Dữ liệu đầu vào không hợp lệ';
                } else {
                    $message = 'Bạn vui lòng kiểm tra lại các trường dữ liệu.';
                }
                $this->view->title = 'Đã xảy ra lỗi';
                $this->view->message = $this->util->alertMessage($message, 'Có lỗi', 'error');
                $this->util->errors = $this->valid->errors;
                $this->view->contact = $_POST;
            }
        }
        $this->view->reply = $this->model->getIdReply($id);
        $this->view->contact = $this->model->getIdContact($id);
        $this->view->util = $this->util;
        $this->view->render('contacts/detail');
    }

}

?>
