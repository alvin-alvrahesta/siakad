<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
	{
		/*$this->load->view('wrapper/auth_header');
        $this->load->view('auth/login');
		//$this->load->view('welcome_message');
		*/
		if ($this->form_validation->run() == false) {
			$this->form_validation->set_rules('username', 'username', 'trim|required');
        	$this->form_validation->set_rules('password', 'password', 'trim|required');
			$this->load->view('wrapper/auth_header');
			$this->load->view('auth/login');
		}else{
            $this->login();
        }
	}

	private function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['userid' => $username])->row_array();

		if (!$user){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
            redirect('auth');
		}

		if ($user['useren'] == 'N'){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This user has not been activated!</div>');
			redirect('auth');
		}

		if (password_verify($password, $user['password']) == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
			redirect('auth');
		}

		$data = [
			'userid' => $user['userid'],
			'userrole' => $user['role_id']
		];
		$this->session->set_userdata($data);
		if ($user['userrole'] == 1) {
			redirect('administrator/dashboard');
		} else if ($user['userrole'] == 2) {
			redirect('dosen/dosen');
		} else if ($user['userrole'] == 4) {
			redirect('mahasiswa/mahasiswa');
		}

    }

	public function logout()
    {
        $this->session->unset_userdata();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        $this->session->sess_destroy();
        redirect('auth');
    }
    
}