<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Home_M extends CI_Model{

  
  public function __construct(){
    parent::__construct();
  }


  public function input($table,$data){
    $this->db->insert($table, $data);
    return true;
  }

    public function getData($table){
        $query = $this->db->get($table);
        return $query;
    }
    
    public function getChained(){
        $this->db->select('*');
        $this->db->from('fakultas');
        $this->db->join('jurusan', 'jurusan.id_fakultas = fakultas.id_fakultas', 'inner');
        $query = $this->db->get();
        return $query;
    }

    public function cekData($table,$where){   
     return $this->db->get_where($table,$where, 1);

  }

  public function getNim($email){
      $this->db->select('nim');
        $this->db->from('anggota');
        $this->db->where('email',$email);
       
        $query = $this->db->get();
        foreach($query->result() as $data){
          $nim = $data->nim;
        }
        return $nim;
  }

  public function getCode($email){
      $this->db->select('referral_code');
        $this->db->from('anggota');
        $this->db->where('email',$email);
       
        $query = $this->db->get();
        foreach($query->result() as $data){
          $code = $data->referral_code;
        }
        return $code;
  }

  public function update($nim,$table,$data){   
    $this->db->where('nim', $nim);
    $query = $this->db->update($table, $data);
    return $query;
  }
  
  public function getDataProfile($where){
       $this->db->select('l.email,l.level,l.login_time,l.logout_time,a.nim,a.nama_anggota,a.jenis_kelamin,a.tempat_lahir,a.tanggal_lahir,a.no_hp,a.angkatan_kuliah,a.angkatan_jujitsu,a.foto,a.line,a.whatsapp,a.alamat,a.referral_code,j.nama_jurusan,f.nama_fakultas');
        $this->db->from('login l');
        $this->db->join('anggota a', 'a.email=l.email', 'inner');
        $this->db->join('jurusan j', 'a.id_jurusan=j.id_jurusan', 'inner');
        $this->db->join('fakultas f', 'f.id_fakultas=j.id_fakultas', 'inner');
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query;
  }

  public function jumlah_anggota(){
    //return $this->db->count_all('anggota');

    $this->db->select("nim");
    $this->db->group_by("nim");
    $query=$this->db->get("anggota");
    return $query->num_rows();
  }
    
  
}