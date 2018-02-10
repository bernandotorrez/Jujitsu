<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_C extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Reset_M');
    $this->load->library('Check_login');
  }

  public function index(){
    $data['title'] = 'Halaman Reset Password - Jujitsu UPN Veteran Jakarta';
    $data['class'] = 'login-page';
    $data['captcha'] = $this->Captcha_M->captcha();
    $data['url'] =  $this->uri->uri_string();
    $this->template->display('content/reset',$data);
  }

  public function perbarui(){
    $email = $this->input->get('id');
    $passkey = $this->input->get('key');
    
    $email = base64_decode($email);
    $passkey = base64_decode($passkey);
    $date = date("Y-m-d H:i:s", strtotime('+7 hours'));
   
    
    $where = array(
            'email' => $email,
            'passkey' => $passkey
            
            );
   
    
     $cek = $this->Reset_M->cek_email('login',$where)->num_rows();
       if($cek > 0){
        $data['hasil'] = 'true';
     } else {
        $data['hasil'] = 'false';
     }

     
       $data['title'] = 'Halaman Perbarui Password - Jujitsu UPN Veteran Jakarta';
       $data['class'] = 'login-page';
       $data['email'] = base64_encode($email);
       $data['url'] =  $this->uri->uri_string();
       $this->template->display('content/update_pass',$data);
  }

  public function update_password(){
    $email = $this->input->post('email');
    $email = base64_decode($email);
    $password = $this->input->post('password');
    $passkey = md5(uniqid(rand()));
    $date = date("Y-m-d H:i:s", strtotime('+7 hours'));
    $data = array(
            
            'password' => md5($password),
            'passkey' => $passkey,
            'reset_time' => $date
            
            );
   
    
     $reset = $this->Reset_M->update($email,'login',$data);
       if($reset){
        echo 'ok';
     } else {
        echo 'gagal';
     }
     
      
  }

  public function reset_member(){
    $this->load->library('email');
    $email = $this->input->post('email');
     $captcha = $this->input->post('captcha');
     
      $passkey = md5(uniqid(rand()));
      
       
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
            'email' => $email
            );

        $cek = $this->Reset_M->cek_email("login",$where)->num_rows();
        if($cek > 0){
        $data = array(
       
        'passkey' => $passkey
    );

    $reset = $this->Reset_M->update($email,'login',$data);
    if($reset){
        
       $sendemail = base64_encode($email);
       $sendpasskey = base64_encode($passkey);
    // $email = $this->input->post('email');
   
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
                <font style="text-decoration:none; color:#30373b;">Reset Password</font> 
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
                    <td valign="middle" align="center"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/img1.png" width="150" height="149" alt="" style="display:block; font-family:Arial, sans-serif; font-size:25px; line-height:149px; color:#c27cbb;"  border="0" /></td>
                  </tr>
                  <tr>
                    <td height="25" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center">
                      <img src="https://www.sendwithus.com/assets/img/emailmonks/images/update.png" width="172" height="35" style="display:block;font-family:FISHfingers, Tahoma, Geneva, sans-serif; font-size:40px; line-height:42px; color:#feae39; text-transform:uppercase; letter-spacing:5px;" border="0" alt="UPDATE" />
                    </td>
                  </tr>
                  <tr>
                    <td height="25" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#d8e4f0" style="font-size:0px;line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" alt="" style="display:block;" border="0" /></td>
                  </tr>
                  <tr>
                    <td height="34" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                  <tr>
                    <td height="35" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:15px; font-weight:bold; line-height:18px; color:#30373b;">Dear &lt;'.$email.'&gt;,</td>
                  </tr>
                  <tr>
                  <td>
                  &nbsp;
                  </td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:15px; font-weight:bold; line-height:18px; color:#30373b;">Kami menemukan bahwa kamu melakukan permintaan reset password.</td>
                  </tr>
                  <tr>
                    <td height="22" style="font-size:1px; line-height:1px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:18px; font-weight:bold; line-height:20px; color:#feae39;">Silahkan link tombol dibawah ini untuk memperbarui password kamu</td>
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
                          <td valign="middle" align="center" height="45" bgcolor="#feae39" style="font-family:Open Sans, Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;">  <a href="'.base_url('reset/perbarui?id=').$sendemail.'&key='.$sendpasskey.'" style="color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #feae39; padding: 4px 9px; font-size: 15px; line-height: 21px; background-color: #feae39;"> Perbarui</a></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="34" class="em_height">&nbsp;</td>
                  </tr>
                 <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:15px; font-weight:bold; line-height:18px; color:#30373b;">Instruksi Selanjutnya Akan Di Informasikan Setelah Permintaan Reset Password Berhasil.<br><br> Kamu Hanya Bisa Memperbarui Password 1 Kali Per Permintaan.</td>
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
// $this->email->attach('https://ayoklarifikasi.com/berkas/Ijazah.pdf');
$this->email->initialize($config);
$this->email->to($email);
$this->email->from('mailer@jujitsu-upn.online','Jujitsu UPN Mailer');
$this->email->subject('Reset Password');
$this->email->message($htmlContent);
$this->email->send();
        
      echo 'ok';
    } else {
      echo 'Reset Password Gagal';
    }
      } else {
       echo 'Email tidak ditemukan';
      }
}
 
}
 

  
}