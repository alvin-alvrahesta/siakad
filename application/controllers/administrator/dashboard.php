<?php

class Dashboard extends CI_Controller
{


    public function index()
    {
        $this->load->view('wrapper/admin_header');
        $this->load->view('wrapper/admin_sidebar');
        $this->load->view('administrator/dashboard');
        $this->load->view('wrapper/admin_footer');
    }
}
