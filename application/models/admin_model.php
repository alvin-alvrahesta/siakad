<?php
class Admin_model extends CI_Model
{

    public function getuserid($userid)
    {
        return $this->db->get_where('users', ['userid' => $userid])->row_array();
    }

    public function getdatatableby($table, $by, $userid)
    {
        return $this->db->get_where($table, [$by => $userid])->row_array();
    }

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function Insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function Update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function Delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

}
