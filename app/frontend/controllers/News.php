<?php

class News extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->layout = 'home';
        $this->view->pavHeader = 'Tin tức';
    }

    function index() {
        $this->view();
    }

    function view() {
        $display = 10;
        $total = is_numeric(URI::getSegment(3)) ? URI::getSegment(3) : $this->model->getContNews();
        $pagination = new Pagination($total, $display);
        $start = is_numeric(URI::getSegment(2)) ? URI::getSegment(2) : 0;
        $pagination->setStart($start);
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
        $display = 10;
        $id = is_numeric(URI::getSegment(2)) ? URI::getSegment(2) : Util::redirectTo('error');
        $total = is_numeric(URI::getSegment(4)) ? URI::getSegment(4) : $this->model->getCountCategory($id);

        $pagination = new Pagination($total, $display);
        $start = is_numeric(URI::getSegment(3)) ? URI::getSegment(3) : 0;
        $pagination->setStart($start);

        $data = $this->model->getAllNewsCategoryLimit($id, $start, $display);
        if (!empty($data)) {
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