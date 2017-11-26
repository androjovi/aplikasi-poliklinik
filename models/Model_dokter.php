<?php
class Model_dokter extends CI_Model{
    function get_data($where,$kolom,$table){
        $this->db->where($kolom,$where);
        return $this->db->get($table);
    }
  function get_all_pasien($num,$offset,$where){
    $this->db->select('*');
    $this->db->from('pendaftaran');
    $this->db->join('dokter','dokter.kode_dkt = pendaftaran.kode_dkt');
    $this->db->join('pasien','pasien.kode_psn = pendaftaran.kode_psn');
    $this->db->where('pendaftaran.kode_dkt',$where);
    return $this->db->get('',$num,$offset);
  }
  function data_obat($data){
    $this->db->like('kode_obat',$data);
    $this->db->or_like('nama_obat',$data);
    $this->db->or_like('jenis_obat',$data);
    $this->db->or_like('kategori',$data);
    return $this->db->get('obat');
  }
  function ambil_obat($data){
    $this->db->where('kode_obat',$data);
    return $this->db->get('obat');
  }
  function get_pasien($where){
    $this->db->select('*');
    $this->db->from('pendaftaran');
    $this->db->join('dokter','dokter.kode_dkt = pendaftaran.kode_dkt');
    $this->db->join('pasien','pasien.kode_psn = pendaftaran.kode_psn');
    $this->db->where('pendaftaran.kode_psn',$where);
    return $this->db->get();
  }
  function insert_data($data,$table){
    $this->db->set($data);
    return $this->db->insert($table);
  }
  function update_data($data,$kolom,$where,$table){
    $this->db->set($data);
    $this->db->where($kolom,$where);
    return $this->db->update($table);
  }
    
  function get_resepinfo($where){
      $this->db->select('*');
      $this->db->from('resep');
      
      $this->db->join('pasien','pasien.kode_psn = resep.kode_psn');
      
      //$this->db->join('obat','obat.kode_obat = resep.kode_obat');
      $this->db->where('resep.kode_psn',$where);
      return $this->db->get();
      
  }
    function get_resepinfov2($where){
      $this->db->select('*');
      $this->db->from('resep');
      $this->db->join('dokter','dokter.kode_dkt = resep.kode_dkt');
      $this->db->join('pasien','pasien.kode_psn = resep.kode_psn');
      $this->db->join('detail','detail.nomor_resep = resep.nomor_resep');
      //$this->db->join('obat','obat.kode_obat = resep.kode_obat');
      $this->db->where('resep.kode_psn',$where);
      return $this->db->get();
      
  }
    function get_obatinfo($where){
        $this->db->where($where);
        return $this->db->get('obat');
    }
    function get_obatfromcategory(){
        return $this->db->get('obat');
    }
    function get_obatgen($data){
        $this->db->where('kategori',$data);
        return $this->db->get('obat');
    }
    /*
    function get_obatfromdetail($where){
        $this->db->select('*');
        $this->db->from('detail');
        $this->db->join('obat','obat.kode_obat = detail.kode_obat');
        $this->db->where('nomor_resep',$where);
        
        return $this->db->get();
        
    }
    */
}
