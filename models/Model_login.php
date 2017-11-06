<?php
class Model_login extends CI_Model{
  function login($where){
    $this->db->where('username',$where);
    return $this->db->get('dokter');
  }
}
