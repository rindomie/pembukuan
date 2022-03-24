<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {
	function __construct()
	{
		parent::__construct();		
		$this->load->database();
	}

	function get_jurnal(){
		$this->db->select('tbl_pemasukan.id_pemasukan, tbl_pemasukan.tgl_pembelian, tbl_pemasukan.jml_pembelian, tbl_pemasukan.total_harga, tbl_pelanggan.nama_plg, tbl_pemasukan.keterangan_cup as nama_cup,
			tbl_pemasukan.keterangan');
		$this->db->from('tbl_pemasukan');
		$this->db->join('tbl_pelanggan', 'tbl_pemasukan.id_plg = tbl_pelanggan.id_plg');
		//$this->db->join('tbl_cup', 'tbl_pemasukan.id_cup = tbl_cup.id_cup');
		$this->db->where('tbl_pemasukan.total_harga !=', 0);
		$this->db->order_by("tbl_pemasukan.tgl_pembelian", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_jurnal2(){
		$this->db->select('*');
		$this->db->from('tbl_pengeluaran');
		$this->db->where('jml_pengeluaran !=', 0);
		$this->db->order_by("tgl_pengeluaran", "asc");
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function saldo_awal($tgl_awal){
		$saldo_awal = "SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
        LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where date(tgl_transaksi) < '$tgl_awal' order by a.tgl_transaksi asc";
        $query = $this->db->query($saldo_awal);
        return $query->result_array();
	}

	function jurnal($tgl_awal, $tgl_akhir){
		$this->db->select('tbl_pemasukan.id_pemasukan, tbl_pemasukan.tgl_pembelian, tbl_pemasukan.jml_pembelian, tbl_pemasukan.total_harga, tbl_pelanggan.nama_plg, tbl_pemasukan.keterangan_cup as nama_cup,
			tbl_pemasukan.keterangan');
		$this->db->from('tbl_pemasukan');
		$this->db->join('tbl_pelanggan', 'tbl_pemasukan.id_plg = tbl_pelanggan.id_plg');
		//$this->db->join('tbl_cup', 'tbl_pemasukan.id_cup = tbl_cup.id_cup');
		$this->db->where('tbl_pemasukan.total_harga !=', 0);
		$this->db->where("tbl_pemasukan.tgl_pembelian between '$tgl_awal' and '$tgl_akhir'");
		$this->db->order_by("tbl_pemasukan.tgl_pembelian", "asc");
		$query = $this->db->get();
		return $query->result_array();

	}

	function jurnal2($tgl_awal, $tgl_akhir){
		$this->db->select('*');
		$this->db->from('tbl_pengeluaran');
		$this->db->where('jml_pengeluaran !=', 0);
		$this->db->where("tgl_pengeluaran between '$tgl_awal' and '$tgl_akhir'");
		$this->db->order_by("tgl_pengeluaran", "asc");
		$query = $this->db->get();
		return $query->result_array();

	}

	// function jurnal($tgl_awal, $tgl_akhir){
	// 	$jurnal = "SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
 //        LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where date(tgl_transaksi)  between '$tgl_awal' and '$tgl_akhir' and  (b.`debit` != '0' OR b.`kredit` != '0')   order by a.tgl_transaksi asc";
 //        $query = $this->db->query($jurnal);
 //        return $query->result_array();
        
	// }

}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */