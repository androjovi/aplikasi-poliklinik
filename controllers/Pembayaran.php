<?php
class Pembayaran extends CI_Controller{

            function __construct(){
                parent::__construct();

                  $this->load->model('model_datamaster');
                  $this->load->model('model_pembayaran');
                  $this->load->model('model_dokter');
                  $this->load->library('pagination');

            }

            function index($id = NULL){

              $total_rows=$this->model_datamaster->read_pendaftar(NULL)->num_rows();

              $config['base_url']=base_url()."pembayaran";
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

            function bayar($kode,$kode_psn){
              $data['query'] = $this->model_pembayaran->read_pendaftar(decr($kode))->result();
              $data['query2'] = $this->model_dokter->get_resepinfov2(decr($kode_psn))->result();
                foreach($data['query2'] as $k){
                    $result[] = $k->sub_total;
                    //$r['kode_obat'] = $k->kode_obat;
                }
                //$data['query3'] = $this->model_dokter->get_obatinfo($r)->result();
                $data['totalharga'] = array_sum($result);
              $this->load->view('page/data_pembayaran/vw_bayar',$data);
            }
    
            function owa($kode_psn,$total){
                $data = array(
                    'nomor_byr'      => random_chara("BYR_"),
                    'kode_psn'       => ambil('kode_psn009') ,
                    'tanggal_byr'    => date('d-m-Y'),
                    'jumlah_bayar'   => ambil('total009'),
                );
                if ($this->model_pembayaran->bayar_langsung($data)){
                    echo "Berhasil
                    <br> Print PDF
                    ";
                }else{
                    echo "Tidak berhasil";
                }
            }
    
                function struk($kode,$kode2){
                    $this->load->model('model_apoteker');
                    $data = array(
                        'bayar'      => ambil('jumlah_bayar'),
                        'kembali'   => ambil('kembalian_s'),
                    );
                    $this->model_apoteker->update_data('nomor_resep',$kode2,$data,'resep');
                    
                    $data2 = array(
                        'nomor_byr'         => random_chara("BYR_"),
                        'kode_psn'          => $kode,
                        'tanggal_byr'       => date('d-m-Y'),
                        'jumlah_bayar'      => ambil('jumlah_bayar'),
                    );
                    $from['jumlah_bayar'] = ambil('jumlah_bayar');
                    $from['kembalian']    = ambil('kembalian_s');
                    
                    if ($this->model_pembayaran->bayar_langsung($data2)){
                        $from['query2'] = $this->model_dokter->get_resepinfov2(decr($kode))->result();
                        $this->load->view('page/data_pembayaran/vw_struk',$from);
                    }
                }
    
            
    
            
}
