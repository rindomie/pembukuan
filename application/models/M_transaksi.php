<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {
	function __construct()
	{
		parent::__construct();		
		$this->load->database();
	}

	function kas_id($id_transaksi){
		$query = $this->db->get_where('kas', ['id_transaksi' => $id_transaksi]);
		return $query->row_array();
	}
	
	function insert_kas($data){
		return $this->db->insert_batch('kas', $data);
	}

	function get_kas_keluar(){
		$query = $this->db->query("SELECT * FROM kas WHERE tipe_kas = 'keluar' AND nominal != 0");
        return $query->result_array();
	}

	function count_tot_kaskeluar(){
		$query = $this->db->query("SELECT sum(nominal) as nominal FROM kas WHERE tipe_kas = 'keluar' AND nominal != 0");
        return $query->row_array();
	}

	function get_kas_masuk(){
		$query = $this->db->query("SELECT * FROM kas WHERE tipe_kas = 'masuk' AND nominal != 0");
        return $query->result_array();
	}

	

}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */