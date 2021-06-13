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
        $data = [
			//'id'=> $mydata['id'],
            'userid'=> $mydata['userid'],
            'username' => $mydata['username'],
            'userrole' => $mydata['userrole'],
            'userlogged' => $mydata['userlogged']
		];

        $this->load->view('wrapper/admin_header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('wrapper/admin_footer');
    }
}
