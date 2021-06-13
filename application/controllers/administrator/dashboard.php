<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $mydata = $this->Admin_model->getuserid($this->session->userdata('userid'));
        $data['myuser'] = $mydata;
        $data['title'] = 'Dashboard Admin';

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('wrapper/footer');
    }

    public function userview(){
        $mydata = $this->Admin_model->getuserid($this->session->userdata('userid'));
        $data['myuser'] = $mydata;
        $user = $this->Admin_model->getAll()->result();
        $data['users'] = $user;

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/userview', $data);
        $this->load->view('wrapper/footer');
    }
}
