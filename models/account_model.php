<?php

class Account_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    //Login to website
    public function checkLogin($data) {
        $where = "username = '" . $data['username'] . "' AND password = '" . $data['password'] . "' AND active = 1";
        $options = array('where' => $where);
        $result = $this->selectOneRow('id,username', 'accounts', $options, null, MYSQLI_ASSOC);
        if (count($result) > 0) {
            Session::set('auth', '1');
            Session::set('user_id', $result['id']);
            Session::set('username', $result['username']);
            return true;
        } else {
            return false;
        }
    }

    //Register
    public function register($data) {
        return $this->insert($data, 'accounts');
    }

    //subscribe
    public function subscribe($data) {
        return $this->insert($data, 'subscribes');
    }

    //Edit Profile, change password
    public function editProfile($id) {
        $options = array('where' => 'id = ' . $id);
        $user = $this->selectOneRow('fullname, sex, mobile, address', 'accounts', $options, null, 1);
        return $user;
    }

    public function updateProfile($data, $id) {
        return $this->update($data, 'accounts', 'id = ' . $id);
    }

    public function checkPassword($password, $id) {
        $options = array('where' => "id = {$id} AND password = '{$password}'");
        return $this->checkExists('id', 'accounts', $options, null);
    }

    public function savePassword($data, $id) {
        return $this->update($data, 'accounts', 'id = ' . $id);
    }

    //active
    public function activeAccount($email, $key) {
        $data = array('key' => null, 'active' => 1);
        return $this->update($data, 'accounts', "`email` ='$email' and `key` = '$key'");
    }
    
    //list order
    function getAllOrder($id){
        $options = array('where' => "customer_id = {$id}");
        return $this->selectAll('id, order_date, customer_id, total_amout, total_quantity, `status`', '`order`', $options, null, 1);
    }
    
    function getInfoOrder($id){
        $options = array('where' => "`order`.id = {$id}");
        return $this->selectOneRow('`order`.*, name', '`order` join payment on `order`.payment_id = payment.id', $options, null, 1);
    }
    
    function getInfoOrderDetail($id){
        $options = array('where' => "order_id = {$id}");
        return $this->selectAll('*', 'order_detail', $options, null, 1);
    }
    
    function getOrderStatus($id){
        $options = array('where' => "id = {$id}");
        return  $this->selectOneRow('status', '`order`', $options, null, 2);
    }
    
    function updateStatus($data, $id){
        return $this->update($data, '`order`', "id = {$id}");
    }
}

?>
