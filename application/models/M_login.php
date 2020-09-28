<?php

class M_login extends CI_model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function editData($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
}
