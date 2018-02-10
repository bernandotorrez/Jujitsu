<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Sendmails_M extends CI_Model{

	
	public function __construct(){
		parent::__construct();
	}

	public function cronjob(){	
		$this->db->select('status, email');
		$this->db->where('status','Active');
		$query = $this->db->get('login');
		return $query->result();
	}
	
	public function getDataNamaAnggota($email){
	    $this->db->select('nama_anggota');
	    $this->db->where('email',$email);
	    $query = $this->db->get('anggota')->result();
	   
	    foreach($query as $data){
	        return $data->nama_anggota;
	        
	    }
	    
	    
	}

    public function getDataFotoAnggota($email){
	    $this->db->select('foto');
	    $this->db->where('email',$email);
	    $query = $this->db->get('anggota')->result();
	   
	    foreach($query as $data){
	        
	        return $data->foto;
	    }
	    
	    
	}
	
	public function cekModul($id){
	    $this->db->select('value');
	    $this->db->where('id_modul',$id);
	    $query = $this->db->get('modul')->result();
	   
	    foreach($query as $data){
	        
	        return $data->value;
	    }
	    	
	}
	
}