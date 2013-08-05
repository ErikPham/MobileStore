<?php

class Groups_Model extends Model{
    
    
    public function getArrayType() {
        $data = array('1' => 'Admin', '2' => 'Sản phẩm');
        return $type = $this->selectArray($data);
    }
    
     public function getStatus() {
        return $status = $this->selectStatus();
    }
    
    public function getAllGroups(){
        return $this->selectAll('*', 'groups', null, null, MYSQLI_ASSOC);
    }
}

?>
