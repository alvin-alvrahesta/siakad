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

	public function tampil_profil($userid)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userid', $userid);
		return $this->db->get()->first_row();
	}

	public function edit_profil($userid)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userid', $userid);
		return $this->db->get()->first_row();
	}

	public function update_profil($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('users', $data);
	}

    public function getdatatableby($table, $by, $id)
    {
        return $this->db->get_where($table, [$by => $id])->row_array();
    }
	
    public function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
		$this->db->update($table, $data, $where);
    }

    public function delete_data($table, $where)
    {
        $this->db->delete($table, $where);
    }
	
}
