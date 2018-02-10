<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Sendmails_C extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library('email');
    $this->load->model('Sendmails_M');
  }

  public function index(){
    $this->load->view('email');
  }

  public function htmlmail(){
$this->email->to('bernandotorrez4@gmail.com');
$this->email->from('mailer@jujitsu-upn.online','Jujitsu Mailer');
$this->email->subject('Test Email (TEXT)');
$this->email->message('Text email testing by CodeIgniter Email library.');
$this->email->send();
echo 'berhasil';

  }

  public function tanggal_indo($tanggal, $cetak_hari = false)
{
  $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
      );
      
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  
  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}

  public function hari(){
    return date('l');
  }

  public function cronjob_selasa(){
    $cekhari = $this->hari();
    $ceklatihan = $this->Sendmails_M->cekModul('1');
    if($cekhari !='Tuesday'){
      echo 'fungsi ini hanya bisa dijalankan di hari selasa';
    } elseif($ceklatihan !='Yes'){
      echo 'Hari ini ga latihan';
    } else {

    $cek = $this->Sendmails_M->cronjob();
    foreach($cek as $data){
    $email = $data->email;
    $tanggal1 = date("Y-m-d H:i:s");
    $tanggal2 = date('Y-m-d', strtotime($tanggal1));
    $date = $this->tanggal_indo($tanggal2, true);
    
    $ceknama = $this->Sendmails_M->getDataNamaAnggota($email);

    if($ceknama ==''){
    	$nama = '< '.$email.' >';
    } else {
    	$nama = '< '.$ceknama.' >';
    }

    $cekfoto = $this->Sendmails_M->getDataFotoAnggota($email);

    if($cekfoto ==''){
    	$foto = "https://www.sendwithus.com/assets/img/emailmonks/images/activation.jpg";
    } else {
    	$foto = base_url('uploads/'.$cekfoto);
    }

    $htmlContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>AN INVITATION</title>
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
      td[class=em_pad_bottom]{
      padding-bottom:20px !important;
      }
      td[class=em_aside]{
      padding-left:10px !important;
      padding-right:10px !important;
      }
      td[class=em_height]{
      height: 20px !important;
      }
      td[class=em_space]{
      width:10px !important;  
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
      td[class=em_pad_bottom]{
      padding-bottom:20px !important;
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
      td[class=em_space]{
      width:10px !important;  
      }
      span[class=em_br]{
      display:block !important;
      }
      td[class=em_align_cent1] {
      text-align: center !important;
      padding-bottom: 10px !important;
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
              <td style="line-height:0px; font-size:0px;" width="600" class="em_hide" bgcolor="#30373b"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" height="1"  width="600" style="max-height:1px; min-height:1px; display:block; width:600px; min-width:600px;" border="0" alt="" /></td>
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
      <!-- === BODY === --> 
      <tr>
        <td align="center" valign="top"  bgcolor="#ffffff">
          <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table" style="table-layout:fixed;">
            <!-- === LOGO SECTION === -->
            <tr>
              <td height="40" class="em_height">&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://pbs.twimg.com/profile_images/378800000433502142/638c93134ebf1e2fe50cc0d9ce6a825e.jpeg" width="230" height="80" style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;" border="0" alt="Jujitsu UPN Veteran Jakarta" /></a></td>
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
                <a href="#" target="_blank" style="text-decoration:none; color:#30373b;">Ajakan Latihan</a> 
              </td>
            </tr>
            <tr>
              <td height="14" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            <tr>
              <td height="1" bgcolor="#fed69c" style="font-size:0px; line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" style="display:block;" border="0" alt="" /></td>
            </tr>
            <!-- === //NEVIGATION SECTION === -->
            <tr>
              <td valign="top" class="em_aside">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <!-- === TITLE AND TEXT SECTION === -->
                  <tr>
                    <td align="center" valign="top">
                      <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="10" class="em_space">&nbsp;</td>
                          <td align="center" valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="35" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" style="font-family:Open Sans, Arial, sans-serif; font-size:20pxl; line-height:22px; color:#30373b; text-transform:uppercase;">you&rsquo;ve received</td>
                              </tr>
                              <tr>
                                <td height="12" style="line-height:1px; font-size:1px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/img2.jpg" width="387" height="43" class="em_full_img" alt="AN INVITATION!" style="display:block; font-family:Arial, sans-serif;  font-size:40px; line-height:43px; color:#feae39; letter-spacing:6px; max-width:387px; text-transform:uppercase;" border="0" /></td>
                              </tr>
                              <tr>
                                <td height="40" class="em_height">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                          <td width="10" class="em_space">&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#d8d9da" style="line-height:0px; font-size:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" style="display:block;" border="0" alt="" /></td>
                  </tr>
                  <tr>
                    <td height="30" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:16px; line-height:19px; color:#30373b;  font-weight:bold;">Hari Ini : '.$date.'</td>
                  </tr>
                  <tr>
                    <td height="30" class="em_height">&nbsp;</td>
                  </tr>
                  <!-- === //TITLE AND TEXT SECTION === -->
                  <!-- === SIGNUP SECTION === -->
                  <tr>
                    <td align="center" valign="top" bgcolor="#feae39">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="10">&nbsp;</td>
                          <td align="center" valign="top">
                            <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="38" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top"><img src='.$foto.' width="120" height="120" alt="" style="display:block;" border="0" /></td>
                              </tr>
                              <tr>
                                <td height="21" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center"  style="font-family:Open Sans, Arial, sans-serif; font-size:16px; line-height:19px; color:#ffffff;  font-weight:bold;">'.$nama.'</td>
                              </tr>
                              <tr>
                                <td height="18" style="line-height:1px; font-size:1px;" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                                <td  align="center"  style="font-family:Open Sans, Arial, sans-serif; font-size:16px; line-height:24px; color:#ffffff; font-style:italic;">&ldquo;Halo '.$nama.'<br><br>Hari Ini Akan Didakan Latihan <br><br>Jangan Lupa Latihan Yah!&rdquo;
                                </td>
                              </tr>
                              <tr>
                                <td height="23" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                              
                              </tr>
                              <tr>
                                <td height="38" class="em_height">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                          <td width="10">&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- === //SIGNUP SECTION === -->
                  <!-- === UPCOMING PRODUVTS SECTION === -->
                  <tr>
                    <td height="33" class="em_height">&nbsp;</td>
                  </tr>
                 
                  <tr>
                    <td height="25" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">
                      <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                        
                  <tr>
                    <td>&nbsp;
                    </td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:15px; line-height:22px; color:#999999;">==== Jangan balas Email ini, ini adalah Email Otomatis. ====
                    </td>
                  </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="42" class="em_height">&nbsp;</td>
                  </tr>
                  <!-- === //UPCOMING PRODUVTS SECTION === -->
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <!-- === //BODY === --> 
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
$this->email->subject('Pengingat Jadwal Latihan');
$this->email->message($htmlContent);
$this->email->send();
  }
  }
}

public function cronjob_sabtu(){
  $cekhari = $this->hari();
    $ceklatihan = $this->Sendmails_M->cekModul('1');
    if($cekhari !='Saturday'){
      echo 'fungsi ini hanya bisa dijalankan di hari sabtu';
    } elseif($ceklatihan !='Yes'){
      echo 'Hari ini ga latihan';
    } else {

    $cek = $this->Sendmails_M->cronjob();
    foreach($cek as $data){
    $email = $data->email;
    $tanggal1 = date("Y-m-d H:i:s");
    $tanggal2 = date('Y-m-d', strtotime($tanggal1));
    $date = $this->tanggal_indo($tanggal2, true);

    $ceknama = $this->Sendmails_M->getDataNamaAnggota($email);

    if($ceknama ==''){
    	$nama = '< '.$email.' >';
    } else {
    	$nama = '< '.$ceknama.' >';
    }

    $cekfoto = $this->Sendmails_M->getDataFotoAnggota($email);

    if($cekfoto ==''){
    	$foto = "https://www.sendwithus.com/assets/img/emailmonks/images/activation.jpg";
    } else {
    	$foto = base_url('uploads/'.$cekfoto);
    }


    $htmlContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>AN INVITATION</title>
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
      td[class=em_pad_bottom]{
      padding-bottom:20px !important;
      }
      td[class=em_aside]{
      padding-left:10px !important;
      padding-right:10px !important;
      }
      td[class=em_height]{
      height: 20px !important;
      }
      td[class=em_space]{
      width:10px !important;  
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
      td[class=em_pad_bottom]{
      padding-bottom:20px !important;
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
      td[class=em_space]{
      width:10px !important;  
      }
      span[class=em_br]{
      display:block !important;
      }
      td[class=em_align_cent1] {
      text-align: center !important;
      padding-bottom: 10px !important;
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
              <td style="line-height:0px; font-size:0px;" width="600" class="em_hide" bgcolor="#30373b"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" height="1"  width="600" style="max-height:1px; min-height:1px; display:block; width:600px; min-width:600px;" border="0" alt="" /></td>
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
      <!-- === BODY === --> 
      <tr>
        <td align="center" valign="top"  bgcolor="#ffffff">
          <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table" style="table-layout:fixed;">
            <!-- === LOGO SECTION === -->
            <tr>
              <td height="40" class="em_height">&nbsp;</td>
            </tr>
            <tr>
              <td align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://pbs.twimg.com/profile_images/378800000433502142/638c93134ebf1e2fe50cc0d9ce6a825e.jpeg" width="230" height="80" style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;" border="0" alt="Jujitsu UPN Veteran Jakarta" /></a></td>
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
                <a href="#" target="_blank" style="text-decoration:none; color:#30373b;">Ajakan Latihan</a> 
              </td>
            </tr>
            <tr>
              <td height="14" style="font-size:1px; line-height:1px;">&nbsp;</td>
            </tr>
            <tr>
              <td height="1" bgcolor="#fed69c" style="font-size:0px; line-height:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" style="display:block;" border="0" alt="" /></td>
            </tr>
            <!-- === //NEVIGATION SECTION === -->
            <tr>
              <td valign="top" class="em_aside">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <!-- === TITLE AND TEXT SECTION === -->
                  <tr>
                    <td align="center" valign="top">
                      <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="10" class="em_space">&nbsp;</td>
                          <td align="center" valign="top">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="35" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top" style="font-family:Open Sans, Arial, sans-serif; font-size:20pxl; line-height:22px; color:#30373b; text-transform:uppercase;">you&rsquo;ve received</td>
                              </tr>
                              <tr>
                                <td height="12" style="line-height:1px; font-size:1px;">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/img2.jpg" width="387" height="43" class="em_full_img" alt="AN INVITATION!" style="display:block; font-family:Arial, sans-serif;  font-size:40px; line-height:43px; color:#feae39; letter-spacing:6px; max-width:387px; text-transform:uppercase;" border="0" /></td>
                              </tr>
                              <tr>
                                <td height="40" class="em_height">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                          <td width="10" class="em_space">&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#d8d9da" style="line-height:0px; font-size:0px;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/spacer.gif" width="1" height="1" style="display:block;" border="0" alt="" /></td>
                  </tr>
                  <tr>
                    <td height="30" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:16px; line-height:19px; color:#30373b;  font-weight:bold;">Hari Ini : '.$date.'</td>
                  </tr>
                  <tr>
                    <td height="30" class="em_height">&nbsp;</td>
                  </tr>
                  <!-- === //TITLE AND TEXT SECTION === -->
                  <!-- === SIGNUP SECTION === -->
                  <tr>
                    <td align="center" valign="top" bgcolor="#feae39">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="10">&nbsp;</td>
                          <td align="center" valign="top">
                            <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td height="38" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center" valign="top"><img src='.$foto.' width="120" height="120" alt="" style="display:block;" border="0" /></td>
                              </tr>
                              <tr>
                                <td height="21" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center"  style="font-family:Open Sans, Arial, sans-serif; font-size:16px; line-height:19px; color:#ffffff;  font-weight:bold;">'.$nama.'</td>
                              </tr>
                              <tr>
                                <td height="18" style="line-height:1px; font-size:1px;" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                                <td  align="center"  style="font-family:Open Sans, Arial, sans-serif; font-size:16px; line-height:24px; color:#ffffff; font-style:italic;">&ldquo;Halo '.$nama.'<br><br>Hari Ini Akan Didakan Latihan <br><br>Jangan Lupa Latihan Yah!&rdquo;
                                </td>
                              </tr>
                              <tr>
                                <td height="23" class="em_height">&nbsp;</td>
                              </tr>
                              <tr>
                              
                              </tr>
                              <tr>
                                <td height="38" class="em_height">&nbsp;</td>
                              </tr>
                            </table>
                          </td>
                          <td width="10">&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <!-- === //SIGNUP SECTION === -->
                  <!-- === UPCOMING PRODUVTS SECTION === -->
                  <tr>
                    <td height="33" class="em_height">&nbsp;</td>
                  </tr>
                 
                  <tr>
                    <td height="25" class="em_height">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" valign="top">
                      <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                        
                  <tr>
                    <td>&nbsp;
                    </td>
                  </tr>
                  <tr>
                    <td align="center" style="font-family:Open Sans, Arial, sans-serif; font-size:15px; line-height:22px; color:#999999;">==== Jangan balas Email ini, ini adalah Email Otomatis. ====
                    </td>
                  </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td height="42" class="em_height">&nbsp;</td>
                  </tr>
                  <!-- === //UPCOMING PRODUVTS SECTION === -->
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <!-- === //BODY === --> 
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
$this->email->subject('Pengingat Jadwal Latihan');
$this->email->message($htmlContent);
$this->email->send();
  }
}
}
  
}
  

    



?>