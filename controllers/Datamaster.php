<?php
class Datamaster extends CI_Controller{

            function __construct(){
              parent::__construct();

                $this->load->model('model_datamaster');
                $this->load->library(array('pagination','form_validation'));
                $this->load->helper(array('form'));
            }

            function index(){

            }

            function data_obat($id = NULL){
              $data['total_dataobat'] = $this->model_datamaster->read_dataobat()->num_rows();

              $total_rows=$this->model_datamaster->read_dataobat()->num_rows();

              $config['base_url']=base_url()."dashboard/data_obat";
              $config['total_rows']=$total_rows;
              $config['per_page']=15;
              $config['first_page']='Awal';
              $config['last_page']='Akhir';
              $config['next_page']='>>';
              $config['prev_page']='<<';

              $config['full_tag_open'] = '<ul class="pagination">';
              $config['full_tag_close'] = '</ul>';
              $config['first_link'] = '&laquo; First';
              $config['first_tag_open'] = '<li class="prev page">';
              $config['first_tag_close'] = '</li>';

              $config['last_link'] = 'Last &raquo;';
              $config['last_tag_open'] = '<li class="next page">';
              $config['last_tag_close'] = '</li>';

              $config['next_link'] = 'Next &rarr;';
              $config['next_tag_open'] = '<li class="next page">';
              $config['next_tag_close'] = '</li>';

              $config['prev_link'] = '&larr; Prev';
              $config['prev_tag_open'] = '<li class="prev page">';
              $config['prev_tag_close'] = '</li>';

              $config['cur_tag_open'] = '<li class="current"><a href="">';
              $config['cur_tag_close'] = '</a></li>';

              $config['num_tag_open'] = '<li class="page">';
              $config['num_tag_close'] = '</li>';
              $this->pagination->initialize($config);

              $data['halaman']=$this->pagination->create_links();
              $data['query']=$this->model_datamaster->get_all($config['per_page'],$id)->result();

              $this->load->view('page/data_obat/vw_dataobat',$data);
            }

            function add_dataobat(){
              $this->load->view('page/data_obat/vw_tambahobat');
            }

            function submit_dataobat(){
              $this->form_validation->set_rules('nam_obat','Nama obat','trim');
              $this->form_validation->set_rules('jeni_obat','Nama obat','trim');
              $this->form_validation->set_rules('kategor','Nama obat','trim');
              $this->form_validation->set_rules('harg_obat','Nama obat','trim');
              $this->form_validation->set_rules('jumla_obat','Nama obat','trim');

              if ($this->form_validation->run()){
                $data=array(
                  'kode_obat'   => uniqid(),
                  'nama_obat'   => $this->input->post('nam_obat'),
                  'jenis_obat'  => $this->input->post('jeni_obat'),
                  'kategori'    => $this->input->post('kategor'),
                  'harga_obat'  => $this->input->post('harg_obat'),
                  'jumlah_obat' => $this->input->post('jumla_obat'),
                );
                    if ($this->model_datamaster->tambah_obat($data)){
                        refresh_otomatis("datamaster/data_obat");
                    }

              }
            }

            function hapus_obat($kode){
              $data=array(
                'kode_obat' => decr($kode),
              );

                  if ($this->model_datamaster->hapus_obat($data)){
                    refresh_otomatis("datamaster/data_obat");
              }
            }

            function edit_obat($kode){
              $data['get_obat'] = $this->model_datamaster->get_obat(decr($kode))->result();
              $this->load->view('page/data_obat/vw_editobat',$data);
            }

            function submit_editoabat(){

            }
}
