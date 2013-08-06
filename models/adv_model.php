<?php

/**
 * Create date: 04-08-2013
 * @author Lại Đạo 
 * Category
 */
class adv_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllAdv() {

        return $this->selectAllTable('*', 'classifieds_adv ORDER BY ID DESC', MYSQLI_ASSOC);
    }

    public function getDetailAdv($id) {
        $options = array('where' => 'id=' . $id);
        return $this->selectOneRow('*', 'classifieds_adv', $options, null, MYSQLI_ASSOC);
    }

    public function updateStatus($id) {
        $data = array('status' => "1");
        return $this->update($data, 'classifieds_adv', 'id=' . $id);
    }

    public function deleteAdv($id) {
        return $this->delete('classifieds_adv', 'id=' . $id);
    }

}

?>
