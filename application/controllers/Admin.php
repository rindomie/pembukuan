<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

        
        $this->load->model('m_grafik');
        $this->load->model('m_pelanggan');
        $this->load->model('m_pemasukan');
        $this->load->model('m_cup');
        $this->load->model('m_pengeluaran');
    }

    public function index($tahun = null, $bulan = null)
    {
        $data['title'] = 'Dashboard';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['kas_masuk'] = $this->m_grafik->pemasukan();
        $data['kas_keluar'] = $this->m_grafik->pengeluaran();

        

        $data['tanggal_grafik_g'] = $this->m_grafik->tanggal_grafik_g();

        $data['tanggal_transaksi'] = $this->m_grafik->tanggal_transaksi();
        
        
        if ($tahun != null && $bulan != null) {
            $data['grafik_pie'] = $this->m_grafik->grafik_pie_w($tahun, $bulan);
            $data['grafik_pie_plg'] = $this->m_grafik->grafik_pie_plg_w($tahun, $bulan);
			$data['grafik_pie_order_plg'] = $this->m_grafik->grafik_pie_order_plg_w($tahun, $bulan);
            $data['grafik_pie_pengeluaran'] = $this->m_grafik->grafik_pie_pengeluaran_w($tahun, $bulan);
            $data['tanggal_g'] = date('F Y', strtotime($tahun."-".$bulan."-01"));
            $data['kas_keluar_g'] = $this->m_grafik->kas_keluar_g_w($tahun);
            $data['kas_masuk_g'] = $this->m_grafik->kas_masuk_g_w($tahun);
            $data['tanggal_grafik'] = $this->m_grafik->tanggal_grafik($tahun);
            $data['tanggal_grafik0'] = $this->m_grafik->tanggal_grafik();
            $data['grafik'] = $this->m_grafik->grafik_w($tahun);
            $data['grafik2'] = $this->m_grafik->grafik2_w($tahun);
            $data['grafik3'] = $this->m_grafik->grafik3_w($tahun);
			$data['grafik5'] = $this->m_grafik->grafik5_w($tahun);
            $data['tanggal_grafik22'] = $this->m_grafik->tanggal_grafik2($tahun);
            $data['tanggal_grafik33'] = $this->m_grafik->tanggal_grafik3($tahun);
			$data['tanggal_grafik55'] = $this->m_grafik->tanggal_grafik5($tahun);
            $data['grafik11'] = $this->m_grafik->grafik11($tahun);
            $data['grafik22'] = $this->m_grafik->grafik22($tahun);
            $data['grafik33'] = $this->m_grafik->grafik33($tahun);
			$data['grafik55'] = $this->m_grafik->grafik55($tahun);
            $data['tanggal_'] = $tahun;
        }elseif ($tahun != null && $bulan == null) {
            $data['grafik_pie'] = $this->m_grafik->grafik_pie_wy($tahun);
            $data['grafik_pie_plg'] = $this->m_grafik->grafik_pie_plg_wy($tahun);
			$data['grafik_pie_order_plg'] = $this->m_grafik->grafik_pie_order_plg_wy($tahun);
            $data['grafik_pie_pengeluaran'] = $this->m_grafik->grafik_pie_pengeluaran_wy($tahun);
            $data['grafik'] = $this->m_grafik->grafik_w($tahun);
            $data['grafik2'] = $this->m_grafik->grafik2_w($tahun);
            $data['grafik3'] = $this->m_grafik->grafik3_w($tahun);
			$data['grafik5'] = $this->m_grafik->grafik5_w($tahun);
            $data['kas_keluar_g'] = $this->m_grafik->kas_keluar_g_w($tahun);
            $data['kas_masuk_g'] = $this->m_grafik->kas_masuk_g_w($tahun);
            $data['tanggal_grafik'] = $this->m_grafik->tanggal_grafik($tahun);
            $data['tanggal_grafik0'] = $this->m_grafik->tanggal_grafik();
            $data['tanggal_g'] = date('Y', strtotime($tahun."-01-01"));
            $data['tanggal_grafik22'] = $this->m_grafik->tanggal_grafik2($tahun);
            $data['tanggal_grafik33'] = $this->m_grafik->tanggal_grafik3($tahun);
			$data['tanggal_grafik55'] = $this->m_grafik->tanggal_grafik5($tahun);
            $data['grafik11'] = $this->m_grafik->grafik11($tahun);
            $data['grafik22'] = $this->m_grafik->grafik22($tahun);
            $data['grafik33'] = $this->m_grafik->grafik33($tahun);
			$data['grafik55'] = $this->m_grafik->grafik55($tahun);
            $data['tanggal_'] = $tahun;
        }
        else{
            $tahun = date('Y');
            $tahun = $this->m_grafik->cek_tahun($tahun);
            if ($tahun > 0) {
                $tahun  = date('Y');
            }
            else{
                $tahun = date('Y') - 1;
            }
            $data['grafik_pie'] = $this->m_grafik->grafik_pie_wy($tahun);
            $data['grafik_pie_plg'] = $this->m_grafik->grafik_pie_plg_wy($tahun);
			$data['grafik_pie_order_plg'] = $this->m_grafik->grafik_pie_order_plg_wy($tahun);
            $data['grafik_pie_pengeluaran'] = $this->m_grafik->grafik_pie_pengeluaran_wy($tahun);
            $data['grafik'] = $this->m_grafik->grafik_w($tahun);
            $data['grafik2'] = $this->m_grafik->grafik2_w($tahun);
            $data['grafik3'] = $this->m_grafik->grafik3_w($tahun);
			$data['grafik5'] = $this->m_grafik->grafik5_w($tahun);
            $data['kas_keluar_g'] = $this->m_grafik->kas_keluar_g_w($tahun);
            $data['kas_masuk_g'] = $this->m_grafik->kas_masuk_g_w($tahun);
            $data['tanggal_grafik'] = $this->m_grafik->tanggal_grafik($tahun);
            $data['tanggal_grafik0'] = $this->m_grafik->tanggal_grafik();
            $data['tanggal_g'] = date('Y', strtotime($tahun."-01-01"));
            $data['tanggal_grafik22'] = $this->m_grafik->tanggal_grafik2($tahun);
            $data['tanggal_grafik33'] = $this->m_grafik->tanggal_grafik3($tahun);
			$data['tanggal_grafik55'] = $this->m_grafik->tanggal_grafik5($tahun);
            $data['grafik11'] = $this->m_grafik->grafik11($tahun);
            $data['grafik22'] = $this->m_grafik->grafik22($tahun);
            $data['grafik33'] = $this->m_grafik->grafik33($tahun);
			$data['grafik55'] = $this->m_grafik->grafik55($tahun);
            $data['tanggal_'] = $tahun;
        }
        
        //echo date('Y');
        
        $data['tanggal_grafik_tahun'] = $this->m_grafik->tanggal_grafik_tahun();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function addPelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        //$data['donatur'] = $this->db->get('tbl_donatur')->result_array();

        $this->form_validation->set_rules('nama_plg', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat_plg', 'Alamat', 'required');
        $this->form_validation->set_rules('telp_plg', 'Telpon', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Gagal menambah pelanggan!
                </div>');
            redirect('admin/pemasukan');
        } else {
            $data = [
                'nama_plg' => $this->input->post('nama_plg'),
                'alamat_plg' => $this->input->post('alamat_plg'),
                 'telp_plg' => $this->input->post('telp_plg'),
            ];
            $this->m_pelanggan->insert_pelanggan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Pelanggan added!
                </div>');
            redirect('admin/pemasukan');
        }
    }

    public function pelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['pelanggan'] = $this->m_pelanggan->get_pelanggan();


        $data['total_pelanggan'] = $this->m_grafik->total_pelanggan();

        $this->form_validation->set_rules('nama_plg', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat_plg', 'Alamat', 'required');
        $this->form_validation->set_rules('telp_plg', 'Telpon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pelanggan', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama_plg' => $this->input->post('nama_plg'),
                'alamat_plg' => $this->input->post('alamat_plg'),
                 'telp_plg' => $this->input->post('telp_plg'),
            ];
            $this->m_pelanggan->insert_pelanggan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Pelanggan added!
                </div>');
            redirect('admin/pelanggan');
        }
    }

    public function pemasukan()
    {

		// $start = '2022-01-01';
		// $end = '2022-01-31';
		$start = $this->input->post('datea');
		$end = $this->input->post('dateb');
		// var_dump($start, $end);
		// die();
		
        $data['title'] = 'Data Pemasukan';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['cup'] = $this->m_cup->get_cup();

        $data['pelanggan'] = $this->m_pelanggan->get_pelanggan();

		if($start != NULL && $end != NULL){
			$data['pemasukan'] = $this->m_pemasukan->get_pemasukan_bydate($start,$end);
			$data['pemasukan_lain'] = $this->m_pemasukan->get_pemasukan_lain_bydate($start,$end);
			$data['count_pemasukan'] = $this->m_pemasukan->get_count_pemasukan_bydate($start,$end);
			$data['count_pemasukan_lain'] = $this->m_pemasukan->get_count_pemasukanlain_bydate($start,$end);
		}else{
			$get_tgl = $this->m_pemasukan->get_tgl_pemasukan_now();
			$tahun = $get_tgl->tahun;
			$bulan = $get_tgl->bulan;
			// foreach($get_tgl as g){

			// }
			// var_dump($tahun,$bulan);
			// die();

			$data['pemasukan'] = $this->m_pemasukan->get_pemasukan($tahun,$bulan);
			$data['pemasukan_lain'] = $this->m_pemasukan->get_pemasukan_lain($tahun,$bulan);
			$data['count_pemasukan'] = $this->m_pemasukan->get_count_pemasukan($tahun,$bulan);
			$data['count_pemasukan_lain'] = $this->m_pemasukan->get_count_pemasukanlain($tahun,$bulan);
		}


        $data['total_pemasukan'] = $this->m_grafik->pemasukan();

        
        $this->form_validation->set_rules('nominal_bayar', 'Nominal', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/pemasukan', $data);
            $this->load->view('template/footer');
        } else {

            $keterangan_cup = $this->m_cup->get_cup_w($this->input->post('id_cup'))['nama_cup'];
			
			if($this->input->post('no_masuk')){
				$cek = $this->input->post('no_masuk', true);
				$cek = 'PM'.$cek;
			}else{
				$cek = $this->input->post('no_masuk_lain', true);
				$cek = 'PM'.$cek;
			}


			if ($this->m_pemasukan->cek_pemasukan($cek)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				 Tambah Pemasukan Gagal!
				 </div>');
				redirect('admin/pemasukan');
			} else {
				$data = [
					'id_plg' => $this->input->post('id_plg'),
					'id_cup' => $this->input->post('id_cup'),
					'no_pemasukan' => $cek,
					'jml_pembelian' => $this->input->post('jumlah_beli'),
					'tgl_pembelian' => $this->input->post('tanggal'),
					'total_harga' => preg_replace('/[^0-9]/', '', $this->input->post('nominal_bayar')),
					'total_tagihan' => preg_replace('/[^0-9]/', '', $this->input->post('nominal_tagihan')),
					'sisa_tagihan' => preg_replace('/[^0-9]/', '', $this->input->post('nominal_sisa')),
					'keterangan' => $this->input->post('keterangan'),
					'keterangan_cup' => $keterangan_cup,
					'created_by' => $this->session->userdata('email'),
					'created_time' => date("Y-m-d H:i:s")
				];
	
				// var_dump($data);
				// die();
	
	
				// $bulan0 = date('m', strtotime($this->input->post('tanggal')));
				// $tahun0 = date('Y', strtotime($this->input->post('tanggal')));
				// $b_t = $this->m_pemasukan->b_t($bulan0, $tahun0);
				// if ($b_t['hitung'] == 0) {
				//     $data0 = [
				//     'keterangan' => "",
				//     'jml_pengeluaran' => 0,
					
				//     'tgl_pengeluaran' => $this->input->post('tanggal'),
					
				//     ];
				//     $this->m_pengeluaran->insert($data0);
				// }
	
				$stok_cup = $this->input->post('stok');
				$jumlah_beli = $this->input->post('jumlah_beli');
				$id_cup = $this->input->post('id_cup');
				$stok_update = $stok_cup - $jumlah_beli;
	
				$dataupdate = [
					'stok' => $stok_update
				];
	
				$this->m_pemasukan->update_stok($id_cup, $dataupdate);
	
				$this->m_pemasukan->insert($data);
	
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				 Tambah Pemasukan Berhasil!
				 </div>');
				redirect('admin/pemasukan');
			}

            
        }
    }

	public function cek_pemasukan()
    {
        $cek = $this->input->post('no_masuk', true);
		$cek = 'PM'.$cek;
		// var_dump($cek);
		// die;
        if ($this->m_pemasukan->cek_pemasukan($cek)) {
            echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
      </i> Nomor Pemasukan sudah digunakan</span></label>';
        } else {
            echo '<label class="text-success"><span><i class="fa fa-check" aria-hidden="true"></i> Nomor pemasukan bisa digunakan</span></label>';
        }
    }

	
	public function cek_pemasukan_lain()
    {
        $cek = $this->input->post('no_masuk_lain', true);
		$cek = 'PM'.$cek;
		// var_dump($cek);
		// die;
        if ($this->m_pemasukan->cek_pemasukan($cek)) {
            echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
      </i> Nomor Pemasukan sudah digunakan</span></label>';
        } else {
            echo '<label class="text-success"><span><i class="fa fa-check" aria-hidden="true"></i> Nomor pemasukan bisa digunakan</span></label>';
        }
    }

	public function pelunasan()
    {

			$id = $this->input->post('id');
            $data = [
				'total_harga' => preg_replace('/[^0-9]/', '', $this->input->post('nominal_tagihan')),
				'sisa_tagihan' => preg_replace('/[^0-9]/', '', '0'),
                'update_time' => date("Y-m-d H:i:s"),
				'update_by' => $this->session->userdata('email')
            ];


            $this->m_pemasukan->pelunasan($id, $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Pelunasan Tagihan Berhasil!
             </div>');
            redirect('admin/pemasukan');
        
    }

    public function get_harga_cup(){
        $id = $this->input->post('id');
        $data = $this->m_cup->get_harga($id);
        //echo $data['harga_jual'];
        echo json_encode($data);
    }

    public function cetak()
    {
        $this->load->view('cetak/sertifikat');
    }

	public function invoice($id){
		ob_start();
		$data['invoice'] = $this->m_pemasukan->get_pemasukan_byid($id);
		$this->load->view('cetak/invoice',$data);
		$html = ob_get_contents();
			ob_end_clean();
			
		require './assets/html2pdf/autoload.php';
		
		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A6','en');
		$pdf->WriteHTML($html);
		$pdf->Output('invoice'.$id.'.pdf', 'D');
	  }

    public function deletePelanggan()
    {
        $id = $this->input->get('id');
        $this->m_pelanggan->delete_pelanggan($id);
        $this->m_pelanggan->delete_pemasukan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Berhasil!
            </div>');
        redirect('admin/pelanggan');
    }

    public function deletepemasukan()
    {
        $id = $this->input->get('id');

        $delete_pemasukan = $this->m_pemasukan->delete_pemasukan($id);

        if ($delete_pemasukan) {
           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Pemasukan Berhasil!
            </div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Hapus Pemasukan Gagal!
            </div>');
        }

        
        redirect('admin/pemasukan');
    }

    public function updatepelanggan()
    {
        $data['title'] = 'Data Pelanggan';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['pelanggan'] = $this->m_pelanggan->get_pelanggan();

        $this->form_validation->set_rules('nama_plg', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat_plg', 'Alamat', 'required');
        $this->form_validation->set_rules('telp_plg', 'Telpon', 'required');

        $id = $this->input->post('id_plg');

        if ($this->form_validation->run() == false) {
            // $this->load->view('template/header', $data);
            // $this->load->view('template/sidebar', $data);
            // $this->load->view('template/topbar', $data);
            // $this->load->view('admin/pelanggan', $data);
            // $this->load->view('template/footer');
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
             Update Pelanggan ' . $this->input->post('nama_plg') . ' gagal :(
             </div>');
            redirect('admin/pelanggan');
        } else {
            $data = [
                'nama_plg' => $this->input->post('nama_plg'),
                'alamat_plg' => $this->input->post('alamat_plg'),
                'telp_plg' => $this->input->post('telp_plg'),
            ];

            $this->m_pelanggan->update_pelanggan($id, $data);
           
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Update Pelanggan ' . $this->input->post('nama_plg') . ' berhasil!
             </div>');
            redirect('admin/pelanggan');
        }
    }

    public function riwayat($id)
    {
        $data['title'] = 'Riwayat pembelian';
        $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

        $data['pelanggan'] = $this->m_pelanggan->get_riwayat($id);
        $data['pelanggan_id'] = $this->m_pelanggan->get_pelanggan_id($id);

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/v_riwayat', $data);
            $this->load->view('template/footer');
        
    }
}
