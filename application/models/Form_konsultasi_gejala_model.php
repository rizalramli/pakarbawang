<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form_konsultasi_gejala_model extends CI_Model
{
	function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function tampil_data()
	{
		return $this->db->get('v_gejala');
	}

	public function save_batch($data)
	{
		return $this->db->insert_batch('gejala_konsultasi', $data);
	}
	public function save_batch_nilai_gejala_user($data)
	{
		return $this->db->insert_batch('gejala_konsultasi', $data);
	}
	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function multisave($category_kode, $category_nama)
	{
		$query = "insert into gejala_konsultasi values($category_nama, $category_kode)";
		$this->db->query($query);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
                        
/* End of file Form_konsultasi_gejala.php */
