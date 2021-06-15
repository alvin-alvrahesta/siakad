<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

	public function index()
	{
		$userid=$this->session->userdata('userid');
		$data = array(
			'mhs'=>$this->mahasiswa_model->tampil_data($userid),
			'makul'=>$this->mahasiswa_model->makul(),
			'title'=>'Mahasiswa',
			'userid'=>$userid
		);

		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/mahasiswa_sidebar');
		$this->load->view('mahasiswa/mahasiswa',$data,FALSE);
		$this->load->view('wrapper/footer');
	}

	public function insert_makul()
	{
		$this->form_validation->set_rules('id_makul', 'Mata Kuliah', 'is_unique[mahasiswa.id_makul]');
		if ($this->form_validation->run()==TRUE) {
			if(isset($_SESSION['pesanmhs2'])){
				unset($_SESSION['pesanmhs2']);
			}

			$data = array(
				'nim'			=>$this->input->post('nim'),
				'id_makul'	=>$this->input->post('id_makul')
			);
			
			$this->mahasiswa_model->insert_makul($data);
			$this->session->set_flashdata('pesanmhs', 'Mata Kuliah Berhasil Ditambahkan');
			redirect('mahasiswa/mahasiswa');
		}
		else {
			if(isset($_SESSION['pesanmhs'])){
				unset($_SESSION['pesanmhs']);
			}
			$this->session->set_flashdata('pesanmhs2', 'Mata Kuliah Sudah Diambil');
			redirect('mahasiswa/mahasiswa');
		}
		
	}

	public function delete_makul($id_mhs)
	{		
		if(isset($_SESSION['pesanmhs'])){
			unset($_SESSION['pesanmhs']);
		}
		if(isset($_SESSION['pesanmhs2'])){
			unset($_SESSION['pesanmhs2']);
		}

		$data=array('id_mhs'=>$id_mhs);
		$this->mahasiswa_model->delete_makul($data);
		$this->session->set_flashdata('pesanmhs', 'Mata Kuliah Berhasil Dihapus');
		redirect('mahasiswa/mahasiswa');
	}

	// public function _rules()
	// {
	// 	$this->form_Validation->set_rules('nim','Nim','required',['required' => 'NIM wajib diisi']);
	// 	$this->form_Validation->set_rules('nama_lengkap','Nama Lengkap','required',['required' => 'Nama Lengkap wajib diisi']);
	// 	$this->form_Validation->set_rules('alamat','Alamat','required',['required' => 'Alamat wajib diisi']);
	// 	$this->form_Validation->set_rules('email','Email','required',['required' => 'Email wajib diisi']);
	// 	$this->form_Validation->set_rules('telepon','Telepon','required',['required' => 'Nomor Telepon wajib diisi']);
	// 	$this->form_Validation->set_rules('tempat_lahir','Tempat Lahir','required',['required' => 'Tempat Lahir wajib diisi']);
	// 	$this->form_Validation->set_rules('tanggal_lahir','Tanggal Lahir','required',['required' => 'Tanggal Lahir wajib diisi']);
	// 	$this->form_Validation->set_rules('jenis_kelamin','Jenis Kelamin','required',['required' => 'Jenis Kelamin wajib diisi']);
	// 	$this->form_Validation->set_rules('nama-prodi','Nama Prodi','required',['required' => 'Nama Prodi wajib diisi']);
	// }
}
