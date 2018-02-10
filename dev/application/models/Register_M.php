<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Register_M extends CI_Model{

	
	public function __construct(){
		parent::__construct();
	}


	public function signup($table,$data){
		$this->db->insert($table, $data);
		return true;
	}

	
}