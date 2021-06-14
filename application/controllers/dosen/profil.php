<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('dosen_model');
    }

	public function index()
	{
		$userid=$this->session->userdata('userid');
		$data = array(
			'profil'=>$this->dosen_model->tampil_profil($userid),
			'title'=>'Profil'
		);

		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/dosen_sidebar');
		$this->load->view('dosen/profil',$data,FALSE);
		$this->load->view('wrapper/footer');
	}

	public function editprofil()
	{
		$userid = $this->session->userdata('userid');
		$data = array(
			'profil'	=>$this->dosen_model->edit_profil($userid),
			'title'=>'Edit Profil'
		);
		
		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/dosen_sidebar');
		$this->load->view('dosen/editprofil',$data,FALSE);
		$this->load->view('wrapper/footer');
	}

	public function updateprofil($id)
	{
		$data = array(
			'id'		=>$id,
			'username'	=>$this->input->post('username'),
			// 'userid'	=>$this->input->post('userid'),
		);
		
		$this->dosen_model->update_profil($data);
		$this->session->set_flashdata('pesan', 'Profil Berhasil Diupdate');
		redirect('dosen/profil');
	}

}



?>
