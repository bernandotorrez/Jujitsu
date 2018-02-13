<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_C extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Login_M');
    $this->load->library('Check_login');
    
  }

  public function index(){
    /*============= START Fungsi untuk memanggil halaman Index =============*/

    $data['title'] = 'Halaman Login - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'login-page';
    $data['captcha'] = $this->Captcha_M->captcha();
    $data['url'] =  $this->uri->uri_string();
    $this->template->display('content/login',$data);

    /*============= END Fungsi untuk memanggil halaman Index =============*/
  }

  public function login_member(){
    /*============= START Fungsi untuk cek Login =============*/

      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $captcha = $this->input->post('captcha');
      $date = date("Y-m-d H:i:s", strtotime('+7 hours'));
       
      $expiration = time() - 600; // Two hour limit
$this->db->where('captcha_time < ', $expiration)
        ->delete('captcha');

// Then see if a captcha exists:
$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
$binds = array($captcha, $this->input->ip_address(), $expiration);
$query = $this->db->query($sql, $binds);
$row = $query->row();

if ($row->count == 0)
{
        echo 'captcha';
}  else {
       
        $where = array(
            'email' => $email,
            'password' => md5($password)
            );
        $data = array('login_time' => $date);
        $cek = $this->Login_M->cek_login('login',$where)->num_rows();
        
        if($cek > 0){
        $update = $this->Login_M->update($email,'login',$data);
        $data = $this->Login_M->cek_login('login',$where)->result_array();
        foreach($data as $row){
        $verifikasi = $row['verifikasi'];
        $status = $row['status'];
        $level = $row['level'];
        }
        if($verifikasi=='None'){
          echo 'Verifikasi';            //cek verifikasi, apakah sudah di verifikasi atau belum
          } else if($status=='None'){
             echo 'Inactive';           //cek aktif, apakah login tersebut masih aktif atau tidak 
          } elseif($level=='Anggota'){
            $data_session = array(
                'email' => $email,
                'login_member' => "true"
                );
 
            $this->session->set_userdata($data_session); //jika username dan password benar, status nya aktiv
                                                         //maka pasang fungsi SESSION
 
            echo 'ok';
        } elseif($level=='Admin'){
            $data_session = array(
                'email' => $email,
                'login_admin' => "true"
                );
 
            $this->session->set_userdata($data_session); //jika username dan password benar, status nya aktiv
                                                         //maka pasang fungsi SESSION
 
            echo 'ok';
        }
        }else{
           echo "Error";
        }
}
      /*============= END Fungsi untuk cek Login =============*/
    }

    public function logout(){
      /*============= START Fungsi untuk Logout =============*/

        $this->session->sess_destroy();  //buang data dari SESSION yang aktif
        redirect(base_url('Home'));

        /*============= END Fungsi untuk Logout =============*/
    }
   
   
}
