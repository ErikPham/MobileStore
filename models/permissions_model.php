<?php

/**
 * @author Lại Đạo
 * @creatdate : 07-08-2013
 */
class Permissions_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function saveAcl($data){
        return $this->insert($data, 'acl');
    }

}

?>
