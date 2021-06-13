<?php
class Admin_model extends CI_Model
{

    public function getuserid($userid){
        return $this->db->get_where('users', ['userid' => $userid])->row_array();
    }

    public function getAll()
    {
        return $this->db->get('users');
    }

    public function Insert($table,$data){
        return $this->db->insert($table, $data);
    }
 
    public function Update($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }
 
    public function Delete($table, $where){
        return $this->db->delete($table, $where); 
    }
}
