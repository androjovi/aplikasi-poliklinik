<?php
class Model_datamaster extends CI_Model{

  function read_dataobat(){
    return $this->db->get('obat');
  }
  function get_all($num,$offset){
    return $this->db->get('obat',$num,$offset);
  }
  function cari_dataobat($like){
    $this->db->like('nama_obat',$like);
    return $this->db->get('obat');
  }
  function tambah_obat($data){
    $this->db->set($data);
    return $this->db->insert('obat');
  }
  function hapus_obat($where){
    $this->db->where($where);
    return $this->db->delete('obat');
  }
  function get_obat($where){
    $this->db->where('kode_obat',$where);
    return $this->db->get('obat');
  }
}
