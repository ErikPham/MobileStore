<?php

class User_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function editProfile($id) {
        $options = array('where' => 'id = ' . $id);
        $user = $this->selectOneRow('*', 'users', $options, null, MYSQLI_ASSOC);
        return $user;
    }

    public function updateProfile($data, $id) {
        return $this->update($data, 'users', 'id = ' . $id);
    }

    public function checkPassword($password, $id) {
        $options = array('where' => "id = {$id} AND password = '{$password}'");
        return $this->checkExists('id', 'users', $options, null);
    }

    public function savePassword($data, $id) {
        return $this->update($data, 'users', 'id = ' . $id);
    }

}

?>
