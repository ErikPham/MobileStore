<?php

/**
 * Create date: 04-08-2013
 * @author Lại Đạo 
 * Category
 */
class Contacts extends Controller {

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

}

?>
