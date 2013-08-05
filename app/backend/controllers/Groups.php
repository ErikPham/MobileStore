<?php

class Groups extends Controller {

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
            //$this->view->category = $this->model->editCategory($id);
            $this->view->type = $this->model->getArrayType();
            $this->view->title = 'Sửa nhóm';
            $this->view->render('groups/edit');
        } else {
            Util::redirectTo('backend/groups');
        }
    }

    public function delete() {
        if (URI::getSegment(2)) {
            $id = URI::getSegment(2);
            if ($this->model->deleteCategory($id)) {
                Util::redirectTo('backend/groups');
            }
        } else {
            Util::redirectTo('backend/groups');
        }
    }

    public function saveAdd() {
        
    }

    public function saveEdit() {
        
    }

}

?>
