<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cup extends CI_Model {
	function get_cup(){
		$query = $this->db->get('tbl_cup');
		return $query->result_array();
	}

	function get_harga($id){
		$this->db->select('*');
		$this->db->where('id_cup', $id);
		$this->db->from('tbl_cup');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_cup_w($id){
		$this->db->select('nama_cup');
		$this->db->where('id_cup', $id);
		$this->db->from('tbl_cup');
		$query = $this->db->get();
		return $query->row_array();
	}

	function total_cup(){
		$query = $this->db->get('tbl_cup');
		return $query->num_rows();
	}

	function update_cup($id, $data){
		$this->db->where('id_cup', $id);
        return $this->db->update('tbl_cup', $data);
	}

	function delete_cup($id){
		return $this->db->delete('tbl_cup', array('id_cup' => $id));
	}

	function delete_pemasukan($id){
		return $this->db->delete('tbl_pemasukan', array('id_cup' => $id));
	}

	function insert_cup($data){
		return $this->db->insert('tbl_cup', $data);
	}

	

}

/* End of file M_cup.php */
/* Location: ./application/models/M_cup.php */