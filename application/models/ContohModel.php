<?php defined('BASEPATH') or exit('No direct script acces allowed');
/**
 * 
 */
class ContohModel extends CI_model
{
	// INPUT DATA
	function add_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	// MENAMPILKAN DATA
	function tampil_data(){
		return $this->db->get('tabel_contoh');
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
	function updateData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}