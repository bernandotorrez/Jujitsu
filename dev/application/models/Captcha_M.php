<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Captcha_M extends CI_Model{

public function captcha(){
        
        $vals = array(
       // 'word'          => 'Random word',
        'img_path'      => 'captcha/',
        'img_url'       => base_url('captcha'),
        'font_path'     => base_url('captcha/captcha/roboto/Roboto-Light.ttf'),
        'img_width'     => '200',
        'img_height'    => 40,
        'expiration'    => 600,
        'word_length'   => 5,
        'font_size'     => 16,
        'img_id'        => 'Imageid',
        //'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'pool'          => '0123456789',
        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(100, 221, 23),
                'text' => array(0, 0, 0),
                'grid' => array(100, 221, 23)
        )
);

$this->db->where('ip_address = ', $this->input->ip_address())
        ->delete('captcha');

$cap = create_captcha($vals);
$data = array(
        'captcha_time'  => $cap['time'],
        'ip_address'    => $this->input->ip_address(),
        'word'          => $cap['word']
);

$query = $this->db->insert_string('captcha', $data);
$this->db->query($query);

//echo 'Submit the word you see below:';
return $cap['image'];
//echo '<input type="text" name="captcha" value="" />';
    }
}