<?php

class Pagination {

    private $page;
    private $totalRecord;
    private $currentPage;
    private $display;
    private $start;
    public $link;

    public function setStart($start) {
        $this->start = $start;
    }
    
    public function setTotal($total){
        $this->totalRecord = $total;
    }
    
    public function getTotal() {
        return $this->totalRecord;
    }

    
    public function __construct($display) {
        $this->display = $display;
    }

    public function setLink($page, $name, $end = '') {
        return "<a href='" . $this->link . "{$page}/{$end}'>{$name}</a>";
    }

    public function createLinks($end = '') {
        $output = "<ul>";
        $this->page = ceil($this->totalRecord / $this->display);
        if ($this->page > 1) {
            $this->currentPage = ($this->start / $this->display);
            if ($this->currentPage != 1) {
                $output .= "<li>" . $this->setLink(1, "Đầu", $end) . "</li>";
                $output .= "<li>" . $this->setLink($this->currentPage - 1, "Lùi", $end) . "</li>";
            }

            for ($i = 1; $i <= $this->page; $i++) {
                if ($this->currentPage != $i) {
                    $output .= "<li>" . $this->setLink(($i * $this->display), $i, $end) . "</li>";
                } else {
                    $output .= "<li class='active disabled'><a href='#'>" . $i . "</a></li>";
                }
            }

            if ($this->page > $this->currentPage) {
                $output .= "<li>" . $this->setLink(($this->currentPage + 1), "Tiếp", $end) . "</li>";
                $output .= "<li>" . $this->setLink(($this->page * $this->display), "Cuối", $end) . "</li>";
            }
        }
        return $output;
    }

}