<?php

class Index extends Controller{

    function __construct() {
        
        //$this->index();
    }
    
    function index(){
        echo 'Hello Index';
        /*
       $view = new View('frontend');
       $view->title = 'Index';
       $view->layout = 'main';
       $view->render('index/index', null);
         * 
         */
    }

}
?>
