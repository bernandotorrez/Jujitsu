<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi_C extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Verifikasi_M');
  }

  public function index(){
    $email = $this->input->get('id');
    $passkey = $this->input->get('key');
    $email = base64_decode($email);
    $passkey = base64_decode($passkey);
    $date = date("Y-m-d H:i:s", strtotime('+7 hours'));
    $where = array(
            'email' => $email,
            'passkey' => $passkey
            
            );
   
     $data = $this->Verifikasi_M->cek_email('login',$where)->result_array();

     $cek = $this->Verifikasi_M->cek_email('login',$where)->num_rows();
       if($cek > 0){
         foreach($data as $row){
        $verifikasi = $row['verifikasi'];
     }
     if($verifikasi=='None'){


           $data = array(
        'verifikasi' => 'Done',
        'status' => 'Active',
        'verifikasi_time' => $date
      );
           $update = $this->Verifikasi_M->update($email,'login',$data);
           if($update){
            $data['hasil'] = 'Verifikasi Berhasil';
           } else {
             $data['hasil'] = 'Verifikasi Gagal';
           }
         } else {
          $data['hasil'] = 'Email Sudah Diverifikasi';
         }
       } else {
         $data['hasil'] = 'Email Tidak Terdaftar';
       }
       $data['title'] = 'Halaman Verifikasi - Jujitsu UPN Veteran Jakarta';
       $data['class'] = 'about-us';
       $this->template->display('content/verifikasi',$data);
  }



  }