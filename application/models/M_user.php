<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
	function update_password($email, $data){
		$this->db->where('email', $email);
        return $this->db->update('user', $data);
	}
	

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */