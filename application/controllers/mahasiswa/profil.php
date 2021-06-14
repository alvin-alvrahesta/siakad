<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

	public function index()
	{
		$userid=$this->session->userdata('userid');

		$data = array(
			'title'		=> 'Profil',
			'profil'	=> $this->mahasiswa_model->tampil_profil($userid),
		);

		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/mahasiswa_sidebar');
		$this->load->view('mahasiswa/profil',$data);
		$this->load->view('wrapper/footer');
	}

}



?>
