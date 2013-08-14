<?php

class View {

    public $title;
    public $layout;
    public $viewFile;

    public function render($name) {
        $this->viewFile = $name;
        $layout = LAYOUT . $this->layout . '.php';
        if (file_exists($layout)) {
            require $layout;
        }
    }

    public function loadView() {
        $view = VIEW . $this->viewFile . '.php';
        if (file_exists($view)) {
            require $view;
        }
    }

}