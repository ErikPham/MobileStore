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

    public function __construct($totalRecord, $display) {
        $this->totalRecord = $totalRecord;
        $this->display = $display;
    }

    public function setLink($start, $page, $name, $end = '') {
        return "<a href='" . $this->link . "{$start}/{$page}/{$end}'>{$name}</a>";
    }

    public function createLinks($end = '') {
        $output = "<ul>";
        $this->page = ceil($this->totalRecord / $this->display);
        if ($this->page > 1) {
            $this->currentPage = ($this->start / $this->display) + 1;
            if ($this->currentPage != 1) {
                $output .= "<li>" . $this->setLink(0, $this->page, "Đầu", $end) . "</li>";
                $output .= "<li>" . $this->setLink($this->start - $this->display, $this->page, "Lùi", $end) . "</li>";
            }

            for ($i = 1; $i <= $this->page; $i++) {
                if ($this->currentPage != $i) {
                    $output .= "<li>" . $this->setLink((($i - 1) * $this->display), $this->page, $i, $end) . "</li>";
                } else {
                    $output .= "<li class='active disabled'><a href='#'>" . $i . "</a></li>";
                }
            }

            if ($this->page > $this->currentPage) {
                $output .= "<li>" . $this->setLink(($this->start + $this->display), $this->page, "Tiếp", $end) . "</li>";
                $output .= "<li>" . $this->setLink((($this->page - 1) * $this->display), $this->page, "Cuối", $end) . "</li>";
            }
        }
        return $output;
    }

}