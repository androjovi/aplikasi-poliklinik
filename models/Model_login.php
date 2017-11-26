<?php
class Model_login extends CI_Model{
  function login($kolom,$where,$table){
    $this->db->where($kolom,$where);
    return $this->db->get($table);
  }
}
