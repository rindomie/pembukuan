<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('role_id') == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            this session has expired, please login again!
              </div>');
            redirect("auth");
        }

        $this->load->model('m_user');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['email'] = $this->session->userdata('email');
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function ganti()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');
        if ($password == $password2) {
            $data = [
                'password' => $password,
                'name' => $nama,
                'email' => $username

            ];
        $email = $this->session->userdata('email');
        $this->m_user->update_password($email, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            berhasil di ganti!
             </div>');
            redirect('user');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
             Gagal :( , Password tidak sama!
             </div>');
            redirect('user');
        }
        
    }
}
