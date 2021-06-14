<?php

class Dosen_model extends CI_Model{

	public function tampil_data($username)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('dosen', 'dosen.nrp = users.userid', 'left');
		$this->db->join('matakuliah', 'matakuliah.id_makul = dosen.id_makul', 'left');
		$this->db->where('username', $username);
		return $this->db->get()->result();
	}

    public function getAll($table)
    {
        return $this->db->get($table);
    }

	public function ambil_id_dosen($id)
	{

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
