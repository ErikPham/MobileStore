<?php

class Error extends Controller{
    
    function index(){
        $this->view->msg = 'This page doesnt exist';
        $this->view->title = 'Error';
        $this->view->layout = 'main';
        $this->view->render('error/index', null);
    }
}

?>
