<?php

class Test_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    //Lay ra
    function select(){
        return $this->selectAll('*', 'test', null, null, MYSQLI_ASSOC);
    }

    //Them moi
    function saveAdd($data) {
        return $this->insert($data, 'test');
    }

    //Edit
    function edit($id) {
        $options = array('where' => 'id = ' . $id);
        return $this->selectOneRow('*', 'test', $options, null, 1);
    }

    function saveEdit($data, $id) {
        return $this->update($data, 'test', 'id = ' . $id);
    }

    //Delete
    function deleteTest($id) {
        return $this->delete('test', 'id = ' . $id);
    }

}

?>
