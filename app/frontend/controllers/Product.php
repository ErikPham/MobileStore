<?php

class Product extends Controller {

    function __construct() {
        parent::__construct();
    }

    function detail() {
        $id = URI::getSegment(2);
        if (is_numeric($id)) {
            $detail = $this->model->getDetailProduct($id);
            if (!empty($detail)) {
                $images = $this->model->getImage($id);
                $this->view->layout = 'home';
                $this->view->images = $images;
                $this->view->detail = $detail;
                $this->view->title = $detail['name'];
                $this->view->mainImage = $images[0]['source'];
                $this->view->render('product/detail');
            } else {
                Util::redirectTo();
            }
        } else {
            Util::redirectTo();
        }
    }

}

?>
