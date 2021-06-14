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

    public function getdatatableby($table, $by, $id)
    {
        return $this->db->get_where($table, [$by => $id])->row_array();
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
