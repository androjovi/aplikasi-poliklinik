<?php 

class Model_apoteker extends CI_Model{
    
    function read_data($table){
        return $this->db->get($table);
    }
    function read_data_all($coloumn,$where,$num,$offset){
        $this->db->select('*');
        $this->db->join('pasien','pasien.kode_psn = resep.kode_psn');
        $this->db->join('dokter','dokter.kode_dkt = resep.kode_dkt');
        $this->db->join('pendaftaran','pendaftaran.kode_psn = resep.kode_psn');
        
        if (!$where == NULL AND !$coloumn == NULL){
            $this->db->where($coloumn,$where);
        }
        return $this->db->get('resep',$num,$offset);
    }
    function get_harga_obat($where){
        $this->db->where('kode_obat',$where);
        return $this->db->get('obat');
    }
    function insert_data($data,$table){
        $this->db->set($data);
        return $this->db->insert($table);
    }
    function cek_data($where){
        $this->db->where('nomor_resep',$where);
        return $this->db->get('detail');
    }
    function update_data($kolom,$where,$data,$table){
        $this->db->set($data);
        $this->db->where($kolom,$where);
        return $this->db->update($table);
    }
}