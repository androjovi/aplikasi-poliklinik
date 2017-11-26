<?php
class Model_pembayaran extends CI_Model{

  function read_pendaftar($where){
    $this->db->select('*');
    $this->db->from('pendaftaran');
    $this->db->join('pasien','pasien.kode_psn = pendaftaran.kode_psn');
    $this->db->join('dokter','dokter.kode_dkt = pendaftaran.kode_dkt');  
    $this->db->where('pendaftaran.nomor_pdf',$where);
    return $this->db->get();
  }
    function bayar_langsung($data){
        $this->db->set($data);
        return $this->db->insert('pembayaran');
    }
}
