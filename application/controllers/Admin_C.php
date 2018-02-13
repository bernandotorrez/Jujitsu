<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_C extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Admin_M');
    $this->load->library('email');
    $this->load->library('Check_login_admin');
    //$this->cekPendaftaran();
    $this->load->helper('tanggal');
  }

  public function index(){
    /*============= START Fungsi untuk memanggil halaman Index =============*/

    $data['title'] = 'Halaman Admin - Jujitsu UPN Veteran Jakarta';
    //$data['class'] = 'section-white';
    $data['url'] = $this->uri->uri_string();
    //$data['total'] = $this->Home_M->jumlah_anggota();
    $this->template->admin('content_admin/index',$data);
    

    /*============= END Fungsi untuk memanggil halaman Index =============*/
  }

  public function approval(){
    /*============= START Fungsi untuk memanggil halaman Approval =============*/

    $data['title'] = 'Halaman Admin Approval - Jujitsu UPN Veteran Jakarta';
    //$data['class'] = 'section-white';
    $data['url'] = $this->uri->uri_string();
    //$data['total'] = $this->Home_M->jumlah_anggota();
    $this->template->admin('content_admin/approval',$data);
    

    /*============= END Fungsi untuk memanggil halaman Approval =============*/
  }

  public function cari_approval(){
    $refcode = $this->input->post('refcode');

    $cek = $this->Admin_M->getDataRefCode($refcode);
  }

}
