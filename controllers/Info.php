<?php 

class Info extends CI_Controller{

    function __construct(){
        parent::__construct();

            $this->load->model('model_info');
        
        
    }

    function index(){
        $data['total_resep']        = $this->model_info->get_total('resep',NULL)->num_rows();
        $data['total_poli']         = $this->model_info->get_total('poliklinik',NULL)->num_rows();
        $data['total_pendaftaran']  = $this->model_info->get_total('pendaftaran',NULL)->num_rows();
        $data['total_pasien']       = $this->model_info->get_total('pasien',NULL)->num_rows();
        $data['total_obat']         = $this->model_info->get_total('obat',NULL)->num_rows();
        $data['total_dokter']       = $this->model_info->get_total('dokter',NULL)->num_rows();
        
        $data['total_pendaftar_now'] = $this->model_info->get_total('pendaftaran',array(
                                       'tanggal_pdf' => date('d-m-Y')))->num_rows();
        $data['total_resep_now']     = $this->model_info->get_total('resep',array(
                                       'tanggal_resep' => date('d-m-Y')))->num_rows();
        $data['get_row_poli'] = $this->model_info->get_total('poliklinik',NULL)->result();
        
        foreach($data['get_row_poli'] as $k){
            $z = array(
             $k->nama_plk => $get_pendaftar[] = $this->model_info->get_total('pendaftaran',array('kode_plk' => $k->kode_plk))->num_rows()
            );
            
            foreach ($z as $l => $v){
                $h[] = "Pasien terdaftar dari poli ".$l." Berjumlah ".$v.", Kode poli ".$k->kode_plk."<br>";
                $data['j'] = $h;
            }

        }

        
        
        
        $this->load->view('page/data_info/vw_datainfo',$data);
    }
}