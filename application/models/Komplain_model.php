<?php defined('BASEPATH') or exit('No direct script acces allowed');


/**
 * 
 */
class Komplain_model extends CI_model
{
	function updateData($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapusData($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function editData($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	public function tampil_data()
	{
		return $this->db->get('komplain');
	}
}
