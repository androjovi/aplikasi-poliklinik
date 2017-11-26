<?php
class Dokter extends CI_Controller{

            function __construct(){
              parent::__construct();
                
              $this->load->model('model_dokter');
              $this->load->library(array('pagination','session','cart','form_validation'));
               

            }

            function index($id = NULL){
               unset_sesi('kode_psn_resep');
                $this->cart->destroy();
              $data['total'] = $this->model_dokter->get_all_pasien(NULL,NULL,$this->session->userdata('kodenameuser'))->num_rows();

              $config['base_url']=base_url()."dashboard/data_obat";
              $config['total_rows']=$data['total'];
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
              $data['query']=$this->model_dokter->get_all_pasien($config['per_page'],$id,$this->session->userdata('kodenameuser'))->result();
              $this->load->view('page/dokter/vw_pasien',$data);
            }

            /*function obat(){
              $this->load->view('page/dokter/vw_berikanobat');
              $this->session->set_userdata('kode_psn_resep',$this->uri->segment('3'));

            }
            */
    
            
    /*
            function cari_dataobat(){
              $var = ambil('search_obat');

              $r = $this->model_dokter->data_obat($var)->result();
              foreach ($r as $k){
                $array_data[] = array(
                  'kode_obat'   => $k->kode_obat,
                  'nama_obat'   => $k->nama_obat,
                  'jenis_obat'  => $k->jenis_obat,
                  'kategori'    => $k->kategori,
                  'harga_obat'  => $k->harga_obat,
                  'jumlah_obat' => $k->jumlah_obat,
                );
              }

              echo json_encode($array_data);
            }
            
            

            function cek_stokobat(){

              $var = ambil('kode_obat');

              $r = $this->model_dokter->ambil_obat($var);

              $f=$r->row();
              if ($f->jumlah_obat == 0){
                $array_data[] = array(
                  'jumlah_obat' => 0,
                );
              }else{
            $array_data[] = array(
              'jumlah_obat' => $f->jumlah_obat,
              'kode_obat'   => $f->kode_obat,
            );
            }
            echo json_encode($array_data);
            }
*/
    /*
            function add_obat($kode){
              $data['query'] = $this->model_dokter->ambil_obat(decr($kode))->result();
              $d = $this->model_dokter->ambil_obat(decr($kode));
              $r = $d->row();
              $items=array(
                'id'        => $kode,
                'qty'       => 1,
                'price'     => $r->harga_obat,
                'name'      => $r->nama_obat,
                'jenis_obat' => $r->jenis_obat,
                'kategori'  => $r->kategori
              );

              $this->cart->insert($items);
              $data['query2'] = $this->model_dokter->get_pasien($this->session->userdata('kode_psn_resep'));
              $this->load->view('page/dokter/vw_resep',$data);
            }

            function proses_obat(){

              $this->form_validation->set_rules('resep_lengkap','Resep obat','required');

                if ($this->form_validation->run()){
                      $data['kode'] = random_chara("R_"); //prefix R
                      $this->session->set_flashdata("kode_resep",$data['kode']);
                      $r = $this->model_dokter->get_pasien($this->session->userdata('kode_psn_resep'))->row();
                  foreach ($this->cart->contents() as $items):  
                   $data1 = array(
                    'nomor_resep'    => $data['kode'],
                    'tanggal_resep'  => date('d-m-Y'),
                    'kode_obat'      => $items['id'],
                    'kode_dkt'       => $r->kode_dkt,
                    'kode_psn'       => $r->kode_psn,
                    'kode_plk'       => $r->kode_plk,
                    'detail_resep'   => ambil('resep_lengkap'),
                  );                        
                        
                  
                  $data2=array(
                    'nomor_resep'    => $data['kode'],
                    'kode_obat'      => $items['id'],
                    'dosis'          => ambil('dosis'),
                  );
                    $nomor_obat = $items['id'];
                  endforeach;
                    foreach ($this->model_dokter->get_data($nomor_obat,"kode_obat","obat")->result() as $k){
                        $jumlah_obat = $k->jumlah_obat;
                    }
                    $min = --$jumlah_obat;
                    $data3=array(
                        'jumlah_obat' => $min
                    );

                  if ($this->model_dokter->insert_data($data2,'detail')){
                      $this->model_dokter->insert_data($data1,'resep');
                      
                      $this->model_dokter->update_data($data3,"kode_obat",$nomor_obat,"obat");
                          
                    $this->load->view('page/dokter/vw_detailresep',$data);

                  }else{
                    echo "Tidak berhasik";
                  }
                }
            }
            
            
            function bayar_langsung($kode){
              foreach ($this->cart->contents() as $items):
                $data=array(
                  'total_harga'     => $items['price'],
                  'bayar'           => ambil('jumlah_uang'),
                  'status_bayar'    => 1,
                );
                $data2=array(
                  'harga'     => $items['price'],
                  'sub_total' => $items['price'],
                );
              endforeach;
              if ($this->model_dokter->update_data($data,'nomor_resep',$kode,'resep')){
                $this->model_dokter->update_data($data2,'nomor_resep',$kode,'detail');
                ref_pesan("Berhasil membayar",'dokter');
              }else{
                ref_pesan("Tidak berhasil",'dokter');
              }
                
                unset_sesi('kode_psn_resep');
              $this->cart->destroy();
            }
            function remove_obat(){
              unset_sesi('kode_psn_resep');
              $this->cart->destroy();
              redirect('dokter');
            }
            
            */
    
