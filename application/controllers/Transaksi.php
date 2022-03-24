<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        //$this->load->model('m_transaksi');
        //$this->load->model('m_donasi');
        $this->load->model('m_grafik');
        $this->load->model('m_pengeluaran');
        $this->load->model('m_pemasukan');
    }

    public function index()
    {
        $data['title'] = 'Data Transaksi';
        $data['user'] =  $this->m_login->cek_user($this->session->userdata('email'));

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

	public function cek_pengeluaran()
    {
        $cek = $this->input->post('no_keluar', true);
		$cek = 'PL'.$cek;
		// var_dump($cek);
		// die;
        if ($this->m_pengeluaran->cek_pengeluaran($cek)) {
            echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
      </i> Nomor Pengeluaran sudah digunakan</span></label>';
        } else {
            echo '<label class="text-success"><span><i class="fa fa-check" aria-hidden="true"></i> Nomor pengeluaran bisa digunakan</span></label>';
        }
    }

    public function pengeluaran()
    {
        $data['title'] = 'Pengeluaran';
        $data['user'] =  $this->m_login->cek_user($this->session->userdata('email'));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

		$start = $this->input->post('datea');
		$end = $this->input->post('dateb');

		if($start != NULL && $end != NULL){
			$data['pengeluaran'] = $this->m_pengeluaran->get_pengeluaran_bydate($start,$end);
			$data['count_pengeluaran'] = $this->m_pengeluaran->get_count_pengeluaran_bydate($start,$end);
		}else{
			$get_tgl = $this->m_pengeluaran->get_tgl_pengeluaran_now();
			$tahun = $get_tgl->tahun;
			$bulan = $get_tgl->bulan;
			$data['pengeluaran'] = $this->m_pengeluaran->get_pengeluaran($tahun,$bulan);
			$data['count_pengeluaran'] = $this->m_pengeluaran->get_count_pengeluaran($tahun,$bulan);
		}

        
        $data['total_pengeluaran'] = $this->m_grafik->pengeluaran();
        $data['jenis_pengeluaran'] = $this->m_pengeluaran->get_jenis_pengeluaran();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('transaksi/pengeluaran', $data);
        $this->load->view('template/footer');
        
    }

    public function savepengeluaran(){
        $keterangan = $this->input->post('keterangan');
        $tanggal = $this->input->post('tanggal');
        $nominal = $this->input->post('nominal');
        $id_jenis_pengeluaran = $this->input->post('id_jenis_pengeluaran');

        $bulan0 = date('m', strtotime($tanggal));
        $tahun0 = date('Y', strtotime($tanggal));
        $b_t2 = $this->m_pemasukan->b_t2($bulan0, $tahun0);

		$cek = $this->input->post('no_keluar', true);
		$cek = 'PL'.$cek;


        // if ($b_t2['hitung'] == 0) {
        //    $data0 = [
        //         'id_plg' => 1,
        //         'id_cup' => 1,
        //         'jml_pembelian' => 0,
        //         'tgl_pembelian' => $this->input->post('tanggal'),
        //         'total_harga' => 0,
        //     ];
        //     $this->m_pemasukan->insert($data0);

        //     echo $b_t2['hitung'];
        // }

		if ($this->m_pengeluaran->cek_pengeluaran($cek)) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			 Tambah Pengeluaran Gagal!
			 </div>');
			redirect('transaksi/pengeluaran');
		} else {
			$data = [
				'id_jenis_pengeluaran' => $id_jenis_pengeluaran,
				'no_pengeluaran' => $cek,
				'keterangan' => $keterangan,
				'jml_pengeluaran' => preg_replace('/[^0-9]/', '', $nominal),
				'tgl_pengeluaran' => $tanggal,
				'created_by' => $this->session->userdata('email'),
				'created_time' => date('Y-m-d H:i:s')
			];
	
			
			$pengeluaran = $this->m_pengeluaran->insert($data);
			if ($pengeluaran) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Pengeluaran berhasil ditambah!
				</div>');
			}else{
				 $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
				Pengeluaran gagal ditambah!
				</div>');
			}
			
			redirect('transaksi/pengeluaran');

		}

        
    }

    public function savejenispengeluaran(){
        $keterangan = $this->input->post('keterangan');
       

        $data = [
            'keterangan_jenis' => $keterangan
        ];

        
        $jenis_pengeluaran = $this->m_pengeluaran->insert_jenis($data);
        if ($jenis_pengeluaran) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jenis Pengeluaran berhasil ditambah!
            </div>');
        }else{
             $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Jenis Pengeluaran gagal ditambah!
            </div>');
        }
        
        redirect('transaksi/pengeluaran');
        
    }


    public function editjenispengeluaran(){
        $keterangan = $this->input->post('keterangan');
        $id_jenis = $this->input->post('id_jenis');

        $data = [
            'keterangan_jenis' => $keterangan
        ];

        
        $jenis_pengeluaran = $this->m_pengeluaran->update_jenis($id_jenis, $data);

        if ($jenis_pengeluaran) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jenis Pengeluaran berhasil diedit!
            </div>');
        }else{
             $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Jenis Pengeluaran gagal diedit!
            </div>');
        }
        
        redirect('transaksi/pengeluaran');
        
    }

    public function savekasmasuk(){

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
        $kas =  $this->m_transaksi->kas_id($idtransaksi);
        if ($kas) {
            $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
        }

        $keterangan = $this->input->post('keterangan');
        $tanggal = $this->input->post('tanggal');
        $nominal = $this->input->post('nominal');

        $data = array();

        $index = 0;

        $bulan0 = date('m', strtotime($tanggal));
        $tahun0 = date('Y', strtotime($tanggal));
        $b_t = $this->m_donasi->b_t($bulan0, $tahun0);
        if ($b_t['hitung'] == 0) {
            $data0 = [
                'id_transaksi' => $idtransaksi."999",
                'tipe_kas' => 'keluar',
                'keterangan' => 'Donasi A/n 0',
                'nominal' => '0',
                'tgl_transaksi' => $tanggal
            ];
            $this->m_donasi->insert_kas2($data0);
        }

        foreach ($keterangan as $ket) {
            array_push($data, array(
                'id_transaksi' => $idtransaksi."".$index,
                'tipe_kas' => 'masuk',
                'keterangan' => $keterangan[$index],
                'tgl_transaksi' => $tanggal,
                'nominal' => preg_replace('/[^0-9]/', '', $nominal[$index])
            ));
            $index++;
        }

        $this->m_transaksi->insert_kas($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kas Keluar berhasil ditambah!
            </div>');
        redirect('transaksi/kasmasuk');
    }

    public function kasmasuk()
    {
        $data['title'] = 'Kas Masuk';
        $data['user'] =  $this->m_login->cek_user($this->session->userdata('email'));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        $data['kas_keluar'] = $this->m_transaksi->get_kas_masuk();
        $data['total_masuk'] = $this->m_grafik->kas_masuk();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('transaksi/kasmasuk', $data);
            $this->load->view('template/footer');
        } else {
            $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
            $kas =  $this->m_transaksi->kas_id($idtransaksi);
            if ($kas) {
                $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
            }
            $data = [
                'id_transaksi' => $idtransaksi,
                'tipe_kas' => 'masuk',
                'keterangan' => $this->input->post('keterangan'),
                'tgl_transaksi' => $this->input->post('tanggal'),
                'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal'))
            ];
            $this->m_transaksi->insert_kas($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Kas Masuk berhasil ditambah!
                </div>');
            redirect('transaksi/kasmasuk');
        }
    }

    public function deletepengeluaran()
    {
        $id = $this->input->get('id');

        $delete_pengeluaran = $this->m_pengeluaran->delete($id);

        if ($delete_pengeluaran) {
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus pengeluaran Berhasil!
            </div>');
     }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Hapus pengeluaran gagal!
            </div>');
    }

    redirect('transaksi/pengeluaran');
}

public function deletekasmasuk()
{
    $id = $this->input->get('id');

        //$donasi =  $this->m_donasi->transaksi_id($id);
    $kas =  $this->m_donasi->kas_id($id);
    $jurnal =  $this->m_donasi->jurnal_id($kas['id_transaksi']);

    $delete_transaksi = $this->m_donasi->delete_transaksi($id);
    $delete_kas = $this->m_donasi->delete_kas($id);
    $delete_jurnal = $this->m_donasi->delete_jurnal($id);
    $delete_jurnal_detail = $this->m_donasi->delete_jurnal_detail($jurnal['id']);

    if ($delete_transaksi and $delete_kas and $delete_jurnal and $delete_jurnal_detail) {
     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Hapus kas keluar Berhasil!
        </div>');
 }else{
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Hapus kas keluar gagal!
        </div>');
}


redirect('transaksi/kasmasuk');
}
}
