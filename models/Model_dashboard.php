<?php
class Model_dashboard extends CI_Model{

  function read_poliklinik($where){
    $this->db->where('kode_plk',$where);
    return $this->db->get('poliklinik');
  }

  
}
