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
        $news = $this->selectAllTable('news.*,category.id as idcate, name', ' news join category on news.category_id = category.id where type= 2', MYSQLI_ASSOC);
        return $news;
    }

    public function getStatus() {
        return $status = $this->selectStatus();
    }

    public function getCategoryNews() {
        $options = array('where' => 'type = 2');
        return $cate = $this->selectAll('id, type, name', 'category', $options, null, MYSQLI_ASSOC);
    }

    public function getEdit($id) {
        $options = array('where' => 'id =' . $id);
        return $new = $this->selectOneRow('*', 'news', $options, null, MYSQLI_ASSOC);
    }

    public function saveAdd($data) {
        return $this->insert($data, 'news');
    }

    public function saveEdit($data, $id) {
        return $this->update($data, 'news', 'id =' . $id);
    }

    public function deleteNew($id) {
        return $this->delete('news', 'id =' . $id);
    }

    //News Home
    function getContNews() {
        $options = array('where' => 'status = 1');
        return $this->selectCount('id', 'count', 'news', $options, null, 2);
    }

    function getAllNewsLimit($start, $display) {
        $options = array('where' => 'status = 1', 'limit' => "$start,$display");
        return $this->selectAll('news.id, title, description, fullname, name, category_id', 'news join category on news.category_id = category.id join accounts on accounts.id = news.account_id', $options, null, MYSQLI_ASSOC);
    }

}

?>
