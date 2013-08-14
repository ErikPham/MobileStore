<?php

class Order {

    function __construct() {
        
    }
    
    public static function shipping($type){
        $shipping = "";
        if($type == 1){
            $shipping = "Vận chuyển bởi MobileStore";
        }else{
            $shipping = "Quý khách nhận hàng tại MobileStore";
        }
        return $shipping;
    }

    public static function status($type) {
        $status = "";
        switch ($type) {
            case 1:
                $status = "Đợi thanh toán";
                break;
            case 2:
                $status = "Đợi giao hàng";
                break;
            case 3:
                $status = "Đã hoàn thành";
                break;
            default:
                $status = "Đã hủy";
                break;
        }
        return $status;
    }

}

?>
