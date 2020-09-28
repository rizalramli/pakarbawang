<?php defined('BASEPATH') or exit('No direct script acces allowed');


/**
 * 
 */
class Konsultasi_model extends CI_model
{
	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function tampil_data()
	{
		return $this->db->get('konsultasi');
	}
	function save()
	{
		$tanggal = $this->input->post('tanggal'); //objek model
		$namapengguna = $this->input->post('namapengguna');
		$umur = $this->input->post('umur');
		$alamat = $this->input->post('alamat');
		$hasildiagnosa = $this->input->post('hasildiagnosa');
		$nilaicf = $this->input->post('nilaicf');

		$data = array(
			'tanggal' => $tanggal,
			'namapengguna' => $namapengguna,
			'umur' => $umur,
			'alamat' => $alamat,
			'hasildiagnosa' => $hasildiagnosa,
			'nilaicf' => $nilaicf
		);
		$this->db->insert('admin', $data);
	}

	public function detailData($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function hapusData($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function updateData($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
