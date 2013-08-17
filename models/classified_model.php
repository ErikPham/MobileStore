<?php

class Classified_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function getLocation(){
        $options = array('where' => "type = 'STATE'");
        return $this->selectAll('id, label', 'locations', $options, '', 1);
    }
    
    function getLists($options) {
        return $this->selectAll('*', 'classifieds_adv', $options, '', 1);
    }
    
    function getTotals($options){
        return $this->selectCount('id', 'count', 'classifieds_adv', $options, null, 2);
    }
    
    function getClassified($id){
        $options = array('where' => "classifieds_adv.id = {$id}");
        return $this->selectOneRow('classifieds_adv.*,label', 'classifieds_adv join locations on classifieds_adv.location_id = locations.id', $options, NULL, 1);
    }
    
    function getListRelate(){
        $options = array('limit' => '0,5', 'order' => 'id DESC');
        return $this->selectAll('id, title', 'classifieds_adv', $options, null, 1);
    }

}
?>