            function berikan_resep($kode){
                $data['query_obat'] = $this->model_dokter->get_obatfromcategory()->result();
                $data['query'] = $this->model_dokter->get_pasien($kode)->result();
                $this->load->view('page/dokter/vw_resep',$data);
            }
            
            function pilih_obat(){
                $f = ambil('cat_obat');
                
                $z = $this->model_dokter->get_obatgen($f)->result();
                
                foreach ($z as $k){
                    $data[] = array(
                        'kode_obat' => $k->kode_obat,
                        'nama_obat' => $k->nama_obat,
                    );
                    
                    
                }
                echo json_encode($data);
            }
    
            function proses_resep($kode){
                $acak_kode = random_chara("R_");
                $f= $this->model_dokter->get_data($this->session->userdata('kodenameuser'),'kode_dkt','dokter')->row();
                $data = array(
                    'nomor_resep'       => $acak_kode,
                    'tanggal_resep'     => date('d-m-Y'),
                    'diagnosa'         => ambil('diagnosa'),
                    'kode_dkt'          => $this->session->userdata('kodenameuser'),
                    'kode_psn'          => $kode,
                    'kode_plk'          => $f->kode_plk,
                    'detail_resep'        => ambil('ket'),
                );
                if (    $this->model_dokter->insert_data($data,'resep')){
                    ref_pesan("Resep berhasil ditambahkan",'dokter');
                }else{
                    ref_error(NULL,'dokter');
                }
            }
            function coba(){
              $r=unset_sesi("andro,jovi");

            }
    
            function infolengkap($kode){
                $data['query'] = $this->model_dokter->get_resepinfo(decr($kode))->result();
                $this->load->view('page/dokter/vw_infolengkap',$data);
            
            }
    
            function jam_praktek(){
                        $this->load->view('page/dokter/vw_aturjampraktek');
                    }
    
            function proses_aturjam(){
                $this->form_validation->set_rules('jam_mulai','Mulai praktek','required');
                $this->form_validation->set_rules('jam_selesai','Selesai praktek','required');
                
                if ($this->form_validation->run()){
                
                $data = array(
                    'mulai_praktek'     => ambil('jam_mulai'),
                    'selesai_praktek'   => ambil('jam_selesai'),
                );
                if ($this->model_dokter->update_data($data,'kode_dkt',$this->session->userdata('kodenameuser'),'dokter')){
                    ref_pesan('Berhasil','dokter');
                }else{
                    echo "Galat";
                }
                    
                    }
            }
}
