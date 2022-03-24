<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_operasional extends CI_Model {

	function get_operasional(){
		$query = $this->db->get('tbl_operasional');
		return $query->result_array();
	}

	function get_harga($id){
		$this->db->select('*');
		$this->db->where('id_cup', $id);
		$this->db->from('tbl_cup');
		$query = $this->db->get();
		return $query->result_array();
	}

	function total_cup(){
		$query = $this->db->get('tbl_cup');
		return $query->num_rows();
	}

	function update_operasional($id, $data){
		$this->db->where('id_operasional', $id);
        return $this->db->update('tbl_operasional', $data);
	}

	function delete_operasional($id){
		return $this->db->delete('tbl_operasional', array('id_operasional' => $id));
	}

	function delete_pemasukan($id){
		return $this->db->delete('tbl_pemasukan', array('id_cup' => $id));
	}

	function insert_operasional($data){
		return $this->db->insert('tbl_operasional', $data);
	}

}

/* End of file M_operasional.php */
/* Location: ./application/models/M_operasional.php */