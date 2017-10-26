<?php
class Pembayaran extends CI_Controller{

            function __construct(){
                parent::__construct();

                  $this->load->model('model_datamaster');
                  $this->load->model('model_pembayaran');
                  $this->load->library('pagination');

            }

            function index($id = NULL){

              $total_rows=$this->model_datamaster->read_pendaftar(NULL)->num_rows();

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
              $data['query']=$this->model_datamaster->read_pendaftar_all($config['per_page'],$id)->result();

              $this->load->view('page/data_pembayaran/vw_pembayaran',$data);

            }

            function bayar($kode){
              $data['query'] = $this->model_pembayaran->read_pendaftar(decr($kode))->result();
              $this->load->view('page/data_pembayaran/vw_bayar',$data);
            }
}
