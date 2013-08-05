<?php
class Pagination {
    private $page;
    private $totalRecord;
    private $currentPage;
    private $display;
    private $start;
    public  $link;

    public function setStart($start){
        $this->start = $start;
    }

    public function __construct($totalRecord, $display){
        $this->totalRecord = $totalRecord;
        $this->display = $display;
    }

    public function setLink($start,$page,$name){
        return "<a href='".$this->link."?s={$start}&p={$page}'>{$name}</a>";
    }

    public function createLinks(){
        $output = "<ul class='pagination'>";
        $this->page = ceil($this->totalRecord / $this->display);
        if($this->page > 1){
            $this->currentPage = ($this->start / $this->display) + 1;
            if($this->currentPage != 1){
                $output .= "<li>".$this->setLink(0,$this->page,"Đầu")."</li>";
                $output .= "<li>".$this->setLink($this->start - $this->display,$this->page,"Lùi")."</li>";
            }

            for($i = 1; $i <= $this->page; $i++){
                if($this->currentPage != $i){
                    $output .= "<li>".$this->setLink((($i - 1) * $this->display),$this->page,$i)."</li>";

                }else{
                    $output .= "<li class='current'>{$i}</li>";
                }
            }

            if($this->page >$this->currentPage){
                $output .= "<li>".$this->setLink(($this->start + $this->display),$this->page,"Tiếp")."</li>";
                $output .= "<li>".$this->setLink((($this->page - 1) * $this->display),$this->page,"Cuối")."</li>";
            }
        }
        return $output;
    }

}