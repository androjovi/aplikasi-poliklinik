<?php
class Model_poliklinik extends CI_Model{

  function get_poliklinik(){
    return $this->db->get('poliklinik');
  }
}
