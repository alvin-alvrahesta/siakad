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
			'profil'=>$this->mahasiswa_model->tampil_profil($userid),
			'title'=>'Profil'
		);

		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/mahasiswa_sidebar');
		$this->load->view('mahasiswa/profil',$data,FALSE);
		$this->load->view('wrapper/footer');
	}

	public function editprofil()
	{
		$userid = $this->session->userdata('userid');
		$data = array(
			'profil'	=>$this->mahasiswa_model->edit_profil($userid),
			'title'=>'Edit Profil'
		);
		
		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/mahasiswa_sidebar');
		$this->load->view('mahasiswa/editprofil',$data,FALSE);
		$this->load->view('wrapper/footer');
	}

	public function updateprofil($id)
	{
		$data = array(
			'id'		=>$id,
			'username'	=>$this->input->post('username'),
		);
		
		$this->mahasiswa_model->update_profil($data);
		$this->session->set_flashdata('messageprofil', '<div class="row">
		<div class="col-12"><div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Profil berhasil diupdate!</div></div></div>');
		redirect('mahasiswa/profil');
	}

}



?>
