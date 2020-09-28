<?php defined('BASEPATH') or exit('No direct script acces allowed');


/**
 * 
 */
class Tentang_model extends CI_model
{
	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function tampil_data()
	{
		return $this->db->get('tentang');
	}
	function save()
	{
		$namatentang = $this->input->post('kodegejala'); //objek model



		$data = array(
			'namatentang' => $namatentang
		);
		$this->db->insert('admin', $data);
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

	function updateData($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
