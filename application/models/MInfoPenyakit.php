<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MInfoPenyakit extends CI_Model
{

	public function getWhere($where, $table)
	{
		$this->db->distinct();
		$this->db->select('Kd_penyakit');
		$this->db->select('Nm_penyakit');
		$this->db->select('foto');
		$this->db->select('Definisi	');
		$this->db->select('kategori');
		$this->db->select('Saran');
		return $this->db->get_where($table, $where);
	}
}
                        
/* End of file mInfoPenyakit.php */
