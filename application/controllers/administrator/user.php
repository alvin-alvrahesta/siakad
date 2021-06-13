<?php

class User extends CI_Controller
{

    public function index()
    {
        $this->load->model('user_model');
        $alluser = $this->user_model->getAll()->result();
        $data['alluser'] = $alluser;
        $this->load->view('wrapper/admin_header');
        $this->load->view('wrapper/admin_sidebar');
        $this->load->view('administrator/userview', $data);
        $this->load->view('wrapper/admin_footer');
    }
}
