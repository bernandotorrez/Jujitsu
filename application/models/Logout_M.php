<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Logout_M extends CI_Model{

	
	public function __construct(){
		parent::__construct();
	}

	
	public function update($email,$table,$data){   
		$this->db->where('email', $email);
		$query = $this->db->update($table, $data);
		return $query;
  }
}