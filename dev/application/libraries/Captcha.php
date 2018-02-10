<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Captcha {
	protected $_ci;

	function __construct(){
		$CI =& get_instance();

	}

public function captcha(){
        
        $vals = array(
       // 'word'          => 'Random word',
        'img_path'      => 'captcha/',
        'img_url'       => base_url('captcha'),
        'font_path'     => base_url('captcha/roboto/Roboto-Bold.ttf'),
        'img_width'     => '200',
        'img_height'    => 30,
        'expiration'    => 600,
        'word_length'   => 5,
        'font_size'     => 8,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 40, 40),
                'text' => array(0, 0, 0),
                'grid' => array(255, 255, 255)
        )
);

$CI->db->where('ip_address = ', $CI->input->ip_address())
        ->delete('captcha');

$cap = create_captcha($vals);
$data = array(
        'captcha_time'  => $cap['time'],
        'ip_address'    => $CI->input->ip_address(),
        'word'          => $cap['word']
);

$query = $CI->db->insert_string('captcha', $data);
$CI->db->query($query);

//echo 'Submit the word you see below:';
return $cap['image'];
//echo '<input type="text" name="captcha" value="" />';
    }

}
?>