<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contacts_model
 *
 * @author DaoTrang
 */
class contacts_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllContacts() {
        return $this->selectAllTable('*', 'contacts', MYSQLI_ASSOC);
    }

    public function getCountContactsNew() {
        $options = array('where' => 'status = 0');
        return $count = $this->selectCount('id', 'count', 'contacts', $options, null, MYSQLI_NUM);
    }

    public function getIdContact($id) {
        $options = array('where' => 'id = ' . $id);
        return $this->selectOneRow('*', 'contacts', $options, null, MYSQLI_ASSOC);
    }

    public function updateStatus($id) {
        $data = array('status =1');
        return $this->update($data, 'contacts', 'id=' . $id);
    }

    public function replyContact($data) {
        return $this->insert($data, 'reply_contacts');
    }

    public function deleteContact($id) {
        return $this->delete('contacts', 'id=' . $id);
    }

}

?>
