<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

	public function index()
	{
		$userid=$this->session->userdata('userid');
		$data = array(
			'profil'=>$this->mahasiswa_model->edit_profil($userid),
			'title'=>'Profil'
		);

		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/mahasiswa_sidebar');
		$this->load->view('mahasiswa/changepassword',$data,FALSE);
		$this->load->view('wrapper/footer');
	}

	public function updatepassword()
	{
		$id = $this->input->post('id');
        $old = $this->input->post('cur_pass');
        $new = $this->input->post('new_pass1');
        $rep = $this->input->post('new_pass2');

        $u = $this->mahasiswa_model->getdatatableby('users', 'id', $id);

        if (md5($old) != $u['userpass']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
            redirect(base_url('mahasiswa/changepassword'));
        }

        if ($new != $rep) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password did not match!</div>');
            redirect(base_url('mahasiswa/changepassword'));
        }

        $data = array(
            'userpass' => md5($this->input->post('new_pass1'))
        );

        $this->mahasiswa_model->update('users', $data, array('id' => $this->input->post('id')));
        redirect(base_url('mahasiswa/profil'), 'refresh');
	}

}


?>
