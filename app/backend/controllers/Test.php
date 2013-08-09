<?php

class Test extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $testList = $this->model->select();
        $this->view->layout = 'main';
        $this->view->testList = $testList;
        $this->view->render('test/index');
    }
    
    function add(){
        //$this->view->layout = 'main';
        $this->view->render('test/add');
        $this->view->loadView();
    }
    function saveAdd(){
        $data = array(
            'name' => $_POST['name'],
            'age' => $_POST['age']
        );
        $this->model->saveAdd($data);
        Util::redirectTo('backend/test');
    }
    
    function edit(){
        $id = URI::getSegment(2);
        $data = $this->model->edit($id);
        $this->view->data = $data;
        $this->view->render('test/edit');
        $this->view->loadView();
    }
    
    
    function saveEdit(){
        $data = array(
            'name' => $_POST['name'],
            'age' => $_POST['age']
        );
        $this->model->saveEdit($data, $_POST['id']);
        Util::redirectTo('backend/test');
    }
    
    
    function delete(){
        $id = URI::getSegment(2);
        $this->model->deleteTest($id);
        Util::redirectTo('backend/test');
    }
}
?>
