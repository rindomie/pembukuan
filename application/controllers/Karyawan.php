<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

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
        $this->load->model('m_karyawan');
    }

	public function index()
	{
		$data['title'] = 'Data Karyawan';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['karyawan'] = $this->m_karyawan->get_karyawan();

        $data['total_karyawan'] = $this->m_karyawan->total_karyawan();

        $this->form_validation->set_rules('nama_karyawan2', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_karyawan', 'alamat', 'required');
        $this->form_validation->set_rules('telp_karyawan', 'telpon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/v_karyawan', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama_karyawan' => $this->input->post('nama_karyawan2'),
                'alamat_karyawan' => $this->input->post('alamat_karyawan'),
                'telp_karyawan' => $this->input->post('telp_karyawan'),
                'gaji_karyawan' => $this->input->post('gaji_karyawan'),
            ];
            $this->m_karyawan->insert_karyawan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New karyawan added!
                </div>');
            redirect('karyawan');
        }
	}

	public function updatekaryawan()
    {
        $data['title'] = 'Data Karyawan';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

       // $data['pelanggan'] = $this->m_pelanggan->get_pelanggan();

        $this->form_validation->set_rules('nama_karyawan', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat_karyawan', 'alamat', 'required');
        $this->form_validation->set_rules('telp_karyawan', 'telpon', 'required');

        $id = $this->input->post('id_karyawan');

        if ($this->form_validation->run() == false) {
           
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
             Update Karyawan ' . $this->input->post('nama_karyawan') . ' gagal :(
             </div>');
            redirect('karyawan');
        } else {
            $data = [
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                'alamat_karyawan' => $this->input->post('alamat_karyawan'),
                'telp_karyawan' => $this->input->post('telp_karyawan'),
                'gaji_karyawan' => $this->input->post('gaji_karyawan'),
            ];

            $this->m_karyawan->update_karyawan($id, $data);
           
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Update Karyawan ' . $this->input->post('nama_karyawan') . ' berhasil!
             </div>');
            redirect('karyawan');
        }
    }

    public function deleteKaryawan()
    {
        $id = $this->input->get('id');
        $this->m_karyawan->delete_karyawan($id);
        //$this->m_cup->delete_pemasukan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Berhasil!
            </div>');
        redirect('karyawan');
    }

    function bayar_gaji(){
        $keterangan = $this->input->post('keterangan');
        $tanggal = $this->input->post('tanggal');
        $nominal = $this->input->post('nominal');

        $bulan0 = date('m', strtotime($tanggal));
        $tahun0 = date('Y', strtotime($tanggal));
        $b_t2 = $this->m_pemasukan->b_t2($bulan0, $tahun0);


        if ($b_t2['hitung'] == 0) {
           $data0 = [
                'id_plg' => 1,
                'id_cup' => 1,
                'jml_pembelian' => 0,
                'tgl_pembelian' => $this->input->post('tanggal'),
                'total_harga' => 0,
            ];
            $this->m_pemasukan->insert($data0);

            //echo $b_t2['hitung'];
        }

        $data = [
            'keterangan' => $keterangan,
            'jml_pengeluaran' => preg_replace('/[^0-9]/', '', $nominal),
            'tgl_pengeluaran' => $tanggal 
        ];

        
        $pengeluaran = $this->m_pengeluaran->insert($data);
        if ($pengeluaran) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sukses!
            </div>');
        }else{
             $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Gagal!
            </div>');
        }
        
        redirect('karyawan');
    }

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */