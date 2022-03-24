<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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

        $this->load->model('m_login');
        $this->load->model('m_laporan');
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function bukukasumum()
    {
        $data['title'] = 'Laporan';
        $data['user'] =  $this->m_login->cek_user($this->session->userdata('email'));

        $data['jurnal'] = $this->m_laporan->get_jurnal();
        $data['jurnal2'] = $this->m_laporan->get_jurnal2();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('laporan/bukukasumum', $data);
            $this->load->view('template/footer');
        } else {

            redirect('laporan/bukukasumum');
        }
    }

    public function search()
    {
        $data['title'] = 'Laporan';
        $data['user'] =  $this->m_login->cek_user($this->session->userdata('email'));

        $tgl_awal = $this->input->post('tanggal_awal');
        $tgl_akhir = $this->input->post('tanggal_akhir');

        //$data['saldo_awal'] = $this->m_laporan->saldo_awal($tgl_awal);
        $data['jurnal'] = $this->m_laporan->jurnal($tgl_awal, $tgl_akhir);
        $data['jurnal2'] = $this->m_laporan->jurnal2($tgl_awal, $tgl_akhir);

        $this->session->set_flashdata('tglawal', $tgl_awal);
        $this->session->set_flashdata('tglakhir', $tgl_akhir);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/search', $data);
        $this->load->view('template/footer');
    }

    public function cetak()
    {
        $type = $this->input->get('p');
        $tgl_awal = $this->input->get('tglawal');
        $tgl_akhir = $this->input->get('tglakhir');
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($type = 'excel') {
            if ($tgl_akhir == null && $tgl_awal == null) {
                
                $data['jurnal'] = $this->m_laporan->get_jurnal();
                $data['jurnal2'] = $this->m_laporan->get_jurnal2();
            } else {

               $data['jurnal'] = $this->m_laporan->jurnal($tgl_awal, $tgl_akhir);
               $data['jurnal2'] = $this->m_laporan->jurnal2($tgl_awal, $tgl_akhir);
            }

            $this->session->set_flashdata('tglawal', $tgl_awal);
            $this->session->set_flashdata('tglakhir', $tgl_akhir);

            $this->load->view('cetak/excel', $data);
        } else {
            #
        }
    }

    public function sendEmail()
    {
      $data = $this->input->post('email');
      $pesan = $this->input->post('pesan');

      //$cek = $this->db->select('name, password')->where('name', $data)->limit(1)->get('user_finances')->row();

      //if (!empty($cek)) {
        $this->load->library('phpmailer_lib');
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kingkings8584@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;

        $mail->setFrom('kingkings8584@gmail.com', 'Laporan');
        $mail->addReplyTo('kingkings8584@gmail.com', 'Laporan');

        // email tujuan mu
        $mail->addAddress($data);

        // Attracmhent File
        if (!empty($_FILES['uploaded_file']['tmp_name'])) {
          if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
                $mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],
                                     $_FILES['uploaded_file']['name']);
          }
        }

        // Email subject
        $mail->Subject = 'Laporan masuk...';

        // Set email format to HTML
        // $mail->isHTML(true);

        // Email body content / isi
        $mail->Body = $pesan;

        // Email subject
        

        // Set email format to HTML
        // $mail->isHTML(true);

        // Email body content / isi
       

        // Send email
        if(!$mail->send()){
           $this->session->set_flashdata('message', '
              <div   class="alert alert-success" role="alert">
                  Gagal melakukan pengiriman email, cek baik baik email anda !!!
              </div>');
              redirect('laporan/bukukasumum');
        }else{
            $this->session->set_flashdata('message', '
              <div   class="alert alert-success" role="alert">
                  Sukses mengirim email ke '.$data.' cek email anda sekarang.
              </div>');
            redirect('laporan/bukukasumum');
        }

      // }else {
      //   echo "<pre>";
      //   print_r('sorry, email tidak di temukan di database');
      //   die;
      // }
    }
}
