<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

	function get_karyawan(){
		$query = $this->db->get('tbl_karyawan');
		return $query->result_array();
	}

	function get_harga($id){
		$this->db->select('*');
		$this->db->where('id_cup', $id);
		$this->db->from('tbl_cup');
		$query = $this->db->get();
		return $query->result_array();
	}

	function total_karyawan(){
		$query = $this->db->get('tbl_karyawan');
		return $query->num_rows();
	}

	function update_karyawan($id, $data){
		$this->db->where('id_karyawan', $id);
        return $this->db->update('tbl_karyawan', $data);
	}

	function delete_karyawan($id){
		return $this->db->delete('tbl_karyawan', array('id_karyawan' => $id));
	}

	function delete_pemasukan($id){
		return $this->db->delete('tbl_pemasukan', array('id_cup' => $id));
	}

	function insert_karyawan($data){
		return $this->db->insert('tbl_karyawan', $data);
	}

}

/* End of file M_karyawan.php */
/* Location: ./application/models/M_karyawan.php */