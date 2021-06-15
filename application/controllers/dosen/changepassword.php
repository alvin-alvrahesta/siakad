<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('dosen_model');
    }

	public function index()
	{
		$userid=$this->session->userdata('userid');
		$data = array(
			'profil'=>$this->dosen_model->edit_profil($userid),
			'title'=>'Ubah Password'
		);

		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/dosen_sidebar');
		$this->load->view('dosen/changepassword',$data,FALSE);
		$this->load->view('wrapper/footer');
	}

	public function updatepassword()
	{
		$id = $this->input->post('id');
        $old = $this->input->post('cur_pass');
        $new = $this->input->post('new_pass1');
        $rep = $this->input->post('new_pass2');

        $u = $this->dosen_model->getdatatableby('users', 'id', $id);

        if (md5($old) != $u['userpass']) {
            $this->session->set_flashdata('messagepass', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
            redirect(base_url('dosen/changepassword'));
        }

        if ($new != $rep) {
            $this->session->set_flashdata('messagepass', '<div class="alert alert-danger" role="alert">Password did not match!</div>');
            redirect(base_url('dosen/changepassword'));
        }
		
		if(isset($_SESSION['messagepass'])){
			unset($_SESSION['messagepass']);
		}

        $data = array(
            'userpass' => md5($this->input->post('new_pass1'))
        );

        $this->dosen_model->update('users', $data, array('id' => $this->input->post('id')));
		$this->session->set_flashdata('messageprofil', '<div class="row">
		<div class="col-12"><div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password berhasil diupdate!</div></div></div>');
        redirect(base_url('dosen/profil'), 'refresh');
	}

}


?>
