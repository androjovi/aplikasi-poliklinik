<?php
class Dashboard extends CI_Controller{

            function __construct(){
              parent::__construct();


                  $this->load->model('model_dashboard');
                  $this->load->library(array('pagination'));
            }

            function index(){

            }

            function poliklinik($kode){

              $this->load->view('page/dashboard1');
            }

            
}
