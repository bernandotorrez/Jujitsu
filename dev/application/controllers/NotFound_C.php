<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotFound_C extends CI_Controller {

  public function __construct(){
    parent::__construct();
  }

  public function index(){
    /*============= START Fungsi untuk memanggil halaman 404 =============*/

    $data['title'] = '404 Page Not Found';
    //$data['class'] = 'login-page';
    //$data['captcha'] = $this->Captcha_M->captcha();
    //$data['url'] =  $this->uri->uri_string();
    $this->load->view('404',$data);
    //redirect(base_url('NotFound'));

    /*============= END Fungsi untuk memanggil halaman 404 =============*/
  }

  
   
}