<?php

class View {

    public $title;
    public $layout;
    public $viewFile;
    
    public function render($name) {
        $this->viewFile = $name;
        require  LAYOUT . $this->layout . '.php';
    }

    public function loadView() {
        require VIEW . $this->viewFile . '.php';
    }

}