<?php defined('BASEPATH') or exit('No direct script acces allowed');


/**
 * 
 */
class Bantuan_model extends CI_model
{
	
	//save picture data to db
	function store_pic_data($data){
		$insert_data['kategori'] = $data['kategori'];
		$insert_data['deskripsi'] = $data['deskripsi'];
		$insert_data['foto'] = $data['pic_file'];

		$query = $this->db->insert('bantuan', $insert_data);
	}

	function add_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function tampil_data()
	{
		return $this->db->get('bantuan');
	}
	public function editData($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	function updateData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
	public function hapusData($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
