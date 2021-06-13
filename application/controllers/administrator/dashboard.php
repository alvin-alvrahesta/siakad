<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Admin_model');
    }

    public function index()
    {
        $mydata = $this->Admin_model->getuserid($this->session->userdata('userid'));
        $data['myuser'] = $mydata;
        $data['title'] = 'Dashboard Admin';

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('wrapper/footer');
    }

    public function userview()
    {
        $mydata = $this->Admin_model->getuserid($this->session->userdata('userid'));
        $data['myuser'] = $mydata;
        $data['title'] = 'Data User';
        $user = $this->Admin_model->getAll()->result();
        $data['users'] = $user;

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/userview', $data);
        $this->load->view('wrapper/footer');
    }

    public function insert()
    {
        $jenis = $this->input->post('jenisakun');
        $aktif = $this->input->post('radioaktif');
        if ($jenis == 3) {
            $jenis = 4;
        }
        if ($aktif == 'Selalu') {
            $aktif = 'A';
            if ($jenis != 1) {
                redirect(base_url('administrator/dashboard/userview'));
            }
        }
        if ($aktif == 'Ya') {
            $aktif = 'Y';
        }
        if ($aktif == 'Tidak') {
            $aktif = 'N';
        }
        $data = array(
            'userid' => $this->input->post('userid'),
            'userpass' => md5($this->input->post('userpass')),
            'username' => $this->input->post('username'),
            'useren' => $aktif,
            'userrole' => $jenis
        );
        $data = $this->Admin_model->Insert('users', $data);
        redirect(base_url('administrator/dashboard/userview'), 'refresh');
    }

    public function update()
    {
        $jenis = $this->input->post('jenisakun');
        $aktif = $this->input->post('radioaktif');
        $password = $this->input->post('userpass');
        if ($jenis == 3) {
            $jenis = 4;
        }
        if ($aktif == 'Selalu') {
            $aktif = 'A';
            if ($jenis != 1) {
                redirect(base_url('administrator/dashboard/userview'));
            }
        }
        if ($aktif == 'Ya') {
            $aktif = 'Y';
        }
        if ($aktif == 'Tidak') {
            $aktif = 'N';
        }
        $data = array(
            'userid' => $this->input->post('userid'),
            'username' => $this->input->post('username'),
            'useren' => $aktif,
            'userrole' => $jenis
        );
        if ($password) {
            $data = array(
                'userid' => $this->input->post('userid'),
                'username' => $this->input->post('username'),
                'userpass' => md5($password),
                'useren' => $aktif,
                'userrole' => $jenis
            );
        }
        $data = $this->Admin_model->Update('users', $data, array('id' => $this->input->post('id')));
        redirect(base_url('administrator/dashboard/userview'), 'refresh');
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        else {


            // $image_path = './upload/user/'; // your image path
            // $_get_image = $this->db->get_where('user', array('id' => $id));

            // foreach ($_get_image->result() as $record) {
            //     $filename = $image_path . $record->image;
            //     if (file_exists($filename)) {
            //         delete_files($filename);
            //         unlink($filename);
            //     }
            // }

            $this->db->delete('users', array("id" => $id));
            redirect(base_url('administrator/dashboard/userview'));
        }
    }
}
