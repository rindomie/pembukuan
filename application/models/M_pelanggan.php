<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {
	function __construct()
	{
		parent::__construct();		
		$this->load->database();
	}

	function get_pelanggan(){
		$query = $this->db->get('tbl_pelanggan');
		return $query->result_array();
	}

	function insert_pelanggan($data){
		return $this->db->insert('tbl_pelanggan', $data);
	}
	
	function delete_pelanggan($id){
		return $this->db->delete('tbl_pelanggan', array('id_plg' => $id));
	}

	function delete_pemasukan($id){
		return $this->db->delete('tbl_pemasukan', array('id_plg' => $id));
	}

	function update_pelanggan($id, $data){
		$this->db->where('id_plg', $id);
		return $this->db->update('tbl_pelanggan', $data);
	}

	function get_riwayat($id){
		$query = $this->db->query("SELECT
			`tbl_pemasukan`.`tgl_pembelian`
			, `tbl_pemasukan`.`keterangan_cup`
			, `tbl_pemasukan`.`jml_pembelian`
			FROM
			`db_pembukuan`.`tbl_pelanggan`
			INNER JOIN `db_pembukuan`.`tbl_pemasukan` 
			ON (`tbl_pelanggan`.`id_plg` = `tbl_pemasukan`.`id_plg`)
			WHERE tbl_pelanggan.`id_plg` = '$id' AND tbl_pemasukan.`jml_pembelian` != 0");
		
		return $query->result_array();
	}

	function get_pelanggan_id($id){
		$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->where('id_plg', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file M_donatur.php */
/* Location: ./application/models/M_donatur.php */