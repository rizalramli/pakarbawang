<?php

class Admin_model extends CI_model {

	public function cek_admin ($username, $password) {
		$this->db->where("name = '$username' or username = '$username'");
		$this->db->where('password,md5($password)');
		$query = $this->db->get('admin');
		return $query->row_array();
	}
}