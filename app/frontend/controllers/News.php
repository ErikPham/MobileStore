<?php

class News extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->layout = 'home';
        $this->view->pavHeader = 'Tin tức';
    }

    function view() {
        $total = $this->model->getContNews();
        $pagination = new Pagination($total, 1);
        $pagination->link = URL . 'news/view/';
        $start = URI::getSegment(2);
        if ($start == null || !is_numeric($start)) {
            $start = 0;
        }
        $pagination->setStart($start);
        $this->view->news = $this->model->getAllNewsLimit($start, 1);
        $this->view->pagination = $pagination->createLinks();
        $this->view->render('news/index');
    }

}