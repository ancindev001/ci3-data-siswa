<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Admin extends CI_Model
{

	function verify($username, $password)
	{
		$this->db->where('username', $username);
		return $this->db->get('tbl_admin')->result();
	}
}
