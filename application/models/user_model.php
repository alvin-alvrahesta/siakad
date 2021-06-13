<?php
class User_Model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('users');
    }
}
