<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["users"] = $this->users_model->getAll();
        $this->load->view("administrator/userview", $data);
    }

    public function add()
    {
        $users = $this->users_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("administrator/userview");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('administrasi/userview');
       
        $users = $this->users_model;
        $validation = $this->form_validation;
        $validation->set_rules($users->rules());

        if ($validation->run()) {
            $users->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["users"] = $users->getById($id);
        if (!$data["users"]) show_404();
        
        $this->load->view("administrasi/userview", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->users_model->delete($id)) {
            redirect(site_url('administrasi/userview'));
        }
    }
}