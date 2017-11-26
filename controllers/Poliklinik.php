<?php
class Poliklinik extends CI_Controller{

            function __construct(){
              parent::__construct();
                $this->load->model('model_poliklinik');
                $this->load->view('halaman_statis/header');
            }

            function index(){
              $data['read_data']  = $this->model_poliklinik->get_poliklinik()->result();

              $this->load->view('homepage/vw_poliklinik',$data);

              $str = "asd";

              $ff= ency($str);
              echo decr($ff);

            }

}

/* End of file Poliklinik.php
 * Location application/controllers/Poliklink.php
 */
