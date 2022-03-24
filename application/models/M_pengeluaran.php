<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengeluaran extends CI_Model {
	function insert($data){
		return $this->db->insert('tbl_pengeluaran', $data);
	}

	function insert_jenis($data){
		return $this->db->insert('tbl_jenis_pengeluaran', $data);
	}

	function update_jenis($id, $data){
		$this->db->where('id_jenis_pengeluaran', $id);
        return $this->db->update('tbl_jenis_pengeluaran', $data);
	}

	// function get_pengeluaran(){
	// 	$query = $this->db->query("SELECT tbl_pengeluaran.* FROM tbl_pengeluaran  WHERE jml_pengeluaran != 0");
    //     return $query->result_array();
	// }

	function get_tgl_pengeluaran_now(){
		$query = "SELECT YEAR(tgl_pengeluaran) AS tahun, MONTH(tgl_pengeluaran) AS bulan FROM tbl_pengeluaran ORDER BY tgl_pengeluaran DESC LIMIT 1";
		return $this->db->query($query)->row();
	}

	function get_pengeluaran($tahun,$bulan){
		// $tahun = date("Y");
		// $bulan = date("m");
		$query = $this->db->query("SELECT tbl_pengeluaran.*, tbl_jenis_pengeluaran.* FROM tbl_pengeluaran JOIN tbl_jenis_pengeluaran ON tbl_pengeluaran.id_jenis_pengeluaran = tbl_jenis_pengeluaran.id_jenis_pengeluaran WHERE jml_pengeluaran != 0 AND YEAR(tgl_pengeluaran) = '$tahun' AND MONTH(tgl_pengeluaran) = '$bulan' ORDER BY tbl_pengeluaran.tgl_pengeluaran DESC");
        return $query->result_array();
	}

	function get_pengeluaran_bydate($start,$end){
		$query = $this->db->query("SELECT tbl_pengeluaran.*, tbl_jenis_pengeluaran.* FROM tbl_pengeluaran JOIN tbl_jenis_pengeluaran ON tbl_pengeluaran.id_jenis_pengeluaran = tbl_jenis_pengeluaran.id_jenis_pengeluaran WHERE tbl_pengeluaran.tgl_pengeluaran BETWEEN '$start' AND '$end' AND jml_pengeluaran != 0 ORDER BY tbl_pengeluaran.tgl_pengeluaran DESC");
        return $query->result_array();
	}

	function get_count_pengeluaran($tahun,$bulan){
		$query = "SELECT COUNT(id_pengeluaran) as jml, YEAR(tgl_pengeluaran) as tahun, MONTH(tgl_pengeluaran) as bulan, DAY(tgl_pengeluaran) as tgl FROM tbl_pengeluaran WHERE YEAR(tgl_pengeluaran) = '$tahun' AND MONTH(tgl_pengeluaran) = '$bulan' GROUP BY tgl_pengeluaran";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	function get_count_pengeluaran_bydate($start,$end){
		$query = "SELECT COUNT(id_pengeluaran) as jml, YEAR(tgl_pengeluaran) as tahun, MONTH(tgl_pengeluaran) as bulan, DAY(tgl_pengeluaran) as tgl FROM tbl_pengeluaran WHERE tgl_pengeluaran BETWEEN '$start' AND '$end' GROUP BY tgl_pengeluaran";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function cek_pengeluaran($cek)
    {
        $this->db->where('no_pengeluaran', $cek);

        $query = $this->db->get('tbl_pengeluaran');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

	function get_jenis_pengeluaran(){
		$query = $this->db->query("SELECT * FROM tbl_jenis_pengeluaran");
        return $query->result_array();
	}

	function delete($id){
		return $this->db->delete('tbl_pengeluaran', array('id_pengeluaran' => $id));
	}

}

/* End of file M_pengeluaran.php */
/* Location: ./application/models/M_pengeluaran.php */
