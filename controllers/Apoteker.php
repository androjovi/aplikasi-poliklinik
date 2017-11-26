<?php 

class Apoteker extends CI_Controller{
    
                function __construct(){
                    parent::__construct();
                        
                            $this->load->library(array('session','pagination'));
                            $this->load->model('model_apoteker');
                    $this->load->model('model_dokter');
                    
                }
    
                function index($id = NULL){
                    $this->load->model('model_datamaster');
                    $data['total_pendaftar'] = $this->model_apoteker->read_data('obat')->num_rows();

              $total_rows=$this->model_apoteker->read_data('obat')->num_rows();

              $config['base_url']=base_url()."dashboard/data_pendaftar";
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
              $data['query']=$this->model_apoteker->read_data_all(NULL,NULL,$config['per_page'],$id)->result();
                    
              $this->load->view('page/data_apoteker/vw_apoteker',$data);
                    
                }
    
                function obat($kode){
                    $kode = decr($kode);
                    
                    $data['query_obat'] = $this->model_dokter->get_obatfromcategory()->result();
                    $data['query'] = $this->model_apoteker->read_data_all('nomor_resep',$kode,NULL,NULL)->result();
                    
                    $this->load->view('page/data_apoteker/vw_berikanobat',$data);
                }
    
                function pilih_obat(){
                    
                    $f = ambil('cat_obat');
                
                $z = $this->model_dokter->get_obatgen($f)->result();
                
                foreach ($z as $k){
                    $data[] = array(
                        'kode_obat'   => $k->kode_obat,
                        'nama_obat'   => $k->nama_obat,
                        'harga_obat'  => $k->harga_obat,
                        'jumlah_obat' => $k->jumlah_obat
                    );
                    
                    
                }
                echo json_encode($data);
                }
    
                function proses_obat($kode,$kode2){
                    $kode = decr($kode);
                    $f=$this->model_apoteker->get_harga_obat(ambil('pilih_pilih_obat'))->row();
                    $totalkan = $f->harga_obat * ambil('jumlah_obat');
                    $data = array(
                        'nomor_resep'   => $kode,
                        'kode_obat'     => ambil('pilih_pilih_obat'),
                        'harga'         => $f->harga_obat,
                        'dosis'         => ambil('dosis'),
                        'sub_total'     => $totalkan,
                        'qty'           => ambil('jumlah_obat'),
                    );
                    $data2 = array(
                        'total_harga'   => $totalkan,
                    );
                    $kode_psn = ambil('kode_psn');
                    if ($this->model_apoteker->insert_data($data,'detail')){
                        $this->model_apoteker->update_data('nomor_resep',$kode,$data2,'resep');
                        $total_obat = $f->jumlah_obat;
                        $update = $total_obat - ambil('jumlah_obat');
                        $this->model_apoteker->update_data('kode_obat',ambil('pilih_pilih_obat'),array('jumlah_obat' => $update),'obat');
                        redirect("pembayaran/bayar/$kode2/$kode_psn");
                    }else{
                        ref_pesan('Galat','apoteker');
                    }
                }
}