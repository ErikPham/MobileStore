<?php

class Pagination {

    private $page;
    private $totalRecord;
    private $currentPage;
    private $display;
    private $start;
    public $link = "#";
    public $type = 0;

    public function setStart($start) {
        $this->start = $start;
    }

    public function setTotal($total) {
        $this->totalRecord = $total;
    }

    public function getTotal() {
        return $this->totalRecord;
    }

    public function __construct($display) {
        $this->display = $display;
    }

    public function setLink($page, $name, $end = '') {
        if ($this->type == 1) {
            return "<a data-page='" . $page . "' href='#'>{$name}</a>";
        } else {
            return "<a href='" . $this->link . "{$page}/{$end}'>{$name}</a>";
        }
    }

    public function createLinks($end = '') {
        $output = '';
        $this->page = ceil($this->totalRecord / $this->display);
        if ($this->page > 1) {
            $output = "<ul>";
            $this->currentPage = $this->start;
            if ($this->currentPage != 1) {
                $output .= "<li>" . $this->setLink(1, "Đầu", $end) . "</li>";
                $output .= "<li>" . $this->setLink($this->currentPage - 1, "Lùi", $end) . "</li>";
            }

            for ($i = 1; $i <= $this->page; $i++) {
                if ($this->currentPage != $i) {
                    $output .= "<li>" . $this->setLink(($i), $i, $end) . "</li>";
                } else {
                    $output .= "<li class='active disabled'><a href='#' data-page='1'>" . $i . "</a></li>";
                }
            }

            if ($this->page > $this->currentPage) {
                $output .= "<li>" . $this->setLink(($this->currentPage + 1), "Tiếp", $end) . "</li>";
                $output .= "<li>" . $this->setLink(($this->page), "Cuối", $end) . "</li>";
            }
            $output."</ul>";
        }
        
        return $output;
    }

}