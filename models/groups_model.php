<?php

class Groups_Model extends Model {

    public function getArrayType() {
        $data = array('1' => 'Admin', '2' => 'Sản phẩm');
        return $type = $this->selectArray($data);
    }

    public function getStatus() {
        return $status = $this->selectStatus();
    }

    public function getEdit($id) {
        $options = array('where' => 'id = ' . $id);
        return $this->selectOneRow('*', 'groups',$options, null, MYSQLI_ASSOC);
    }

    public function getAllGroups() {
        return $this->selectAll('*', 'groups', null, null, MYSQLI_ASSOC);
    }

    public function saveAdd($data) {
        return $this->insert($data, 'groups');
    }

    public function saveUpdate($data, $id) {
        return $this->update($data, 'groups', 'id = ' . $id);
    }

    public function deleteGroup($id) {
        return $this->delete('groups', 'id =' . $id);
    }

}

?>
