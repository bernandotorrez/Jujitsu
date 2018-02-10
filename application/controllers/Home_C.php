<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_C extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Home_M');
    $this->load->library('email');
    $this->cekPendaftaran();
    $this->load->helper('tanggal');
  }

  public function index(){
    /*============= START Fungsi untuk memanggil halaman Index =============*/

    $data['title'] = 'Halaman Utama - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'section-white';
    $data['url'] = $this->uri->uri_string();
    $data['total'] = $this->Home_M->jumlah_anggota();
    $this->template->display('content/index',$data);

    /*============= END Fungsi untuk memanggil halaman Index =============*/
  }
  
  public function pendaftaran(){
    /*============= START Fungsi untuk memanggil halaman Pendaftaran Anggota =============*/

    $cek = $this->session->userdata('cekPendaftaran'); //cek apakah sudah mendaftar anggota?
    if($cek=="true"){
      $email = $this->session->userdata('email');       //jika bernilai "true" akan mengambil
      $data['code'] = $this->Home_M->getCode($email);   //data dari Home_M->getCode
    }
    $data['title'] = 'Halaman Formulir Pendaftaran Anggota - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'about-us';
    $data['url'] = $this->uri->uri_string();
    $data['fakultas'] = $this->Home_M->getData('fakultas');
    $data['jurusan'] = $this->Home_M->getChained();
    //$data['code'] = $this->code();
    $this->template->display('content/pendaftaran',$data);

    /*============= END Fungsi untuk memanggil halaman Pendaftaran Anggota =============*/
    
  }
  
  public function pendaftaran_luar(){
    /*============= START Fungsi untuk memanggil halaman Pendaftaran Anggota =============*/

    $cek = $this->session->userdata('cekPendaftaran'); //cek apakah sudah mendaftar anggota?
    if($cek=="true"){
      $email = $this->session->userdata('email');       //jika bernilai "true" akan mengambil
      $data['code'] = $this->Home_M->getCode($email);   //data dari Home_M->getCode
    }
    $data['title'] = 'Halaman Formulir Pendaftaran Anggota - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'about-us';
    $data['url'] = $this->uri->uri_string();
    $data['fakultas'] = $this->Home_M->getData('fakultas');
    $data['jurusan'] = $this->Home_M->getChained();
    //$data['code'] = $this->code();
    $this->template->display('content/pendaftaran',$data);

    /*============= END Fungsi untuk memanggil halaman Pendaftaran Anggota =============*/
    
  }

  public function saran(){
    /*============= START Fungsi untuk memanggil halaman Saran =============*/

    $data['title'] = 'Halaman Saran - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'about-us';
    $data['captcha'] = $this->Captcha_M->captcha();
    $data['url'] = $this->uri->uri_string();
    
    $this->template->display('content/saran',$data);

    /*============= END Fungsi untuk memanggil halaman Saran =============*/
  }
  


  public function profile(){
    /*============= START Fungsi untuk memanggil halaman Profil =============*/

      if(!$this->session->userdata('email')){ //cek apakah sudah login?
          redirect(base_url('Home')); //jika belum login akan ditendang ke halaman Index
          
      }
    $data['title'] = 'Halaman Profile - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'profile-page';
    $data['url'] = $this->uri->uri_string();
    $where = array('a.email' => $this->session->userdata('email'));
    $cek = $this->Home_M->getDataProfile($where)->num_rows();

    if($cek > 0){                                             //cek data apakah bernilai lebih dari 0?
    $data['cek'] = 'true';                                    //jika bernilai lebih dari 0 maka,
    $data['profil'] = $this->Home_M->getDataProfile($where);  //mengambil data dari Home_M->getDataProfile
    } else {                                  
    $data['cek'] = 'false';                                         //cek data apakah bernilai lebih dari 0?
    $where = array('email' => $this->session->userdata('email'));   //jika tidak bernilai lebih dari 0 maka,
    $data['profil'] = $this->Home_M->cekData('login', $where);      //mengambil data dari Home_M->cekData
    }

    $this->template->display('content/profil',$data);

    /*============= END Fungsi untuk memanggil halaman Profil =============*/
  }

  public function tentang(){
    /*============= START Fungsi untuk memanggil halaman Tentang Kami =============*/

    $data['title'] = 'Halaman Tentang Kami - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'about-us';
    $data['url'] = $this->uri->uri_string();
    $this->template->display('content/tentang',$data);

    /*============= END Fungsi untuk memanggil halaman Profil =============*/
  }

  public function kontak(){
    /*============= START Fungsi untuk memanggil halaman Kontak Kami =============*/

    $data['title'] = 'Halaman Kontak Kami - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'contact-page';
    $data['captcha'] = $this->Captcha_M->captcha();
    $data['url'] = $this->uri->uri_string();
    $this->template->display('content/kontak',$data);

    /*============= END Fungsi untuk memanggil halaman Kontak Kami =============*/
  }
  
  public function tutorial(){
    /*============= START Fungsi untuk memanggil halaman Cara Mendaftar =============*/

    $data['title'] = 'Halaman Cara Mendaftar - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'about-us';
    //$data['captcha'] = $this->Captcha_M->captcha();
    $data['url'] = $this->uri->uri_string();
    $this->template->display('content/tutorial',$data);

    /*============= END Fungsi untuk memanggil halaman Cara Mendaftar =============*/
  }

  public function kirim_pesan(){
    /*============= START Fungsi untuk INSERT DATA dari halaman Kontak Kami =============*/

    $nama =  ucwords($this->input->post('nama'));
    $email = $this->input->post('email');
    $phone = $this->input->post('phone');
    $pesan = ucwords($this->input->post('pesan'));
    $captcha = $this->input->post('captcha');
    $date = date("Y-m-d H:i:s", strtotime('+7 hours'));

    $expiration = time() - 600; // Two hour limit, fungsi cek expiration captcha
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

    $data = array(  'nama' => $nama,
            'email' => $email,
            'handphone' => $phone,
            'pesan' => $pesan,
            'tanggal_pesan' => $date
            );

    $input = $this->Home_M->input('pesan',$data); //panggil fungsi Home_M->input untuk INSERT DATA

    if($input){
      echo 'ok';
    } else {
      echo 'gagal';
    }

    /*============= END Fungsi untuk INSERT DATA dari halaman Kontak Kami =============*/
  }
  }

  public function kirim_saran(){
    /*============= START Fungsi untuk INSERT DATA dari halaman Saran =============*/

    $saran =  ucwords($this->input->post('saran'));
    $captcha = $this->input->post('captcha');
    $date = date("Y-m-d H:i:s", strtotime('+7 hours'));

    $expiration = time() - 600; // Two hour limit, cek expiration captcha
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
           

    $data = array(  
            'saran' => $saran,
            'tanggal_saran' => $date
            );

    $input = $this->Home_M->input('saran',$data); //panggil fungsi Home_M->input untuk INSERT DATA

    if($input){
      echo 'ok';
    } else {
      echo 'gagal';
    }
  }
  /*============= END Fungsi untuk INSERT DATA dari halaman Saran =============*/
  }
  
  public function pendaftaran_member(){
    /*============= START Fungsi untuk INSERT DATA dari halaman Pendaftaran =============*/

    $nim =  $this->input->post('nim');
    $nama =  ucwords($this->input->post('nama'));
    $jenis_kelamin = $this->input->post('jenis_kelamin');
    $no_hp = $this->input->post('no_hp');
    $tempat_lahir = ucwords($this->input->post('tempat_lahir'));
    $tanggal_lahir =  $this->input->post('tanggal_lahir');
    $fakultas =  $this->input->post('fakultas');
    $jurusan = $this->input->post('jurusan');
    $angkatan_kuliah = $this->input->post('angkatan_kuliah');
    $angkatan_jujitsu = $this->input->post('angkatan_jujitsu');
    $line =  $this->input->post('line');
    $whatsapp = $this->input->post('whatsapp');
    $alamat = ucwords($this->input->post('alamat'));
    $email = $this->session->userdata('email');
    $tanggal_lahir = str_replace("/", "-", $tanggal_lahir);
    $date = date("Y-m-d H:i:s", strtotime('+7 hours'));
    $code = $this->code();
    $data = array(  'nim' => $nim,                //siapkan parameter untuk INSERT DATA
            'nama_anggota' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_hp' => $no_hp,
            'id_fakultas' => $fakultas,
            'id_jurusan' => $jurusan,
            'angkatan_kuliah' => $angkatan_kuliah,
            'angkatan_jujitsu' => $angkatan_jujitsu,
            'line' => $line,
            'whatsapp' => $whatsapp,
            'alamat' => $alamat,
            'email' => $email,
            'register_time' => $date,
            'referral_code' => $code
            );

    $where = array('nim' => $nim);
    $cekpendaftaran = $this->Home_M->cekData('anggota', $where)->num_rows();

    if($cekpendaftaran > 0) {
      echo 'sudah ada';
    } else {
    $input = $this->Home_M->input('anggota',$data); //panggil fungsi Home_M->input untuk INSERT DATA

    if($input){
      echo 'ok';
      
      $data_session = array(
               
                'RefCode' => $code
                );
      $this->session->set_userdata($data_session);

      $this->email($email,$nama,$code);  //FUngsi untuk kirim Email
      
    } else {
      echo 'gagal';
    }
    }
    /*============= END Fungsi untuk INSERT DATA dari halaman Pendaftaran =============*/
  }

  public function code() {
    /*============= START Fungsi untuk generate Referral Code =============*/

    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $res = "";
    for ($i = 0; $i < 5; $i++) {
        $res .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    $where = array ('referral_code' => $res);
    $cek = $this->Home_M->cekData('anggota',$where)->num_rows();

    if($cek > 0){
      return $this->code();
    } else {
      return $res;
    }

    /*============= END Fungsi untuk generate Referral Code =============*/
    
    }

  public function cekPendaftaran(){
    /*============= START Fungsi untuk apakah user sudah melakukan pendaftaran anggota atau belum =============*/

    $email = $this->session->userdata('email');
    $where = array('email' => $email);
    $cek = $this->Home_M->cekData('anggota', $where)->num_rows();

    if($cek > 0){
      $data_session = array(
               
                'cekPendaftaran' => "true"
                );
      $this->session->set_userdata($data_session);
      
    } else {
      $data_session = array(
               
                'cekPendaftaran' => "false"
                );
      $this->session->set_userdata($data_session);
    }
    
    return $cek;

    /*============= END Fungsi untuk apakah user sudah melakukan pendaftaran anggota atau belum =============*/
  }
  
  public function email($email,$nama,$code){
    /*============= START Fungsi memasang konten Email dan mengirim Email =============*/

      $htmlContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>WELCOME</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
    <meta name="format-detection" content="telephone=no" />
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!--<![endif]-->
     <style type="text/css">
      body {
      -webkit-text-size-adjust: 100% !important;
      -ms-text-size-adjust: 100% !important;
      -webkit-font-smoothing: antialiased !important;
      }
      img {
      border: 0 !important;
      outline: none !important;
      }
      p {
      Margin: 0px !important;
      Padding: 0px !important;
      }
      table {
      border-collapse: collapse;
      mso-table-lspace: 0px;
      mso-table-rspace: 0px;
      }
      td, a, span {
      border-collapse: collapse;
      mso-line-height-rule: exactly;
      }
      .ExternalClass * {
      line-height: 100%;
      }
      span.MsoHyperlink {
      mso-style-priority:99;
      color:inherit;}
      span.MsoHyperlinkFollowed {
      mso-style-priority:99;
      color:inherit;}
      </style>
      <style media="only screen and (min-width:481px) and (max-width:599px)" type="text/css">
      @media only screen and (min-width:481px) and (max-width:599px) {
      table[class=em_main_table] {
      width: 100% !important;
      }
      table[class=em_wrapper] {
      width: 100% !important;
      }
      td[class=em_hide], br[class=em_hide] {
      display: none !important;
      }
      img[class=em_full_img] {
      width: 100% !important;
      height: auto !important;
      }
      td[class=em_align_cent] {
      text-align: center !important;
      }
      td[class=em_aside]{
      padding-left:10px !important;
      padding-right:10px !important;
      }
      td[class=em_height]{
      height: 20px !important;
      }
      td[class=em_font]{
      font-size:14px !important;  
      }
      td[class=em_align_cent1] {
      text-align: center !important;
      padding-bottom: 10px !important;
      }

      }
      </style>
     
      <style media="only screen and (max-width:480px)" type="text/css">
      @media only screen and (max-width:480px) {
      table[class=em_main_table] {
      width: 100% !important;
      }
      table[class=em_wrapper] {
      width: 100% !important;
      }
      td[class=em_hide], br[class=em_hide], span[class=em_hide] {
      display: none !important;
      }
      img[class=em_full_img] {
      width: 100% !important;
      height: auto !important;
      }
      td[class=em_align_cent] {
      text-align: center !important;
      }
      td[class=em_align_cent1] {
      text-align: center !important;
      padding-bottom: 10px !important;
      }
      td[class=em_height]{
      height: 20px !important;
      }
      td[class=em_aside]{
      padding-left:10px !important;
      padding-right:10px !important;
      } 
      td[class=em_font]{
      font-size:14px !important;
      line-height:28px !important;
      }
      span[class=em_br]{
      display:block !important;
      }
      }
    </style>
     
  </head>
  <body style="margin:0px; padding:0px;" bgcolor="#ffffff">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
      <!-- === PRE HEADER SECTION=== -->  
      <tr>
        <td align="center" valign="top"  bgcolor="#30373b">
          <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table" style="table-layout:fixed;">
            <tr>
              <td style="line-height:0px; font-size:0px;" width="600" class="em_hide" bgcolor="#30373b"><img src="images/spacer.gif" height="1"  width="600" style="max-height:1px; min-height:1px; display:block; width:600px; min-width:600px;" border="0" alt="" /></td>
            </tr>
            <tr>
              <td valign="top">
                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_wrapper">
                  <tr>
                    <td height="10" class="em_height" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td valign="top">
                            <table width="150" border="0" cellspacing="0" cellpadding="0" align="right" class="em_wrapper">
                              <tr>
                                <td align="right" class="em_align_cent1" style="font-family:Open Sans, Arial, sans-serif; font-size:12px; line-height:16px; color:#848789; text-decoration:underline;">
                                  <a href="#" target="_blank" style="text-decoration:underline; color:#848789;"></a>
                                </td>
                              </tr>
                            </table>
                            <table width="400" border="0" cellspacing="0" cellpadding="0" align="left" class="em_wrapper">
                              <tr>
                                <td align="left" class="em_align_cent" style="font-family:Open Sans, Arial, sans-serif; font-size:12px; line-height:18px; color:#848789; text-decoration:none;">
                                  
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="10" class="em_height" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <!-- === //PRE HEADER SECTION=== -->  
      <!-- === BODY SECTION=== --> 
      <tr>
        <td align="center" valign="top"  bgcolor="#ffffff">
          <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table" style="table-layout:fixed;">
            <!-- === LOGO SECTION === -->
            <tr>
              <td height="40" class="em_height">&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://pbs.twimg.com/profile_images/378800000433502142/638c93134ebf1e2fe50cc0d9ce6a825e.jpeg" width="230" height="80" style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;" border="0" /></a></td>
            </tr>
            <tr>
              <td height="30" class="em_height">&nbsp;</td>
            </tr>
            <!-- === //LOGO SECTION === -->
            <!-- === NEVIGATION SECTION === -->
            <tr>
              <td height="1" bgcolor="#fed69c" style="font-size:0px; line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" style="display:block;" border="0" alt="" /></td>
            </tr>
            <tr>
              <td height="14" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b; text-transform:uppercase; font-weight:bold;" class="em_font">
                <font style="text-decoration:none; color:#30373b;">Verifikasi Data Anggota</font> 
              </td>
            </tr>
            <tr>
              <td height="14" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            <tr>
              <td height="1" bgcolor="#fed69c" style="font-size:0px; line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" style="display:block;" border="0" alt="" /></td>
            </tr>
            <!-- === //NEVIGATION SECTION === -->
            <!-- === IMG WITH TEXT AND COUPEN CODE SECTION === -->
            <tr>
              <td valign="top" class="em_aside">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="36" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                   <td valign="middle" align="center"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/img_1.jpg" width="398" height="42" alt="ALMOST DONE" style="display:block; font-family:FISHfingers, Tahoma, Geneva, sans-serif; font-size:35px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;max-width:398px;" class="em_full_img" border="0" /></td>
                  </tr>
                  <tr>
                    <td height="41" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#d8e4f0" style="font-size:0px;line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" alt="" style="display:block;" border="0" /></td>
                  </tr>
                  <tr>
                    <td height="35" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:15px; font-weight:bold; line-height:18px; color:#30373b;">Halo &lt;'.$nama.'&gt;,</td>
                  </tr>
                  <tr>
                  <td>
                  &nbsp;
                  </td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:15px; font-weight:bold; line-height:18px; color:#30373b;">Terimakasih Sudah Mengisi Formulir Pendaftaran Anggota Jujitsu.</td>
                  </tr>
                  <tr>
                    <td height="22" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;">Langkah Terakhir Yang Harus Kamu Lakukan Adalah, Datang Ke UKM Jujitsu (Lokasi : Di Gedung Fakultas Ilmu Komputer Lantai Bawah) Untuk Memverifikasi Data Anggota Kamu Dengan Menunjukan Code Dibawah Ini.</td>
                  </tr>
                  <tr>
                    <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                
                  <tr>
                    <td height="12" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top" align="center">
                      <table width="210" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td valign="middle" align="center" height="45" bgcolor="#feae39" style="font-family:Open Sans, Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;"><font target="_blank" style="line-height:45px; display:block; color:#ffffff; text-decoration:none;">'.$code.'</font></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="34" class="em_height">&nbsp;</td>
                  </tr>
                
                  <tr>
                    <td>&nbsp;
                    </td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:15px; line-height:22px; color:#999999;">==== Jangan balas Email ini, ini adalah Email Otomatis. ====
                    </td>
                  </tr>
                  <tr>
                    <td height="31" class="em_height">&nbsp;</td>
                  </tr>
                </table>
              </td>
            </tr>
            <!-- === //IMG WITH TEXT AND COUPEN CODE SECTION === -->
          </table>
        </td>
      </tr>
      <!-- === //BODY SECTION=== -->
      <!-- === FOOTER SECTION === -->
      <tr>
        <td align="center" valign="top"  bgcolor="#30373b" class="em_aside">
          <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table" style="table-layout:fixed;">
            
           
            <tr>
              <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:12px; line-height:18px; color:#848789;text-transform:uppercase;">
                &copy;2&zwnj;017 Jujitsu UPN Veteran Jakarta. All Rights Reserved.
              </td>
            </tr>
            <tr>
              <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
           <tr>
              <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:12px; line-height:18px; color:#848789;text-transform:uppercase;">Created By : Bernand D H
              </td>
            </tr>
             <tr>
              <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
      <!-- === //FOOTER SECTION === -->
    </table>
    <div style="display:none; white-space:nowrap; font:20px courier; color:#ffffff; background-color:#ffffff;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
  </body>
</html>';

    
$config = Array(        
           
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1',
            'priority'  => 1
        );
$this->email->initialize($config);
$this->email->to($email);
$this->email->from('mailer@jujitsu-upn.online','Jujitsu UPN Mailer');
$this->email->subject('Selangkah Lagi! - Verifikasi Data Anggota');
$this->email->message($htmlContent);
$this->email->send();

/*============= END Fungsi memasang konten Email dan mengirim Email =============*/
  }

  public function upload_foto(){
    /*============= START Fungsi untuk Upload Foto Anggota =============*/

                //$this->load->helper('form');
                $config['upload_path']          = 'uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 500;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                
                $email = $this->session->userdata('email');
                $nim = $this->Home_M->getNim($email);
                $config['file_name'] = $nim;


                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        /*$data_session = array(
               
                        'error_foto' => $this->upload->display_errors()
                        );
                        $this->session->set_userdata($data_session);*/
                        $this->session->set_flashdata('gagal', $this->upload->display_errors());
                        redirect(base_url('Home/profile'));
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                       
                        foreach($data as $row){
                          $file_foto = $row['file_name'];
                        }

                         $data_foto = array('foto' => $file_foto);
                        $update = $this->Home_M->update($nim,'anggota',$data_foto);
                        $this->session->set_flashdata('sukses', 'Upload Data Sukses');
                         redirect(base_url('Home/profile'));
                }

                /*============= END Fungsi untuk Upload Foto Anggota =============*/
        }
  
}