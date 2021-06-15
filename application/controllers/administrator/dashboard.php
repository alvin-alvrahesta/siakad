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
        $username = $this->session->userdata('username');
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
        $user = $this->Admin_model->getAll('users')->result();
        $data['users'] = $user;

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/userview', $data);
        $this->load->view('wrapper/footer');
    }

    public function makulview()
    {
        // $mydata = $this->Admin_model->getuserid($this->session->userdata('userid'));
        // $data['myuser'] = $mydata;
        $data['title'] = 'Data Mata Kuliah';
        $makul = $this->Admin_model->getAll('matakuliah')->result();
        $data['makuls'] = $makul;

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/makulview', $data);
        $this->load->view('wrapper/footer');
    }
    public function infomahasiswa($id = null)
    {
        $data['title'] = 'Mahasiswa Pengambil Matkul';
        $u = $this->Admin_model->getdatatableby('mahasiswa', 'id_makul', $id);
        $mhs = $u['id_mhs'];
        $where_table = 'users';
        $where_uid = 'id';
        $u2 = $this->Admin_model->getresultdatatableby($where_table, $where_uid, $mhs);
        $data['username'] = $u2;
        $mahasiswa = $this->Admin_model->getAll('users')->result();
        $data['mydata'] = $mahasiswa;
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/infomahasiswa', $data);
        $this->load->view('wrapper/footer');
    }

    public function detailmakulview($id = null)
    {
        if (!isset($id)) {
            show_404();
        }
        $data['title'] = 'Pilih Matakuliah';
        $u = $this->Admin_model->getdatatableby('users', 'id', $id);
        $role = $u['userrole'];
        $uid = $u['userid'];
        $where_uid = null;
        $where_table = null;
        if ($role == 2) {
            $where_table = 'dosen';
            $where_uid = 'nrp';
            //$data['userid'] = $u2['0']->nrp;
            /*if (!empty($playerlist)) {
                $data['userid'] = $u2['0']->nrp;
            }
            echo $data['userid'];*/
        }
        if ($role == 4) {
            $where_table = 'mahasiswa';
            $where_uid = 'nim';
        }
        $u2 = $this->Admin_model->getresultdatatableby($where_table, $where_uid, $uid);
        $data['userid'] = $uid;
        $data['userid'];
        $data['user'] = $u2;
        $data['role'] = $role;
        $makul = $this->Admin_model->getAll('matakuliah')->result();
        $data['makuls'] = $makul;
        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/ampu_makul', $data);
        $this->load->view('wrapper/footer');
    }

    public function profile()
    {
        $mydata = $this->Admin_model->getuserid($this->session->userdata('userid'));
        $data['myuser'] = $mydata;
        $data['title'] = 'Profil';

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/profile', $data);
        $this->load->view('wrapper/footer');
    }

    public function editprofile()
    {
        $mydata = $this->Admin_model->getuserid($this->session->userdata('userid'));
        $data['myuser'] = $mydata;
        $data['title'] = 'Edit Profil';

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/editprofile', $data);
        $this->load->view('wrapper/footer');
    }

    public function changepassword()
    {
        $mydata = $this->Admin_model->getuserid($this->session->userdata('userid'));
        $data['myuser'] = $mydata;
        $data['title'] = 'Ganti Password';

        $this->load->view('wrapper/header', $data);
        $this->load->view('wrapper/admin_sidebar', $data);
        $this->load->view('administrator/changepassword', $data);
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
        $this->Admin_model->Update('users', $data, array('id' => $this->input->post('id')));
        redirect(base_url('administrator/dashboard/userview'), 'refresh');
    }

    public function delete($id = null)
    {
        if (!isset($id)) {
            show_404();
        }

        // $image_path = './upload/user/'; // your image path
        // $_get_image = $this->db->get_where('user', array('id' => $id));
        // foreach ($_get_image->result() as $record) {
        //     $filename = $image_path . $record->image;
        //     if (file_exists($filename)) {
        //         delete_files($filename);
        //         unlink($filename);
        //     }
        // }

        $u = $this->Admin_model->getdatatableby('users', 'id', $id);
        /*$u_data = [
            'userid' => $u->userid, 
            'userrole' => $u->userrole
        ];*/
        $role = $u['userrole'];
        $uid = $u['userid'];
        if ($role == 2) {
            $this->Admin_model->Delete('dosen', array("nrp" => $uid));
        }
        if ($role == 4) {
            $this->Admin_model->Delete('mahasiswa', array("nim" => $uid));
        }
        $this->Admin_model->Delete('users', array("id" => $id));
        redirect(base_url('administrator/dashboard/userview'));
    }

    public function insert_makul()
    {
        $id_makul = $this->input->post('id_makul');
        $nama_makul = $this->input->post('nama_makul');

        $data = array(
            'id_makul' => $id_makul,
            'nama_makul' => $nama_makul,
        );
        $data = $this->Admin_model->Insert('matakuliah', $data);
        redirect(base_url('administrator/dashboard/makulview'), 'refresh');
    }

    public function update_makul()
    {

        $nama_makul = $this->input->post('nama_makul');

        $data = array(
            'nama_makul' => $nama_makul
        );
        $this->Admin_model->Update('matakuliah', $data, array('id_makul' => $this->input->post('id_makul')));
        redirect(base_url('administrator/dashboard/makulview'), 'refresh');
    }

    public function delete_makul($id_makul = null)
    {
        if (!isset($id_makul)) {
            show_404();
        }

        // $image_path = './upload/user/'; // your image path
        // $_get_image = $this->db->get_where('user', array('id' => $id));
        // foreach ($_get_image->result() as $record) {
        //     $filename = $image_path . $record->image;
        //     if (file_exists($filename)) {
        //         delete_files($filename);
        //         unlink($filename);
        //     }
        // }

        $u = $this->Admin_model->getdatatableby('matakuliah', 'id_makul', $id_makul);
        /*$u_data = [
            'userid' => $u->userid, 
            'userrole' => $u->userrole
        ];*/
        $mid = $u['id_makul'];
        $this->Admin_model->Delete('dosen', array("id_makul" => $mid));
        $this->Admin_model->Delete('mahasiswa', array("matakuliah" => $mid));
        $this->Admin_model->Delete('matakuliah', array("id_makul" => $mid));
        redirect(base_url('administrator/dashboard/makulview'));
    }

    public function insert_pmakul()
    {
        $userid = $this->input->post('userid');
        $id_makul = $this->input->post('id_makul');
        $userrole = $this->input->post('userrole');
        if (!isset($id_makul) || !isset($userid) || !isset($userrole)) {
            show_404();
        }
        $data = null;
        $role = null;
        $uid = null;
        if ($userrole == 2) {
            $role = 'dosen';
            $uid = 'nrp';
        }
        if ($userrole == 4) {
            $role = 'mahasiswa';
            $uid = 'nim';
        }
        $query = $this->Admin_model->getwhere($role, array($uid => $userid, 'id_makul' => $id_makul));
        $id = $this->Admin_model->getuserid($userid);
        if ($query->num_rows()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mata kuliah sudah dipilih!</div>');
            redirect(base_url('administrator/dashboard/detailmakulview/' . $id['id'] . '/'), 'refresh');
        }
        $data = array(
            $uid => $userid,
            'id_makul' => $id_makul
        );
        $data = $this->Admin_model->Insert($role, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mata kuliah berhasil dipilih!</div>');
        redirect(base_url('administrator/dashboard/detailmakulview/' . $id['id'] . '/'), 'refresh');
    }

    public function update_pmakul()
    {
        $userrole = $this->input->post('userrole');
        $userid = $this->input->post('userid');
        $id_makul =  $this->input->post('id_makul');
        if (!isset($id_makul) || !isset($userid) || !isset($userrole) || $userrole != 4) {
            show_404();
        }
        $nilai = $this->input->post('nilai');
        $data = array(
            'nilai' => $nilai
        );
        $id = $this->Admin_model->getuserid($userid);
        $this->Admin_model->update('mahasiswa', $data, "nim = '$userid' AND id_makul = '$id_makul'");
        redirect(base_url('administrator/dashboard/detailmakulview/' . $id['id'] . '/'), 'refresh');
    }

    public function delete_pmakul()
    {
        $userrole = $this->uri->segment(4);
        $userid =  $this->uri->segment(5);
        $id_makul =  $this->uri->segment(6);
        if (!isset($id_makul) || !isset($userid) || !isset($userrole)) {
            show_404();
        }
        if ($userrole == 2) {
            $this->Admin_model->Delete('dosen', "nrp = '$userid' AND id_makul = '$id_makul'");
        }
        if ($userrole == 4) {
            $this->Admin_model->Delete('mahasiswa', "nim = '$userid' AND id_makul = '$id_makul'");
        }

        $id = $this->Admin_model->getuserid($userid);

        redirect(base_url('administrator/dashboard/detailmakulview/' . $id['id'] . '/'), 'refresh');
    }

    public function updateprofile()
    {
        $data = array(
            'userid' => $this->input->post('userid'),
            'username' => $this->input->post('username')
        );
        $this->session->set_userdata($data);
        $this->Admin_model->Update('users', $data, array('id' => $this->input->post('id')));
        redirect(base_url('administrator/dashboard/profile'), 'refresh');
    }

    public function updatepassword()
    {
        $id = $this->input->post('id');
        $old = $this->input->post('cur_pass');
        $new = $this->input->post('new_pass1');
        $rep = $this->input->post('new_pass2');

        $u = $this->Admin_model->getdatatableby('users', 'id', $id);

        if (md5($old) != $u['userpass']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
            redirect(base_url('administrator/dashboard/changepassword'));
        }

        if ($new != $rep) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password did not match!</div>');
            redirect(base_url('administrator/dashboard/changepassword'));
        }

        $data = array(
            'userpass' => md5($this->input->post('new_pass1'))
        );

        $this->Admin_model->Update('users', $data, array('id' => $this->input->post('id')));
        redirect(base_url('administrator/dashboard/profile'), 'refresh');
    }
}
