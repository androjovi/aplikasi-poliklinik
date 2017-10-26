<?php
class Model_dashboard extends CI_Model{

  function read_poliklinik($where){
    $this->db->where('kode_plk',$where);
    return $this->db->get('poliklinik');
  }

  function get_data($kolom,$where,$table){
    $this->db->where($kolom,$where);
    return $this->db->get($table);
  }
  function insert_pendaftaran($data){
    $this->db->set($data);
    return $this->db->insert('pendaftaran');
  }
  function get_dokter($where){
    $this->db->where('kode_plk',$where);
    return $this->db->get('dokter');
  }



}
