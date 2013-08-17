<?php

class News extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->layout = 'news';
        $this->view->pavHeader = 'Tin tức';
    }

    function index() {
        $this->view();
    }

    function view() {
        $display = 2;
        $this->view->viewmosts = $this->model->viewMost();
        
        $pagination = new Pagination($display);
        $pagination->setTotal($this->model->getContNews());
        $currentPage = is_numeric(URI::getSegment(2)) ? URI::getSegment(2) : 1;
        $start = $display * ($currentPage-1);
        $pagination->setStart($currentPage);
        $data = $this->model->getAllNewsLimit($start, $display);
        
        if (!empty($data)) {
            $this->view->news = $data;
            $pagination->link = URL . 'news/view/';
            $this->view->title = 'Tin tức';
            $this->view->pagination = $pagination->createLinks(Util::toSlug('tin tuc'));
            $this->view->render('news/index');
        } else {
            Util::redirectTo('error');
        }
    }

    function viewdetail() {
        $id = is_numeric(URI::getSegment(2)) ? URI::getSegment(2) : Util::redirectTo('error');
        $data = $this->model->getEdit($id);
        if (!empty($data)) {
            $view = $data['views'];
            $views = array('views' => $view + 1);
            $this->view->viewmosts = $this->model->viewMost();
            $this->model->updateViews($views, $id);
            $this->view->pavHeader = $data['title'];
            $this->view->title = $data['title'];
            $this->view->new = $data;
            $this->view->render('news/viewdetail');
        } else {
            Util::redirectTo('error');
        }
    }

    function category() {
        $display = 5;
        $id = is_numeric(URI::getSegment(2)) ? URI::getSegment(2) : Util::redirectTo('error');
        $pagination = new Pagination($display);
        $pagination->setTotal($this->model->getCountCategory($id));
        $currentPage = is_numeric(URI::getSegment(3)) ? URI::getSegment(3) : 1;
        $start = $display * ($currentPage-1);
        $pagination->setStart($currentPage);
     
        $data = $this->model->getAllNewsCategoryLimit($id, $start, $display);
        if (!empty($data)) {
            $this->view->viewmosts = $this->model->viewMost();
            $this->view->news = $data;
            $pagination->link = URL . 'news/category/' . $id . '/';
            $this->view->title = $data[0]['name'];
            $this->view->pavHeader = $data[0]['name'];
            $this->view->pagination = $pagination->createLinks(Util::toSlug($data[0]['name']));
            $this->view->render('news/index');
        } else {
            Util::redirectTo('error');
        }
    }

}