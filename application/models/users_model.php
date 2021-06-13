<?php
class Users_Model extends CI_Model
{
    private $_table = "users";

    public $userid;
    public $userpass;
    public $username;
    public $useren;
    public $userrole;
    public $userlogged;

    // public function rules()
    // {
    //     return [
    //         ['field' => 'name',
    //         'label' => 'Name',
    //         'rules' => 'required'],

    //         ['field' => 'price',
    //         'label' => 'Price',
    //         'rules' => 'numeric'],
            
    //         ['field' => 'description',
    //         'label' => 'Description',
    //         'rules' => 'required']
    //     ];
    // }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->userid = $post["userid"];
        $this->userpass = $post["userpass"];
        $this->username = $post["username"];
        $this->useren = $post["useren"];
        $this->userrole = $post["userrole"];
        $this->userlogged = $post["userlogged"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->userid = $post["userid"];
        $this->userpass = $post["userpass"];
        $this->username = $post["username"];
        $this->useren = $post["useren"];
        $this->userrole = $post["userrole"];
        $this->userlogged = $post["userlogged"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
