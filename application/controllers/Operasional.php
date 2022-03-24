<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operasional extends CI_Controller {

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

        
        $this->load->model('m_grafik');
        $this->load->model('m_pelanggan');
        $this->load->model('m_pemasukan');
        $this->load->model('m_cup');
        $this->load->model('m_pengeluaran');
        $this->load->model('m_operasional');
    }

	public function index()
	{
		$data['title'] = 'Data Operasional';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['operasional'] = $this->m_operasional->get_operasional();

        //$data['total_cup'] = $this->m_cup->total_cup();

        $this->form_validation->set_rules('keterangan2', 'Keterangan', 'required');
        $this->form_validation->set_rules('biaya_operasional', 'biaya', 'required');
        $this->form_validation->set_rules('waktu_operasional', 'waktu', 'required');
        $tanggal = $this->input->post('waktu_operasional');
        $bulan0 = date('m', strtotime($tanggal));
        $tahun0 = date('Y', strtotime($tanggal));
        $b_t2 = $this->m_pemasukan->b_t2($bulan0, $tahun0);


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/v_operasional', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan2'),
                'biaya_operasional' => $this->input->post('biaya_operasional'),
                'waktu_operasional' => $this->input->post('waktu_operasional'),
                
            ];

            if ($b_t2['hitung'] == 0) {
               $data0 = [
                    'id_plg' => 1,
                    'id_cup' => 1,
                    'jml_pembelian' => 0,
                    'tgl_pembelian' => $tanggal,
                    'total_harga' => 0,
                ];
                $this->m_pemasukan->insert($data0);

                //echo $b_t2['hitung'];
            }

            $data3 = [
                'keterangan' => $this->input->post('keterangan2'),
                'jml_pengeluaran' => $this->input->post('biaya_operasional'),
                'tgl_pengeluaran' => $tanggal 
            ];

        
            $pengeluaran = $this->m_pengeluaran->insert($data3);

            $this->m_operasional->insert_operasional($data);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Operasional added!
                </div>');
            redirect('operasional');
        }
	}

	public function updateoperasional()
    {
        $data['title'] = 'Data Operasional';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

       // $data['pelanggan'] = $this->m_pelanggan->get_pelanggan();

        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('biaya_operasional', 'biaya', 'required');
        $this->form_validation->set_rules('waktu_operasional', 'waktu', 'required');

        $id = $this->input->post('id_operasional');

        if ($this->form_validation->run() == false) {
           
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
             Update Operasional gagal :(
             </div>');
            redirect('operasional');
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'biaya_operasional' => $this->input->post('biaya_operasional'),
                'waktu_operasional' => $this->input->post('waktu_operasional'),
                
            ];

            $this->m_operasional->update_operasional($id, $data);
           
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Update operasional berhasil!
             </div>');
            redirect('operasional');
        }
    }

    public function deleteOperasional()
    {
        $id = $this->input->get('id');
        $this->m_operasional->delete_operasional($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Berhasil!
            </div>');
        redirect('operasional');
    }

}

/* End of file Operasional.php */
/* Location: ./application/controllers/Operasional.php */