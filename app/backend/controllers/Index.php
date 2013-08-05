<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        if (Session::get('username') == null) {
            Util::redirectTo('backend/login');
        }
        $this->view->layout = 'main';
    }

    public function index() {
        $this->view->title = 'Index Page';
        //$this->view->url = Util::toSlug('Tiếp tục vạch trần "chiêu độc" gian lận của nhân viên bán xăng');
        //$this->view->string = String::theExcerpt('Khác với hành vi gian lận tại cây xăng số 342 đường Phạm Văn Đồng, nữ nhân viên bán xăng xuất hiện trong video này liên tục bơm nối số xe máy để bẫy ô tô. Số tiền gian lận mỗi lần lên tới cả trăm nghìn đồng', 250) . '...';
        $this->view->string = URI::getSegment(3);
        $this->view->render('index/index');
    }

    public function helloName() {
        $this->view->title = 'Hello';
        $this->view->render('index/hello');
    }

}

?>
