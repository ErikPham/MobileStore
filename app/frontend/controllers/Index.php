<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->layout = 'home';
    }

    public function index() {
        $this->view->title = 'Index Page';
        $this->view->productHighUp = $this->model->getProductHighUp();
        $this->view->productMid = $this->model->getProductMid();
        $this->view->productAppellative = $this->model->getProductAppellative();
        $this->view->render('index/index');
    }
    
    
   
    
}

?>
