<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->layout = 'home';
    }

    public function index() {
        $this->view->title = 'Index Page';
        $this->view->productLatests = $this->model->getProductLatests();
        $this->view->productHighPrices = $this->model->getProductHighPrices();
        $this->view->render('index/index');
    }
    
}

?>
