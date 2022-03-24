<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemasukan extends CI_Model {
	function __construct()
	{
		parent::__construct();		
		$this->load->database();
	}

	// function get_pemasukan(){
	// 	$this->db->order_by("tgl_pembelian", "asc");
	// 	$query = $this->db->get('tbl_pemasukan');
	// 	return $query->result_array();
	// }

	function get_tgl_pemasukan_now(){
		$query = "SELECT YEAR(tgl_pembelian) AS tahun, MONTH(tgl_pembelian) AS bulan FROM tbl_pemasukan ORDER BY tgl_pembelian DESC LIMIT 1";
		return $this->db->query($query)->row();
	}

	function get_pemasukan($tahun, $bulan){
		// $tahun = date("Y");
		// $bulan = date("m");
		$this->db->select('tbl_pemasukan.id_pemasukan,  tbl_pemasukan.no_pemasukan, tbl_pemasukan.tgl_pembelian, tbl_pemasukan.jml_pembelian, tbl_pemasukan.total_harga, tbl_pemasukan.total_tagihan, tbl_pemasukan.sisa_tagihan, tbl_pelanggan.nama_plg, tbl_pemasukan.keterangan_cup');
		$this->db->from('tbl_pemasukan');
		$this->db->join('tbl_pelanggan', 'tbl_pemasukan.id_plg = tbl_pelanggan.id_plg');
		//$this->db->join('tbl_cup', 'tbl_pemasukan.id_cup = tbl_cup.id_cup');
		$this->db->where('tbl_pemasukan.total_harga !=', 0);
		$this->db->where('YEAR(tbl_pemasukan.tgl_pembelian) =', $tahun);
		$this->db->where('MONTH(tbl_pemasukan.tgl_pembelian) =', $bulan);
		$this->db->order_by("tbl_pemasukan.tgl_pembelian", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cek_pemasukan($cek)
    {
        $this->db->where('no_pemasukan', $cek);

        $query = $this->db->get('tbl_pemasukan');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

	function get_pemasukan_bydate($start,$end){
		$this->db->select('tbl_pemasukan.id_pemasukan, tbl_pemasukan.no_pemasukan, tbl_pemasukan.tgl_pembelian, tbl_pemasukan.jml_pembelian, tbl_pemasukan.total_harga, tbl_pemasukan.total_tagihan, tbl_pemasukan.sisa_tagihan, tbl_pelanggan.nama_plg, tbl_pemasukan.keterangan_cup');
		$this->db->from('tbl_pemasukan');
		$this->db->join('tbl_pelanggan', 'tbl_pemasukan.id_plg = tbl_pelanggan.id_plg');
		//$this->db->join('tbl_cup', 'tbl_pemasukan.id_cup = tbl_cup.id_cup');
		$this->db->where('tbl_pemasukan.tgl_pembelian BETWEEN "'.$start. '" and "'.$end.'"');
		$this->db->where('tbl_pemasukan.total_harga !=', 0);
		$this->db->order_by("tbl_pemasukan.tgl_pembelian", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_pemasukan_byid($id){
		$this->db->select('tbl_pemasukan.id_pemasukan, tbl_pemasukan.no_pemasukan, tbl_pemasukan.tgl_pembelian, tbl_pemasukan.jml_pembelian, tbl_pemasukan.total_harga, tbl_pemasukan.total_tagihan, tbl_pemasukan.sisa_tagihan, tbl_pelanggan.nama_plg, tbl_pemasukan.keterangan_cup');
		$this->db->from('tbl_pemasukan');
		$this->db->join('tbl_pelanggan', 'tbl_pemasukan.id_plg = tbl_pelanggan.id_plg');
		//$this->db->join('tbl_cup', 'tbl_pemasukan.id_cup = tbl_cup.id_cup');
		$this->db->where('tbl_pemasukan.id_pemasukan =', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_pemasukan_lain($tahun,$bulan){
		// $tahun = date("Y");
		// $bulan = date("m");
		$this->db->select('id_pemasukan, no_pemasukan, keterangan, tgl_pembelian, jml_pembelian, total_harga');
		$this->db->from('tbl_pemasukan');
		$this->db->where('tbl_pemasukan.total_harga !=', 0);
		$this->db->where('tbl_pemasukan.keterangan IS NOT NULL');
		$this->db->where("tbl_pemasukan.keterangan != '0'");
		$this->db->where("keterangan != ''");
		$this->db->where('YEAR(tbl_pemasukan.tgl_pembelian) =', $tahun);
		$this->db->where('MONTH(tbl_pemasukan.tgl_pembelian) =', $bulan);
		//$this->db->where("keterangan != 0");
		$this->db->order_by("tbl_pemasukan.tgl_pembelian", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_pemasukan_lain_bydate($start,$end){
		$this->db->select('id_pemasukan, no_pemasukan, keterangan, tgl_pembelian, jml_pembelian, total_harga');
		$this->db->from('tbl_pemasukan');
		$this->db->where('tbl_pemasukan.tgl_pembelian BETWEEN "'.$start. '" and "'.$end.'"');
		$this->db->where('tbl_pemasukan.total_harga !=', 0);
		$this->db->where('tbl_pemasukan.keterangan IS NOT NULL');
		$this->db->where("tbl_pemasukan.keterangan != '0'");
		$this->db->where("keterangan != ''");
		//$this->db->where("keterangan != 0");
		$this->db->order_by("tbl_pemasukan.tgl_pembelian", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_count_pemasukan($tahun,$bulan){
		$query = "SELECT COUNT(id_pemasukan) as jml, YEAR(tgl_pembelian) as tahun, MONTH(tgl_pembelian) as bulan, DAY(tgl_pembelian) as tgl FROM tbl_pemasukan WHERE id_plg != 0 AND YEAR(tgl_pembelian) = '$tahun' AND MONTH(tgl_pembelian) = '$bulan' GROUP BY tgl_pembelian";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	function get_count_pemasukan_bydate($start,$end){
		$query = "SELECT COUNT(id_pemasukan) as jml, YEAR(tgl_pembelian) as tahun, MONTH(tgl_pembelian) as bulan, DAY(tgl_pembelian) as tgl FROM tbl_pemasukan WHERE id_plg != 0 AND tgl_pembelian BETWEEN '$start' AND '$end' GROUP BY tgl_pembelian";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	function get_count_pemasukanlain($tahun,$bulan){
		$query = "SELECT COUNT(id_pemasukan) as jml, YEAR(tgl_pembelian) as tahun, MONTH(tgl_pembelian) as bulan, DAY(tgl_pembelian) as tgl FROM tbl_pemasukan WHERE id_plg = 0 AND YEAR(tgl_pembelian) = '$tahun' AND MONTH(tgl_pembelian) = '$bulan' GROUP BY tgl_pembelian";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	function get_count_pemasukanlain_bydate($start,$end){
		$query = "SELECT COUNT(id_pemasukan) as jml, YEAR(tgl_pembelian) as tahun, MONTH(tgl_pembelian) as bulan, DAY(tgl_pembelian) as tgl FROM tbl_pemasukan WHERE id_plg = 0 AND tgl_pembelian BETWEEN '$start' AND '$end' GROUP BY tgl_pembelian";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	function kas_id($id_transaksi){
		$this->db->select('*');
		$this->db->from('kas');
		$this->db->where('id_transaksi', $id_transaksi);
		//$query = $this->db->get_where('kas', ['id_transaksi' => $idtransaksi]);
		$query = $this->db->get();
		return $query->row_array();
	}

	function donatur_id($id_donatur){
		$query = $this->db->get_where('tbl_donatur', ['id' => $id_donatur]);
		return $query->row_array();
	}

	function insert_kas($data_kas){
		return $this->db->insert('kas', $data_kas);
	}

	function insert($data){
		return $this->db->insert('tbl_pemasukan', $data);
	}

	function transaksi_id($id){
		$query = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $id]);
		return $query->row_array();
	}

	function jurnal_id($id){
		$query = $this->db->get_where('jurnal', ['id_transaksi' => $id]);
		return $query->row_array();
	}

	function delete_pemasukan($id){
		return $this->db->delete('tbl_pemasukan', array('id_pemasukan' => $id));
	}

	function delete_kas($id){
		return $this->db->delete('kas', array('id_transaksi' => $id));
	}

	function delete_jurnal($id){
		return $this->db->delete('jurnal', array('id_transaksi' => $id));
	}

	function delete_jurnal_detail($id){
		return $this->db->delete('jurnal_detail', array('id_jurnal' => $id));
	}

	function b_t($bulan, $tahun){
		$query = $this->db->query("SELECT COUNT(*) AS hitung FROM tbl_pengeluaran WHERE MONTH(tgl_pengeluaran) = '$bulan' AND YEAR(tgl_pengeluaran) = '$tahun'");
		return $query->row_array();
	}

	function b_t2($bulan, $tahun){
		$query = $this->db->query("SELECT COUNT(*) AS hitung FROM tbl_pemasukan WHERE MONTH(tgl_pembelian) = '$bulan' AND YEAR(tgl_pembelian) = '$tahun'");
		return $query->row_array();
	}

	function insert_kas2($data){
		return $this->db->insert('kas', $data);
	}

	function insert_jurnal($data){
		return $this->db->insert('jurnal', $data);
	}

	function insert_jurnal_detail($data){
		return $this->db->insert('jurnal', $data);
	}

	function update_stok($id, $data){
		$this->db->where('id_cup', $id);
        return $this->db->update('tbl_cup', $data);
	}

	function pelunasan($id, $data){
		$this->db->where('id_pemasukan', $id);
        return $this->db->update('tbl_pemasukan', $data);
	}


}

/* End of file M_donasi.php */
/* Location: ./application/models/M_donasi.php */
