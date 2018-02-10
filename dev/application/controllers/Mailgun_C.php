<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Mailgun_C extends CI_Controller {
 
  function index(){
    $this->load->library('mailgun');
    $this->mailgun
        ->to('bernandotorrez4@gmail.com')
        ->from('mail.bernand@gmail.com')
        ->subject('SUBJECT')
        ->message('MESSAGE')
        ->attachments(array('FILENAME'))
        ->send();
  }
}