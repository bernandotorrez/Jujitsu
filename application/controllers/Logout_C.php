<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout_C extends CI_Controller {

  public function __construct(){
    parent::__construct();
  	$this->load->model('Logout_M');
  }

  public function index(){
    /*============= START Fungsi untuk UPDATE DATA logout time =============*/

  		$email = $this->session->userdata('email');
  		$date = date("Y-m-d H:i:s", strtotime('+7 hours'));
  		$data = array('logout_time' => $date);
  		$update = $this->Logout_M->update($email,'login',$data);
        $this->session->sess_destroy();
        redirect(base_url('Home'));

        /*============= END Fungsi untuk UPDATE DATA logout time =============*/
    }
}