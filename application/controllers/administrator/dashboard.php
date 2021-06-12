<?php

class Dashboard extends CI_Controller
{


    public function index()
    {
        $this->load->view('template_administrator/header');
        $this->load->view('template_administrator/sidebar');
        $this->load->view('administrator/dashboard');
        $this->load->view('template_administrator/footer');
    }
}
