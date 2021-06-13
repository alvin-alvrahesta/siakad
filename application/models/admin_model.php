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

}
