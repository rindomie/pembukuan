<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cup extends CI_Controller {
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
    }

	public function index()
	{
		$data['title'] = 'Data Cup';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['cup'] = $this->m_cup->get_cup();

        $data['total_cup'] = $this->m_cup->total_cup();

        $this->form_validation->set_rules('nama_cup2', 'Nama', 'required');
        
        $this->form_validation->set_rules('harga_beli', 'Harga beli', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/v_cup', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama_cup' => $this->input->post('nama_cup2'),
                'keterangan_cup' => $this->input->post('keterangan_cup'),
                'harga_beli' => $this->input->post('harga_beli'),
                'harga_jual' => $this->input->post('harga_jual'),
                'harga_jual500' => $this->input->post('harga_jual500'),
                'harga_jual1000' => $this->input->post('harga_jual1000'),
                'harga_jual2000' => $this->input->post('harga_jual2000'),
                'stok' => $this->input->post('stok'),
            ];
            $this->m_cup->insert_cup($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Cup added!
                </div>');
            redirect('cup');
        }
	}

	public function updatecup()
    {
        $data['title'] = 'Data Cup';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

       // $data['pelanggan'] = $this->m_pelanggan->get_pelanggan();

        $this->form_validation->set_rules('nama_cup', 'Nama Lengkap', 'required');
        
        $this->form_validation->set_rules('harga_jual', 'Harga jual', 'required');

        $id = $this->input->post('id_cup');

        if ($this->form_validation->run() == false) {
           
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
             Update Cup ' . $this->input->post('nama_cup') . ' gagal :(
             </div>');
            redirect('cup');
        } else {
            
            $data = [
                'nama_cup' => $this->input->post('nama_cup'),
                'keterangan_cup' => $this->input->post('keterangan_cup'),
                'harga_jual' => $this->input->post('harga_jual'),
                'harga_jual500' => $this->input->post('harga_jual500'),
                'harga_jual1000' => $this->input->post('harga_jual1000'),
                'harga_jual2000' => $this->input->post('harga_jual2000'),
                'stok' => $this->input->post('stok'),
                'harga_beli' => $this->input->post('harga_beli')
                
            ];

            $this->m_cup->update_cup($id, $data);
           
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Update Cup ' . $this->input->post('nama_cup') . ' berhasil!
             </div>');
            redirect('cup');
        }
    }

    public function deleteCup()
    {
        $id = $this->input->get('id');
        $this->m_cup->delete_cup($id);
        //$this->m_cup->delete_pemasukan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Berhasil!
            </div>');
        redirect('cup');
    }

    function tambah_stok(){
         $data['title'] = 'Data Cup';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

       // $data['pelanggan'] = $this->m_pelanggan->get_pelanggan();

        $this->form_validation->set_rules('harga_beli', 'harga_beli', 'required');
        $this->form_validation->set_rules('stok_sisa', 'stok_sisa', 'required');
        $this->form_validation->set_rules('stok', 'stok', 'required');

        $id = $this->input->post('id_cup');
        $tanggal = $this->input->post('tanggal');
        $nama_cup = $this->input->post('nama_cup');
        $stok = $this->input->post('stok');
        $stok_sisa = $this->input->post('stok_sisa');
        $tot_stok = $stok + $stok_sisa;
        $harga_beli = $this->input->post('harga_beli');
        $jml_pengeluaran = $stok * $harga_beli;

        $keterangan = "Penambahan stok $nama_cup sejumlah $stok ";

        if ($this->form_validation->run() == false) {
           
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
             Tambah Cup ' . $this->input->post('nama_cup') . ' gagal :(
             </div>');
            redirect('cup');
        } else {
            $data = [
                'harga_beli' => $this->input->post('harga_beli'),
                'stok' => $tot_stok,
                
            ];
            if ($b_t2['hitung'] == 0) {
               $data0 = [
                    'id_plg' => 1,
                    'id_cup' => 1,
                    'jml_pembelian' => 0,
                    'tgl_pembelian' => $this->input->post('tanggal'),
                    'total_harga' => 0,
                ];
                $this->m_pemasukan->insert($data0);

          
            }

            $data3 = [
                'keterangan' => $keterangan,
                'jml_pengeluaran' => preg_replace('/[^0-9]/', '', $jml_pengeluaran),
                'tgl_pengeluaran' => $tanggal 
            ];

            
            //$pengeluaran = $this->m_pengeluaran->insert($data3);

                $this->m_cup->update_cup($id, $data);
               
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                 Tambah Cup ' . $this->input->post('nama_cup') . ' berhasil!
                 </div>');
                redirect('cup');
        }
    }

}

/* End of file Cup.php */
/* Location: ./application/controllers/Cup.php */