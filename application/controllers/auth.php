<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Auth_model');
    }

    public function index()
	{
		/*$this->load->view('wrapper/auth_header');
        $this->load->view('auth/login');
		//$this->load->view('welcome_message');
		*/
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Halaman Login';
			$this->load->view('wrapper/header', $data);
			$this->load->view('auth/login');
		}else{
            $this->doLogin();
        }
	}

	private function doLogin(){
		$iuser = $this->input->post('username');
		$ipass = $this->input->post('password');
		$user = $this->Auth_model->getLoginData($iuser, $ipass);
		if(!$user){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password or Username!</div>');
            redirect('auth');
		}
		if($user['useren'] == "N"){
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This user has not been activated!</div>');
			redirect('auth');
		}
		$data = [
			'userid' => $user['userid'],
			'userrole' => $user['userrole'],
			'username' => $user['username']
		];
		$this->session->set_userdata($data);
		if ($user['userrole'] == 1) {
			redirect('administrator/dashboard');
		} 
		if ($user['userrole'] == 2) {
			redirect('dosen/dashboard');
		} 
		if ($user['userrole'] == 4) {
			redirect('mahasiswa/mahasiswa');
		}
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error loading user data!</div>');
		redirect('auth');
	}

	public function logout()
    {
		$this->session->unset_userdata('userid');
        $this->session->unset_userdata('userrole');
		$this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        $this->session->sess_destroy();
        redirect('auth');
    }
    
}