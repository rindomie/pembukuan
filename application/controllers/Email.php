<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function index()
	{
		$this->load->view('v_sendemail');
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
        $mail->Password = 'king858411';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;

        $mail->setFrom('kingkings8584@gmail.com', 'SmartFinance');
        $mail->addReplyTo('kingkings8584@gmail.com', 'SmartFinance Official Admin');

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
        $mail->Subject = 'Pesan untuk mu...';

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
              redirect('email');
        }else{
            $this->session->set_flashdata('message', '
              <div   class="alert alert-success" role="alert">
                  Sukses mengirim email ke '.$data.' cek email anda sekarang.
              </div>');
            redirect('email');
        }

      // }else {
      //   echo "<pre>";
      //   print_r('sorry, email tidak di temukan di database');
      //   die;
      // }
    }

}

/* End of file Email.php */
/* Location: ./application/controllers/Email.php */