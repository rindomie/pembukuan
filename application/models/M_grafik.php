<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_grafik extends CI_Model {
	function __construct()
	{
		parent::__construct();		
		$this->load->database();
	}

	public function cek_tahun($tahun='')
	{
		$query = $this->db->query("SELECT * FROM tbl_pengeluaran WHERE YEAR(tgl_pengeluaran) = '$tahun'");
		return $query->num_rows();
		// if ($query->num_rows() > 0) {
		// 	$tahun = 2020;
		// 	return $tahun;
		// }else{
		// 	$tahun = 2020;
		// 	return $tahun;
		// }

	}

	// grafik pendapatan bersih

	public function grafik(){
		$query = $this->db->query("SELECT tgl_pembelian, SUM(total_harga) AS total FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_w($tahun){
		$query = $this->db->query("SELECT tgl_pembelian, SUM(total_harga) AS total FROM tbl_pemasukan WHERE YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian) ");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik11($tahun =  null){
		if ($tahun === null) {
			$query = $this->db->query("SELECT tgl_pembelian, SUM(total_harga) AS total FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}else{
			$query = $this->db->query("SELECT tgl_pembelian, SUM(total_harga) AS total FROM tbl_pemasukan WHERE YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}
		
		return $query->result_array();
	}

	// grafik selisih pendapatan dan pengeluaran
	public function grafik2(){
		$query = $this->db->query("SELECT tgl_pengeluaran, SUM(jml_pengeluaran) AS total FROM tbl_pengeluaran GROUP BY YEAR(tgl_pengeluaran)*100 + MONTH(tgl_pengeluaran)");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik2_w($tahun){
		$query = $this->db->query("SELECT tgl_pengeluaran, SUM(jml_pengeluaran) AS total FROM tbl_pengeluaran WHERE YEAR(tgl_pengeluaran) = '$tahun' GROUP BY YEAR(tgl_pengeluaran)*100 + MONTH(tgl_pengeluaran)");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik22($tahun =  null){
		if ($tahun === null) {
			$query = $this->db->query("SELECT tgl_pengeluaran, SUM(jml_pengeluaran) AS total FROM tbl_pengeluaran GROUP BY YEAR(tgl_pengeluaran)*100 + MONTH(tgl_pengeluaran)");
		}else{
			$query = $this->db->query("SELECT tgl_pengeluaran, SUM(jml_pengeluaran) AS total FROM tbl_pengeluaran WHERE YEAR(tgl_pengeluaran) = '$tahun' GROUP BY YEAR(tgl_pengeluaran)*100 + MONTH(tgl_pengeluaran)");
		}
		
		return $query->result_array();
	}

	

	// grafik total cup
	public function grafik3(){
		$query = $this->db->query("SELECT tgl_pembelian, SUM(jml_pembelian) AS total FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik3_w($tahun){
		$query = $this->db->query("SELECT tgl_pembelian, SUM(jml_pembelian) AS total FROM tbl_pemasukan WHERE YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian) ");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik33($tahun =  null){
		if ($tahun === null) {
			$query = $this->db->query("SELECT tgl_pembelian, SUM(jml_pembelian) AS total FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}else{
			$query = $this->db->query("SELECT tgl_pembelian, SUM(jml_pembelian) AS total FROM tbl_pemasukan WHERE YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}
		
		return $query->result_array();
	}

		// grafik total order
		public function grafik5(){
			$query = $this->db->query("SELECT tgl_pembelian, COUNT(jml_pembelian) AS total_order FROM tbl_pemasukan WHERE id_plg != 0 GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
	
		public function grafik5_w($tahun){
			$query = $this->db->query("SELECT tgl_pembelian, COUNT(jml_pembelian) AS total_order FROM tbl_pemasukan WHERE id_plg != 0 AND YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian) ");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					$hasil[] = $data;
				}
				return $hasil;
			}
		}
	
		public function grafik55($tahun =  null){
			if ($tahun === null) {
				$query = $this->db->query("SELECT tgl_pembelian, COUNT(jml_pembelian) AS total_order FROM tbl_pemasukan WHERE id_plg != 0 GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
			}else{
				$query = $this->db->query("SELECT tgl_pembelian, COUNT(jml_pembelian) AS total_order FROM tbl_pemasukan WHERE id_plg != 0 AND YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
			}
			
			return $query->result_array();
		}

	// public function tanggal_grafik(){
	// 	$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
	// 	if ($query->num_rows() > 0) {
	// 		foreach ($query->result() as $data) {
	// 			$hasil[] = $data;
	// 		}
	// 		return $hasil;
	// 	}
	// }

	public function tanggal_grafik($tahun = null){
		if ($tahun == null) {
			$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}else{
			$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan  WHERE YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}
		
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function tanggal_grafik_tahun(){
		$query = $this->db->query("SELECT YEAR(tgl_pembelian) AS tahun FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function tanggal_grafik2($tahun = null){
		if ($tahun === null) {
			$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}else{
			$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan WHERE YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}
		
		return $query->result_array();
	}

	public function tanggal_grafik3($tahun = null){
		if ($tahun === null) {
			$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}else{
			$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan WHERE YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}
		
		return $query->result_array();
	}

	public function tanggal_grafik5($tahun = null){
		if ($tahun === null) {
			$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan WHERE id_plg != 0 GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}else{
			$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan WHERE id_plg != 0 AND YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		}
		
		return $query->result_array();
	}

	public function grafik_pie(){
		$query = $this->db->query("SELECT tbl_cup.`nama_cup`, SUM(tbl_pemasukan.`jml_pembelian`) as total FROM `db_pembukuan`.`tbl_cup` INNER JOIN `db_pembukuan`.`tbl_pemasukan`  ON (`tbl_cup`.`id_cup` = `tbl_pemasukan`.`id_cup`) GROUP BY tbl_cup.`id_cup`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_pengeluaran(){
		$query = $this->db->query("SELECT tbl_jenis_pengeluaran.`keterangan_jenis`, SUM(tbl_pengeluaran.`jml_pengeluaran`) as total FROM `pembukuan`.`tbl_jenis_pengeluaran` INNER JOIN `pembukuan`.`tbl_pengeluaran`  ON (`tbl_jenis_pengeluaran`.`id_jenis_pengeluaran` = `tbl_pengeluaran`.`id_jenis_pengeluaran`) GROUP BY tbl_jenis_pengeluaran.`id_jenis_pengeluaran`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_plg(){
		$query = $this->db->query("SELECT tbl_pelanggan.`nama_plg` , SUM(tbl_pemasukan.`jml_pembelian`) AS total FROM tbl_pemasukan JOIN tbl_pelanggan ON tbl_pelanggan.`id_plg` = tbl_pemasukan.`id_plg` GROUP BY tbl_pemasukan.`id_plg`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_order_plg(){
		$query = $this->db->query("SELECT tbl_pelanggan.`nama_plg` , COUNT(tbl_pemasukan.`jml_pembelian`) AS total FROM tbl_pemasukan JOIN tbl_pelanggan ON tbl_pelanggan.`id_plg` = tbl_pemasukan.`id_plg` GROUP BY tbl_pemasukan.`id_plg`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_w($tahun, $bulan){
		$query = $this->db->query("SELECT keterangan_cup as nama_cup, SUM(jml_pembelian) as total FROM tbl_pemasukan
			WHERE MONTH(tgl_pembelian) = '$bulan' 
			AND YEAR(tgl_pembelian) = '$tahun'
			AND keterangan_cup IS NOT NULL
			GROUP BY keterangan_cup");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_plg_w($tahun, $bulan){
		$query = $this->db->query("SELECT tbl_pelanggan.`nama_plg` , SUM(tbl_pemasukan.`jml_pembelian`) AS total FROM tbl_pemasukan JOIN tbl_pelanggan ON tbl_pelanggan.`id_plg` = tbl_pemasukan.`id_plg` WHERE MONTH(tbl_pemasukan.`tgl_pembelian`) = '$bulan' AND YEAR(tbl_pemasukan.`tgl_pembelian`) = '$tahun' GROUP BY tbl_pemasukan.`id_plg`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_order_plg_w($tahun, $bulan){
		$query = $this->db->query("SELECT tbl_pelanggan.`nama_plg` , COUNT(tbl_pemasukan.`jml_pembelian`) AS total FROM tbl_pemasukan JOIN tbl_pelanggan ON tbl_pelanggan.`id_plg` = tbl_pemasukan.`id_plg` WHERE MONTH(tbl_pemasukan.`tgl_pembelian`) = '$bulan' AND YEAR(tbl_pemasukan.`tgl_pembelian`) = '$tahun' GROUP BY tbl_pemasukan.`id_plg`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_pengeluaran_w($tahun, $bulan){
		$query = $this->db->query("SELECT tbl_jenis_pengeluaran.`keterangan_jenis` , SUM(tbl_pengeluaran.`jml_pengeluaran`) AS total FROM tbl_pengeluaran JOIN tbl_jenis_pengeluaran ON tbl_jenis_pengeluaran.`id_jenis_pengeluaran` = tbl_pengeluaran.`id_jenis_pengeluaran` WHERE MONTH(tbl_pengeluaran.`tgl_pengeluaran`) = '$bulan' AND YEAR(tbl_pengeluaran.`tgl_pengeluaran`) = '$tahun' GROUP BY tbl_pengeluaran.`id_jenis_pengeluaran`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_plg_wy($tahun){
		$query = $this->db->query("SELECT tbl_pelanggan.`nama_plg` , SUM(tbl_pemasukan.`jml_pembelian`) AS total FROM tbl_pemasukan JOIN tbl_pelanggan ON tbl_pelanggan.`id_plg` = tbl_pemasukan.`id_plg` WHERE YEAR(tbl_pemasukan.`tgl_pembelian`) = '$tahun' GROUP BY tbl_pemasukan.`id_plg`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_order_plg_wy($tahun){
		$query = $this->db->query("SELECT tbl_pelanggan.`nama_plg` , COUNT(tbl_pemasukan.`jml_pembelian`) AS total FROM tbl_pemasukan JOIN tbl_pelanggan ON tbl_pelanggan.`id_plg` = tbl_pemasukan.`id_plg` WHERE YEAR(tbl_pemasukan.`tgl_pembelian`) = '$tahun' GROUP BY tbl_pemasukan.`id_plg`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_pengeluaran_wy($tahun){
		$query = $this->db->query("SELECT tbl_jenis_pengeluaran.`keterangan_jenis` , SUM(tbl_pengeluaran.`jml_pengeluaran`) AS total FROM tbl_jenis_pengeluaran JOIN tbl_pengeluaran ON tbl_jenis_pengeluaran.`id_jenis_pengeluaran` = tbl_pengeluaran.`id_jenis_pengeluaran` WHERE YEAR(tbl_pengeluaran.`tgl_pengeluaran`) = '$tahun' GROUP BY tbl_pengeluaran.`id_jenis_pengeluaran`");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	public function grafik_pie_wy($tahun){
		$query = $this->db->query("SELECT keterangan_cup as nama_cup, SUM(jml_pembelian) as total FROM tbl_pemasukan
			WHERE YEAR(tgl_pembelian) = '$tahun'
			AND keterangan_cup IS NOT NULL
			GROUP BY keterangan_cup");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function total_donasi(){
		$this->db->select_sum('nominal');
		$query = $this->db->get('tbl_transaksi');
		return $query->row_array();
	}

	function total_pelanggan(){
		$query = $this->db->get('tbl_pelanggan');
		return $query->num_rows();
	}

	function pemasukan(){
		$this->db->select_sum('total_harga');
		$query = $this->db->get('tbl_pemasukan');
		return $query->row_array();
	}

	function pengeluaran(){
		$this->db->select_sum('jml_pengeluaran');
		$query = $this->db->get('tbl_pengeluaran');
		return $query->row_array();
	}

	function operasional()
	{
		$this->db->select_sum('biaya_operasional');
		$query = $this->db->get('tbl_operasional');
		return $query->row_array();
	}

	function kas_keluar_g(){
		$query = $this->db->query("SELECT tgl_pengeluaran, SUM(jml_pengeluaran) AS total FROM tbl_pengeluaran GROUP BY YEAR(tgl_pengeluaran)*100 + MONTH(tgl_pengeluaran)");
		return $query->num_rows();
	}

	function kas_masuk_g(){
		$query = $this->db->query("SELECT tgl_pembelian, SUM(jml_pembelian) AS total FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		return $query->num_rows();
	}

	function kas_keluar_g_w($tahun){
		$query = $this->db->query("SELECT tgl_pengeluaran, SUM(jml_pengeluaran) AS total FROM tbl_pengeluaran WHERE YEAR(tgl_pengeluaran) = '$tahun' GROUP BY YEAR(tgl_pengeluaran)*100 + MONTH(tgl_pengeluaran)");
		return $query->num_rows();
	}

	function kas_masuk_g_w($tahun){
		$query = $this->db->query("SELECT tgl_pembelian, SUM(jml_pembelian) AS total FROM tbl_pemasukan WHERE YEAR(tgl_pembelian) = '$tahun' GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		return $query->num_rows();
	}

	function tanggal_grafik_g(){
		$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		return $query->num_rows();
	}

	function tanggal_transaksi(){
		$query = $this->db->query("SELECT tgl_pembelian FROM tbl_pemasukan GROUP BY YEAR(tgl_pembelian)*100 + MONTH(tgl_pembelian)");
		return $query->num_rows();
	}

	function keuangan(){
		$query = $this->db->query("SELECT ((SELECT SUM(nominal) AS total FROM kas WHERE tipe_kas = 'masuk') - (SELECT SUM(nominal) AS total FROM kas WHERE tipe_kas = 'keluar')) AS c FROM kas GROUP BY c");
		return $query->row_array();
	}

}

/* End of file M_grafik.php */
/* Location: ./application/models/M_grafik.php */
