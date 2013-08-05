<?php

/**
 * Create date: 04-08-2013
 * @author Lại Đạo 
 * Category
 */
class news_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllNews() {
        $news = $this->selectAllTable('*', 'news', MYSQLI_ASSOC);
        return $news;
    }

    public function getStatus() {
        return $status = $this->selectStatus();
    }

    public function getCategoryNews() {
        $options = array('where' => 'type = 2');
        return $cate = $this->selectAll('id, type, name', 'category', $options, null, MYSQLI_ASSOC);
    }

    public function saveAdd($data) {
        return $this->insert($data, 'news');
    }

}

?>
