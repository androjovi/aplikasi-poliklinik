<?php
ob_start();
class Auth extends CI_Controller{

          function __construct(){
              parent::__construct();

              $this->load->model('model_login');
              $this->load->library('session');


          }

          function index(){
            if ($this->session->userdata('userstatus') == TRUE){
              redirect('dashboard');
            }
              $this->load->view('page/login');
          }

          private function login_acces($kolom,$user,$pass,$table){
            $f = $this->model_login->login($kolom,$user,$table);
              if ($f->num_rows() == 1){
                $user_row = $f->row();
                $pass_h = password_verify($pass, $user_row->password);
                  if ($pass_h == TRUE){
                    return TRUE;
                  }else{
                    return FALSE;
                  }
              }else{
                return FALSE;
              }
              return FALSE;
          }

          function login(){
            if ($this->session->userdata('userstatus') == TRUE){
              redirect('dashboard');
            }
            $r= $this->login_acces('username',ambil('nameuser'),ambil('wordpass'),'dokter');
            echo $r;

            if ($r !== FALSE){
              $r = $this->model_login->login('username',ambil('nameuser'),'dokter');
              $user_row = $r->row();
              $cr_sesi=array(
                'userstatus'   => TRUE,
                'kodenameuser' => $user_row->kode_dkt,
                'nameuser'     => $user_row->username,
                'fullname'   => $user_row->nama_dkt,
                'aksesstatus'  => 2, // 1 = petugas, 2 = Dokter, 3 = Petugas
              );
              $this->session->set_userdata($cr_sesi);
              redirect('dashboard');
            }else{
              ref_pesan("Username atau password salah",'auth');
            }

          }

          function login_admin(){
                if ($this->session->userdata('userstatus') == TRUE){
              redirect('dashboard');
            }
              
              $r= $this->login_acces('username',ambil('nameuser'),ambil('wordpass'),'akun');
            echo $r;

            if ($r !== FALSE){
              $r = $this->model_login->login('username',ambil('nameuser'),'akun');
              $user_row = $r->row();
              $cr_sesi=array(
                'userstatus'   => TRUE,
                'kodenameuser' => $user_row->id,
                'nameuser'     => $user_row->username,
                'fullname'   => $user_row->nama,
                'aksesstatus'  => 1, // 1 = petugas, 2 = Dokter, 3 = Petugas
              );
              $this->session->set_userdata($cr_sesi);
              redirect('dashboard');
            }else{
              ref_pesan("Username atau password salah",'auth');
            }

            
          }
    
    function login_apoteker(){
                if ($this->session->userdata('userstatus') == TRUE){
              redirect('dashboard');
            }
              
              $r= $this->login_acces('username',ambil('nameuser'),ambil('wordpass'),'akun');
            echo $r;

            if ($r !== FALSE){
              $r = $this->model_login->login('username',ambil('nameuser'),'akun');
              $user_row = $r->row();
              $cr_sesi=array(
                'userstatus'   => TRUE,
                'kodenameuser' => $user_row->id,
                'nameuser'     => $user_row->username,
                'fullname'   => $user_row->nama,
                'aksesstatus'  => 3, // 1 = petugas, 2 = Dokter, 3 = apoteker
              );
              $this->session->set_userdata($cr_sesi);
              redirect('dashboard');
            }else{
              ref_pesan("Username atau password salah",'auth');
            }
    }

          function logout(){
            $this->session->sess_destroy();
            redirect('auth');
              
              
          }

          function randompass($pass){
            $karakter = "AaBbCcDdOoPpQqRrSsTtUuVWwYyXxZz";
            $string = '';
            $panjang = 7;
            $pasx = substr($pass,0,3);
            for ($i=0; $i<$panjang; $i++){
              $pos = rand(0,strlen($karakter)-1);
              $string .=$karakter{$pos};
            }
            echo $pasx.$string;
          }
}
