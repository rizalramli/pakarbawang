<?php defined('BASEPATH') or exit('No direct script acces allowed');


/**
 * 
 */
class Gejala_model extends CI_model
{
	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function tampil_data()
	{
		return $this->db->get('gejala');
	}
	function save()
	{
		$kodegejala = $this->input->post('kodegejala'); //objek model
		$namagejala = $this->input->post('namagejala');
		$nilaicf = $this->input->post('nilaicf');
		$data = array(
			'kodegejala' => $kodegejala,
			'namagejala' => $namagejala,
			'nilaicf' => $nilaicf,
		);
		$this->db->insert('admin', $data);
	}

	public function hapusData($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function editData($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function updateData($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
