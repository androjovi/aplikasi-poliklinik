<?php
class Model_datamaster extends CI_Model{

  function read_dataobat(){
    return $this->db->get('obat');
  }
  function get_all($num,$offset,$table){
    return $this->db->get($table,$num,$offset);
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
  function update_obat($data,$where){
    $this->db->set($data);
    $this->db->where('kode_obat',decr($where));
    return $this->db->update('obat');
  }
  // ----- pasien
  function read_pasien($where){
    if (NULL ==! $where){
      $this->db->where('kode_psn',$where);
    }
    return $this->db->get('pasien');
  }
  function insert_pasien($data){
    $this->db->set($data);
    return $this->db->insert('pasien');
  }
  function delete_pasien($where){
    $this->db->where('kode_psn',$where);
    return $this->db->delete('pasien');
  }
  function update_pasien($data,$where){
    $this->db->set($data);
    $this->db->where('kode_psn',decr($where));
    return $this->db->update('pasien');
  }
  // ------ Dokter
  function read_dokter($where){
    if (NULL ==! $where){
      $this->db->where('kode_dkt',$where);
    }
    return $this->db->get('dokter');
  }
  function insert_dokter($data){
    $this->db->set($data);
    return $this->db->insert('dokter');
  }
  function delete_dokter($where){
    $this->db->where('kode_dkt',$where);
    return $this->db->delete('dokter');
  }
  function update_dokter($data,$where){
    $this->db->set($data);
    $this->db->where('kode_dkt',decr($where));
    return $this->db->update('dokter');
  }
  // -------- poliklinik
  function read_poliklinik(){
    return $this->db->get('poliklinik');
  }
  function insert_poliklinik($data){
    $this->db->set($data);
    return $this->db->insert('poliklinik');
  }
  function del_poliklinik($where){
    $this->db->where('kode_plk',decr($where));
    return $this->db->delete('poliklinik');
  }
  //-----
  function read_pendaftar_all($num,$offset){
    $this->db->select('*');
    $this->db->from('pendaftaran');
    $this->db->join('pasien','pasien.kode_psn = pendaftaran.kode_psn');
    $this->db->join('dokter','dokter.kode_dkt = pendaftaran.kode_dkt');
    return $this->db->get('',$num,$offset);
  }
  function read_pendaftar(){
    return $this->db->get('pendaftaran');
  }
  function read_pendaftar_where($where){
    $this->db->select('*');
    $this->db->from('pendaftaran');
    $this->db->join('pasien','pasien.kode_psn = pendaftaran.kode_psn');
    $this->db->join('dokter','dokter.kode_dkt = pendaftaran.kode_dkt');
    $this->db->where('pendaftaran.nomor_pdf',$where);
    return $this->db->get();
  }
  function del_pendaftar($where){
    $this->db->where('nomor_pdf',decr($where));
    return $this->db->delete('pendaftaran');
  }

  // -------- Random
  function get_poliklinik(){
    return $this->db->get('poliklinik');
  }
  function like_data($like,$table){
    $this->db->like($like);
    return $this->db->get($table);
  }

}
