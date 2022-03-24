<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	function __construct()
	{
		parent::__construct();		
		$this->load->database();
	}

	function cek_user($email){
		$query = $this->db->get_where('user', ['email' => $email]);
		return $query->row_array();
	}
	

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */