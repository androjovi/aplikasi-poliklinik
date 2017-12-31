<?php 

class Model_info extends CI_Model{

    function get_total($table,$where){
        if ($where !== NULL){
            $this->db->where($where);
        }
        return $this->db->get($table);
    }
}