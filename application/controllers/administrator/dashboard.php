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
        if($jenis==3){
            $jenis=4;
        }
        if($aktif=='Selalu'){
            $aktif='A';
            if($jenis != 1){
                redirect(base_url('administrator/dashboard/userview'));
            }
        }
        if($aktif=='Ya'){
            $aktif='Y';
        }
        if($aktif=='Tidak'){
            $aktif='N';
        }
        $data = array(
            'userid' => $this->input->post('userid'),
            'userpass' => md5($this->input->post('userpass')),
            'username' => $this->input->post('username'),
            'useren' => $aktif,
            'userrole' => $jenis
        );
        $data = $this->Admin_model->Insert('users', $data);
        redirect(base_url('administrator/dashboard/userview'),'refresh');
    }

    public function update(){
        $jenis = $this->input->post('jenisakun');
        $aktif = $this->input->post('radioaktif');
        $password = $this->input->post('userpass');
        if($jenis==3){
            $jenis=4;
        }
        if($aktif=='Selalu'){
            $aktif='A';
            if($jenis != 1){
                redirect(base_url('administrator/dashboard/userview'));
            }
        }
        if($aktif=='Ya'){
            $aktif='Y';
        }
        if($aktif=='Tidak'){
            $aktif='N';
        }
        $data = array(
            'userid' => $this->input->post('userid'),
            'username' => $this->input->post('username'),
            'useren' => $aktif,
            'userrole' => $jenis
        );
        if ($password){
            $data = array(
                'userid' => $this->input->post('userid'),
                'username' => $this->input->post('username'),
                'userpass' => md5($password),
                'useren' => $aktif,
                'userrole' => $jenis
            );
        }
        $data = $this->Admin_model->Insert('users', $data);
        redirect(base_url('administrator/dashboard/userview'),'refresh');
    }
}
