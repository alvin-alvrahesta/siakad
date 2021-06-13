<?php
    class Auth_model extends CI_Model {

        /*public function login($username, $password){
            $this->db->where("userid", $username);
            $this->db->where("password", $password);
            return $this->db->get('user');
        }
        
        public function getLoginData($username, $password){
            $query = $this->db->get_where('users', array('userid' => $username, 'password' => $password))->row_array();
            return $query
        }*/

        public function getLoginData($username, $ipass){
            $password = md5($ipass);
            return $this->db->get_where('users', ['userid' => $username, 'userpass'=>$password])->row_array();
        }
    }
?>