<?php

/*
 * Truy xuất dữ liệu từ database thực hiện chức năng thêm, sửa, xóa
 */

class Category_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getArrayType() {
        $data = array('1' => 'Sản phẩm', '2' => 'Tin tức');
        return $type = $this->selectArray($data);
    }

    public function getAllCategory() {
        $categorys = $this->selectAllTable('*', 'category', MYSQLI_ASSOC);
        return $categorys;
    }

    public function getCountPosition() {
        return $position = $this->selectCount('id', 'count', 'category', null, null, MYSQLI_NUM);
    }

    public function insertCategory($data) {
        return $this->insert($data, 'category');
    }

    public function editCategory($id) {
        $options = array('where' => 'id=' . $id);
        return $category = $this->selectOneRow('*', 'category', $options, null, MYSQLI_ASSOC);
    }

    public function saveEdit($data, $id) {
        return $this->update($data, 'category', 'id = ' . $id);
    }

    public function deleteCategory($id) {
        return $this->delete('category', 'id = ' . $id);
    }

}

?>
