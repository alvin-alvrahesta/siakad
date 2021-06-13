<?php

class Mahasiswa_model extends CI_Model{

	public function tampil_data($username)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('mahasiswa', 'mahasiswa.nim = users.userid', 'left');
		$this->db->join('matakuliah', 'matakuliah.id_makul = mahasiswa.matakuliah', 'left');
		$this->db->where('username', $username);
		return $this->db->get()->result();
	}

	public function ambil_id_mahasiswa($id)
	{
		// $hasil = $this->db->where('id',$id)->('mahasiswa');
		// if($hasil->num_rows() > 0){
		// 	return $hasil->result();
		// }else{
		// 	return false;
		// }
	}

	public function insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->update($table);
	}
	
}
