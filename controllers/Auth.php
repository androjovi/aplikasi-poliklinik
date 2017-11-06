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

          private function login_acces($user,$pass){
            $f = $this->model_login->login($user);
              if ($f->num_rows() == 1){
                $user_row = $f->row();
                $pass_h = password_verify($pass, $user_row->password);
                  if ($pass_h == TRUE){
                    return "Password benar";
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
            $r= $this->login_acces(ambil('nameuser'),ambil('wordpass'));
            echo $r;

            if ($r !== FALSE){
              $r = $this->model_login->login(ambil('nameuser'));
              $user_row = $r->row();
              $cr_sesi=array(
                'userstatus'   => TRUE,
                'kodenameuser' => $user_row->kode_dkt,
                'nameuser'     => $user_row->username,
                'namedokter'   => $user_row->nama_dkt,
                'aksesstatus'  => "2", // 1 = pasien, 2 = Dokter, 3 = Petugas
              );
              $this->session->set_userdata($cr_sesi);
              redirect('dashboard');
            }else{
              echo "Username atau password salah";
            }

          }

          function login_admin(){

            define('s',"joviandro");

            if (ambil('password') == s){
              echo 1;
            }else{
              echo 0;
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
