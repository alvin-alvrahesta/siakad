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
    
	public function infomatakuliah($id_makul = null)
    {
        $data['title'] = 'Mahasiswa Pengambil Matkul';
        $u = $this->Dosen_model->getresultdatatableby('mahasiswa', 'id_makul', $id_makul);
        $data['mhs'] = $u;
        $u2 = $this->Dosen_model->getresultdatatableby('dosen', 'id_makul', $id_makul);
        $data['dsn'] = $u2;
        $where_table = 'users';
        $where_role = 'userrole';
        $u3 = $this->Admin_model->getresultdatatableby($where_table, $where_role, '4');
        $data['umhs'] = $u3;
        $u4 = $this->Admin_model->getresultdatatableby($where_table, $where_role, '2');
        $data['udsn'] = $u4;
        $makul = $this->Admin_model->getdatatableby('matakuliah', 'id_makul', $id_makul);
        $data['nama_makul'] = $makul['nama_makul'];
        $data['makuls'] = $id_makul;

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/dosen_sidebar', $data);
        $this->load->view('dosen/infomatakuliah', $data);
        $this->load->view('wrapper/footer');
    }

    public function update_mamakul()
    {
        $userid = $this->input->post('userid');
        $id_makul =  $this->input->post('id_makul');
        if (!isset($id_makul) || !isset($userid)) {
            show_404();
        }
        $nilai = $this->input->post('nilai');
        $data = array(
            'nilai' => $nilai
        );
        $id = $this->Admin_model->getuserid($userid);
        $this->Admin_model->update('mahasiswa', $data, "nim = '$userid' AND id_makul = '$id_makul'");
        redirect(base_url('dosen/dashboard/infomatakuliah/' . $id_makul . '/'), 'refresh');
    }

    public function delete_makuliah()
    {
        $userid =  $this->uri->segment(4);
        $id_makul =  $this->uri->segment(5);
        if (!isset($id_makul) || !isset($userid)) {
            show_404();
        }
        $this->Admin_model->Delete('mahasiswa', "nim = '$userid' AND id_makul = '$id_makul'");

        //$id = $this->Admin_model->getdatatableby('matakuliah', 'id_makul', $id_makul);

        redirect(base_url('dosen/dashboard/infomatakuliah/' . $id_makul . '/'), 'refresh');
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
