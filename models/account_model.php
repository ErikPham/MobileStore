<?php

class Account_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin($data) {
        $where = "username = '" . $data['username'] . "' AND password = '" . $data['password'] . "'";
        $options = array('where' => $where);
        $result = $this->selectOneRow('id,username', 'users', $options, null, MYSQLI_ASSOC);
        if (count($result) > 0) {
            Session::set('userid', $result['id']);
            Session::set('username', $result['username']);
            return true;
        } else {
            return false;
        }
    }

}

?>
