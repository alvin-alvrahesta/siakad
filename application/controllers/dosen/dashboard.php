<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Dosen_model');
    }

    public function index()
    {
        $mydata = $this->Dosen_model->getuserid($this->session->userdata('userid'));
        $data['myuser'] = $mydata;

        $data['title'] = 'Dashboard Dosen';

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/dosen_sidebar', $data);
        $this->load->view('dosen/dashboard', $data);
        $this->load->view('wrapper/footer');
    }

    public function dosenview()
	{
		$userid=$this->session->userdata('userid');

		$data = array(
			'dosen'=>$this->Dosen_model->tampil_data($userid),
			'makuls'=>$this->Dosen_model->getAll('matakuliah')->result(),
			'title'=>'Mata Kuliah'
			);
		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/dosen_sidebar');
		$this->load->view('dosen/dosenview',$data,FALSE);
		$this->load->view('wrapper/footer');
	}
    
    public function inputnilaiview()
	{
		$username=$this->session->userdata('username');

		$data = array(
			'dosen'=>$this->Dosen_model->tampil_data($username),
			'makuls'=>$this->Dosen_model->getAll('matakuliah')->result(),
			'title'=>'Input Nilai'
			);
		$this->load->view('wrapper/header',$data);
		$this->load->view('wrapper/dosen_sidebar');
		$this->load->view('dosen/inputnilaiview',$data,FALSE);
		$this->load->view('wrapper/footer');
	}

    public function inputnilaimakul1()
	{
		$username=$this->session->userdata('username');

		$data = array(
			'dosen'=>$this->Dosen_model->tampil_data($username),
			'makuls'=>$this->Admin_model->getAll('matakuliah')->result(),
			);
		$this->load->view('wrapper/header');
		$this->load->view('wrapper/dosen_sidebar');
		$this->load->view('dosen/inputnilaimakul',$data,FALSE);
		$this->load->view('wrapper/footer');
	}    

    public function insert_makul()
    {
		$this->form_validation->set_rules('id_makul', 'Mata Kuliah', 'is_unique[dosen.id_makul]');
		if ($this->form_validation->run()==TRUE) {
			if(isset($_SESSION['pesandosen2'])){
				unset($_SESSION['pesandosen2']);
			}

			$data = array(
				'nrp'		=>$this->input->post('nrp'),
				'id_makul'	=>$this->input->post('id_makul')
			);
			
			$this->Dosen_model->insert_makul($data);
			$this->session->set_flashdata('pesandosen', 'Mata Kuliah Berhasil Ditambahkan');
			redirect('dosen/dashboard/dosenview');
		}
		else {
			if(isset($_SESSION['pesandosen'])){
				unset($_SESSION['pesandosen']);
			}
			$this->session->set_flashdata('pesandosen2', 'Mata Kuliah Sudah Diambil');
			redirect('dosen/dashboard/dosenview');
		}
		
	}
    //     $nrp = $this->input->post('nrp');
    //     $id_makul = $this->input->post('id_makul');

    //     $data = array(
    //         'nrp' => $nrp,
    //         'id_makul' => $id_makul,
    //     );
    //     $data = $this->Admin_model->Insert('dosen', $data);
    //     redirect(base_url('dosen/dashboard/dosenview'), 'refresh');
    // }

    public function update_makul()
    {

        $id_makul = $this->input->post('id_makul');

        $data = array(
            'id_makul' => $id_makul
        );
        $this->Dosen_model->update_data('dosen', $data, array('id' => $this->input->post('id')));
        redirect(base_url('dosen/dashboard/dosenview'), 'refresh');
    }

    public function delete_makul($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

		if(isset($_SESSION['pesandosen2'])){
			unset($_SESSION['pesandosen2']);
		}
		
        $u = $this->Dosen_model->getdatatableby('dosen', 'id', $id);

        $mid = $u['id'];
        $this->Dosen_model->delete_data('dosen', array("id" => $mid));
		$this->session->set_flashdata('pesandosen', 'Mata Kuliah Berhasil Dihapus');
        redirect(base_url('dosen/dashboard/dosenview'));
    }


}
