<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin_M extends CI_Model{

	
	public function __construct(){
		parent::__construct();
	}

	
	public function getDataRefCode($where){
       $this->db->select('l.email,l.level,l.login_time,l.logout_time,a.nim,a.nama_anggota,a.jenis_kelamin,a.tempat_lahir,a.tanggal_lahir,a.no_hp,a.angkatan_kuliah,a.angkatan_jujitsu,a.foto,a.line,a.whatsapp,a.alamat,a.referral_code,j.nama_jurusan,f.nama_fakultas,a.status_pendaftaran');
        $this->db->from('login l');
        $this->db->join('anggota a', 'a.email=l.email', 'inner');
        $this->db->join('jurusan j', 'a.id_jurusan=j.id_jurusan', 'inner');
        $this->db->join('fakultas f', 'f.id_fakultas=j.id_fakultas', 'inner');
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach ($query->result() as $data) {
            $data = array(  'email' => $data->email,
                            'nim' => $data->nim,
                            'nama' => $data->nama_anggota,
                            'jenis_kelamin' => $data->jenis_kelamin,
                            'no_hp' => $data->no_hp,
                            'whatsapp' => $data->whatsapp,
                            'line' => $data->line,
                            'ref_code' => $data->referral_code,
                            'tempat_lahir' => $data->tempat_lahir,
                            'tanggal_lahir' => $data->tanggal_lahir,
                            'fakultas' => $data->nama_fakultas,
                            'jurusan' => $data->nama_jurusan,
                            'angkatan_kuliah' => $data->angkatan_kuliah,
                            'angkatan_jujitsu' => $data->angkatan_jujitsu,
                            'alamat' => $data->alamat,
                            'foto' => $data->foto,
                            'status_pendaftaran' => $data->status_pendaftaran,
                            'status' => 'success',
                            'button' => 'save');
        }
    } else {
        $data = array(  
                            'status' => 'failed'
                            );
    }

        
        echo json_encode($data);
  }


	public function update($email,$table,$data){   
		$this->db->where('email', $email);
		$query = $this->db->update($table, $data);
		return $query;
  }

  public function change_approval($email){   
    $data = array(
        'status_pendaftaran' => '1'
);
        $this->db->where('email', $email);
        $query = $this->db->update('anggota', $data);

        if($query){
            echo "OK";
        } else {
            echo "NO";
        }
  }
}