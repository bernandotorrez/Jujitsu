<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin_M extends CI_Model{

	
	public function __construct(){
		parent::__construct();
	}

	public function getDataRefCode($refcode){		
		return $this->db->get_where('anggota', array('referral_code' => $refcode), 1);
	}

	public function update($email,$table,$data){   
		$this->db->where('email', $email);
		$query = $this->db->update($table, $data);
		return $query;
  }
}