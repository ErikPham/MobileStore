<?php

class Student_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function getAllStudents(){
        return $this->selectAllTable('*', 'students', MYSQLI_ASSOC);
    }

}
?>
