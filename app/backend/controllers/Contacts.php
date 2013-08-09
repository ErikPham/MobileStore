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
            
        }
    }

}

?>
