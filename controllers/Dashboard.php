<?php
ob_start();
class Dashboard extends CI_Controller{

            function __construct(){
              parent::__construct();


                  $this->load->model(array('model_dashboard','model_datamaster'));
                  $this->load->library(array('pagination','form_validation','session'));

                      if ($this->session->userdata('userstatus') == FALSE){
                        redirect('auth');
                      }

            }

            function index(){
              $data['total_obat']           = $this->model_datamaster->read_dataobat()->num_rows();
              $data['total_pasien']         = $this->model_datamaster->read_pasien(NULL)->num_rows();
              $data['total_poliklinik']     = $this->model_datamaster->read_poliklinik()->num_rows();
              $data['total_dokter']         = $this->model_datamaster->read_dokter(NULL)->num_rows();

              $data['kode_poliklinik']      = $this->model_datamaster->get_poliklinik()->result();
              $this->load->view('page/dashboard1',$data);
            }

            function submit_pendaftar(){
              $this->form_validation->set_rules('nom_pendaftar','Nomor pendaftar','trim');
              $this->form_validation->set_rules('tangga_pendaftar','Tanggal mendaftar','trim');
              $this->form_validation->set_rules('kod_dokter','Kode dokter','trim');
              $this->form_validation->set_rules('kod_pasien','Kode pasien','trim');
              $this->form_validation->set_rules('kod_plk','Kode poliklinik','trim');
              $this->form_validation->set_rules('biay','Biaya','trim');
              $this->form_validation->set_rules('keteranga','Keterangan','trim');

                if ($this->form_validation->run()){

                    if ($this->model_dashboard->get_data("kode_psn",ambil('kod_pasien'),"pasien")->num_rows() == 1 AND $this->model_dashboard->get_data("kode_dkt",ambil('kod_dokter'),"dokter")->num_rows() == 1){
                      $z=explode(", ",ambil('tangga_pendaftar'));
                        $data=array(
                          'nomor_pdf'     =>  ambil('nom_pendaftar'),
                          'tanggal_pdf'   =>  $z[0],
                          'kode_dkt'      =>  ambil('kod_dokter'),
                          'kode_psn'      =>  ambil('kod_pasien'),
                          'kode_plk'      =>  ambil('kode_plk'),
                          'biaya'         =>  ambil('biay'),
                          'ket'           =>  ambil('keteranga'),
                        );
                        if ($this->model_dashboard->insert_pendaftaran($data)){
                          ref_pesan("Data berhasil dimasukkan","dashboard");
                        }else{
                          ref_pesan("data tidak berhasil dimasukkan","dashboard ");
                        }
                    }else{
                      echo ambil('kod_dokter');
                    }
                }else{
                  // form validation
                }
            }

            function find_dokter(){
               $var= ambil("get_dokter");

               $get=$this->model_dashboard->get_dokter($var)->result();
               foreach ($get as $k):
                 $array_data[]= array(
                   "nama_dkt" => $k->nama_dkt,
                   "kode_dkt" => $k->kode_dkt,
                 );
               endforeach;
               echo json_encode($array_data);



            }

            function cek_pasien(){
              $var = ambil('get_pasien');
              $get=$this->model_dashboard->cek_pasien_ada($var)->num_rows();
              if ($get == 0){
                echo 0;
              }else{
                echo 1;
              }
            }


}
