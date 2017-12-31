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
              // Data obat

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
              $data['query']=$this->model_datamaster->get_all($config['per_page'],$id,"obat")->result();

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
                        ref_otomatis("datamaster/data_obat");
                    }

              }
            }

            function hapus_obat($kode){
              $data=array(
                'kode_obat' => decr($kode),
              );

                  if ($this->model_datamaster->hapus_obat($data)){
                    ref_pesan("Berhasil dihapus","datamaster/data_obat");
              }
            }

            function edit_obat($kode){
              $data['get_obat'] = $this->model_datamaster->get_obat(decr($kode))->result();
              $this->load->view('page/data_obat/vw_editobat',$data);
            }

            function submit_editoabat($kode){
              $up = FALSE;
              if (NULL ==! ambil('nam_obat')){
                  $nama_obat = array(
                    'nama_obat' => ambil('nam_obat')
                  );
                  $up = $this->model_datamaster->update_obat($nama_obat,$kode);
              }

              if (NULL ==! ambil('jeni_obat')){
                $jenis_obat = array(
                  'jenis_obat' => ambil('jeni_obat')
                );
                $up = $this->model_datamaster->update_obat($jenis_obat,$kode);
              }

              if (NULL ==! ambil('kategor')){
                $kategori = array(
                  'kategori' => ambil('kategor')
                );
                $up = $this->model_datamaster->update_obat($kategori,$kode);
              }

              if (NULL ==! ambil('harg_obat')){
                $harga_obat = array(
                  'harga_obat' => ambil('harg_obat')
                );
                $up = $this->model_datamaster->update_obat($harga_obat,$kode);
              }

              if (NULL ==! ambil('jumla_obat')){
                $jumlah_obat = array(
                  'jumlah_obat' => ambil('jumla_obat')
                );
                $up = $this->model_datamaster->update_obat($jumlah_obat,$kode);
              }

              if ($up !== FALSE){
                ref_pesan("Data anda berhasil di update","datamaster/data_obat");
              }else{
                ref_pesan("Kesalahan dalam mengupdate, coba lagi","datamaster/edit_obat/$kode");
              }
            }

                // End of data obat

            function data_pasien($id = NULL){
              $data['total_pasien'] = $this->model_datamaster->read_pasien(NULL)->num_rows();

              $total_rows=$this->model_datamaster->read_pasien(NULL)->num_rows();

              $config['base_url']=base_url()."dashboard/data_pasien";
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
              $data['query']=$this->model_datamaster->get_all($config['per_page'],$id,"pasien")->result();

              $this->load->view('page/data_pasien/vw_datapasien',$data);
            }

            function submit_datapasien(){
              $this->form_validation->set_rules('nam_psn','Nama pasien','trim');
              $this->form_validation->set_rules('alamat','Alamat','trim');
              $this->form_validation->set_rules('jenis_kelamin','Jenis kelamin','trim');
              $this->form_validation->set_rules('umur','Umur','trim');
              $this->form_validation->set_rules('n_telp','No telepon','trim');

                if ($this->form_validation->run()){
                    $data=array(
                      'kode_psn'      => uniqid(),
                      'nama_psn'      => ambil('nam_psn'),
                      'alamat_psn'    => ambil('alamat'),
                      'gender_psn'    => ambil('jenis_kelamin'),
                      'umur_psn'      => ambil('umu'),
                      'telepon_psn'   => ambil('n_telp'),
                    );

                    if ($this->model_datamaster->insert_pasien($data)){
                      ref_otomatis('datamaster/data_pasien');
                    }else{
                      echo "Tidak berhasil";
                    }
                }
            }

            function delete_pasien($kode){
              if ($this->model_datamaster->delete_pasien(decr($kode))){
                ref_pesan("Data anda berhasil di hapus","datamaster/data_pasien");
              }else{
                echo "Tidak berhasil";
              }
            }

            function edit_pasien($kode){
              $data['get_psn'] = $this->model_datamaster->read_pasien(decr($kode))->result();

              $this->load->view('page/data_pasien/vw_editpasien',$data);
            }

            function submit_editpasien($kode){
              $this->form_validation->set_rules('nam_psn','Nama pasien','trim');
              $this->form_validation->set_rules('alamat','Alamat','trim');
              $this->form_validation->set_rules('jenis_kelamin','Jenis kelamin','trim');
              $this->form_validation->set_rules('umur','Umur','trim');
              $this->form_validation->set_rules('n_telp','No telepon','trim');

                if ($this->form_validation->run()){

                    if ( NULL ==! ambil('nam_psn')){
                      $a = array(
                        'nama_psn' => ambil('nam_psn')
                      );
                      $r = $this->model_datamaster->update_pasien($a,$kode);
                    }

                    if ( NULL ==! ambil('alamat')){
                      $b = array(
                        'alamat_psn' => ambil('alamat')
                      );
                      $r = $this->model_datamaster->update_pasien($b,$kode);
                    }

                    if ( NULL ==! ambil('jenis_kelamin')){
                      $c = array(
                        'gender_psn' => ambil('jenis_kelamin')
                      );
                      $r = $this->model_datamaster->update_pasien($c,$kode);
                    }

                    if ( NULL ==! ambil('umur')){
                      $d = array(
                        'umur_psn' => ambil('umur')
                      );
                      $r = $this->model_datamaster->update_pasien($d,$kode);
                    }

                    if ( NULL ==! ambil('n_telp')){
                      $e = array(
                        'telepon_psn' => ambil('n_telp')
                      );
                      $r = $this->model_datamaster->update_pasien($e,$kode);
                    }

                      if ($r !== FALSE){
                        ref_pesan("Anda berhasil melakukan update","datamaster/data_pasien");
                      }else{
                        ref_pesan("Gagal melakukan update","datamaster/edit_pasien/".$kode);
                      }
                }

            }
            // ------------ Dokter

            function data_dokter($id = NULL){
              $data['total_dokter'] = $this->model_datamaster->read_dokter(NULL)->num_rows();

              $total_rows=$this->model_datamaster->read_dokter(NULL)->num_rows();

              $config['base_url']=base_url()."dashboard/data_dokter";
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
              $data['query']=$this->model_datamaster->get_all($config['per_page'],$id,"dokter")->result();

              $data['kode_poliklinik'] = $this->model_datamaster->get_poliklinik()->result();
              $this->load->view('page/data_dokter/vw_datadokter',$data);
            }
            private function randomuser($user){
              $karakter = strtolower(substr($user,0,5));
              return $karakter;
            }

            private function randompass($pass){
              $karakter = "abcdefg1234567890";
              $string = '';
              $panjang = 7;
              $pasx = strtolower(substr($pass,0,3));
              for ($i=0; $i<$panjang; $i++){
                $pos = rand(0,strlen($karakter)-1);
                $string .=$karakter{$pos};
              }
              return $pasx.$string;
            }
            

            function submit_datadokter(){
              $this->form_validation->set_rules('nam_dokter','Nama dokter','trim');
              $this->form_validation->set_rules('spesiali','Spesialis','trim');
              $this->form_validation->set_rules('alamat','Alamat','trim');
              $this->form_validation->set_rules('telepo_dokter','No telepon','trim');
              $this->form_validation->set_rules('kode_plk','Kode poliklinik','trim');
              $this->form_validation->set_rules('tari','Tarif','trim');
              $r= $this->randompass(ambil('nam_dokter'));
              if ($this->form_validation->run()){
                  $data=array(
                    'kode_dkt'     => uniqid(),
                    'nama_dkt'     => ambil('nam_dokter'),
                    'spesialis'    => ambil('spesiali'),
                    'alamat_dkt'   => ambil('alamat'),
                    'telepon_dkt'  => ambil('telepo_dokter'),
                    'kode_plk'     => ambil('kode_plk'),
                    'tarif'        => ambil('tari'),
                    'username'     => $this->randomuser(ambil('nam_dokter')),
                    'password'     => hash_pass($r),
                  );

                    if ($this->model_datamaster->insert_dokter($data)){
                      echo "
                        Username = ".$this->randomuser(ambil('nam_dokter'))."<br>
                        Password = ".$r."<br><br>
                        <a href='".site_url('datamaster/data_dokter')."'>Kembali</a>
                      ";
                    }
              }else{
                ref_pesan("Kesalahan","datamaster/data_dokter");
              }
            }

            function delete_dokter($kode){
              if ($this->model_datamaster->delete_dokter(decr($kode))){
                ref_pesan("Berhasil dihapus","datamaster/data_dokter");
              }else{
                ref_pesan("Tidak berhasil dihapus","datamaster/data_dokter");
              }
            }

            function edit_dokter($kode){
              $data['kode_poliklinik'] = $this->model_datamaster->get_poliklinik()->result();
              $data['query'] = $this->model_datamaster->read_dokter(decr($kode))->result();
              $this->load->view('page/data_dokter/vw_editdokter',$data);
            }

            function submit_editdokter($kode){
              $data=array(
                'nama_dkt'     => ambil('nam_dokter'),
                'spesialis'    => ambil('spesiali'),
                'alamat_dkt'   => ambil('alamat'),
                'telepon_dkt'  => ambil('telepo_dokter'),
                'kode_plk'     => ambil('kode_plk'),
                'tarif'        => ambil('tari'),
              );

                if ($this->model_datamaster->update_dokter($data,$kode)){
                  ref_pesan("Berhasil di update","datamaster/data_dokter");
                }else{
                  ref_pesan("Tidak berhasil","datamaster/edit_dokter".$kode);
                }
            }

            //-------------- poliklinik

            function data_poliklinik($id = NULL){
              $data['total_poliklinik'] = $this->model_datamaster->read_poliklinik(NULL)->num_rows();

              $total_rows=$this->model_datamaster->read_poliklinik(NULL)->num_rows();

              $config['base_url']=base_url()."dashboard/data_poliklinik";
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
              $data['query']=$this->model_datamaster->get_all($config['per_page'],$id,"poliklinik")->result();

              $this->load->view('page/data_poliklinik/vw_datapoliklinik',$data);
            }

            function submit_datapoliklinik(){
              $data=array(
                'kode_plk' => ambil('kod_poli'),
                'nama_plk' => ambil('nam_poli'),
              );
                if ($this->model_datamaster->insert_poliklinik($data)){
                  ref_pesan("Berhasil menambah","datamaster/data_poliklinik");
                }else{
                  ref_pesan("Kesalahan","datamaster/data_poliklinik");
                }
            }

            function delete_poliklinik($kode){
                if ($this->model_datamaster->del_poliklinik($kode)){
                  ref_pesan("Data berhasil dihapus","datamaster/data_poliklinik");
                }else{

                }
            }

            function data_pendaftar($id = NULL){
              $data['total_pendaftar'] = $this->model_datamaster->read_pendaftar(NULL)->num_rows();

              $total_rows=$this->model_datamaster->read_pendaftar(NULL)->num_rows();

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
              $data['query']=$this->model_datamaster->read_pendaftar_all($config['per_page'],$id)->result();

              $this->load->view('page/data_pendaftar/vw_datapendaftar',$data);
            }

            function delete_pendaftar($kode){

                if ( $this->model_datamaster->del_pendaftar($kode)){
                  ref_pesan("Berhasil dihapus","datamaster/data_pendaftar");
                }else{
                  //
                }
            }

            function info_pendaftar($kode){
              $data['query'] = $this->model_datamaster->read_pendaftar_where(decr($kode))->result();
              $this->load->view('page/data_pendaftar/vw_infopendaftar',$data);
            }

            function search_dataobat(){
              $data = array(
                'nama_obat' => ambil('val_search'),
              );
              
              $r = $this->model_datamaster->like_data($data,'obat');

              foreach($r->result() as $k){
                $parse = array(
                  'kode_obat'   => $k->kode_obat,
                  'nama_obat'   => $k->nama_obat,
                  'harga_obat'  => $k->harga_obat,
                  'jumlah_obat' => $k->jumlah_obat,
                  'jenis_obat'  => $k->jenis_obat,
                  'kategori'    => $k->kategori,
                );
                
              }
              echo json_encode($parse);
            }
}
