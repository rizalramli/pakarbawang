<?php defined('BASEPATH') or exit('No direct script acces allowed');


/**
 * 
 */
class Penyakit_model extends CI_model
{
	public function save_batch($data)
	{
		return $this->db->insert_batch('hamapenyakit', $data);
	}
	function updatePenyakit($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function baruSimpanPenyakit($data)
	{
		$insert_data['Kd_penyakit'] = $data['kode'];
		$insert_data['Nm_penyakit'] = $data['namapenyakit'];
		$insert_data['Definisi'] = $data['Definisi'];
		$insert_data['Saran'] = $data['Saran'];
		$insert_data['foto'] = $data['pic_file'];
	}

	//save picture data to db
	function store_pic_data($data)
	{
		$insert_data['Kd_penyakit'] = $data['kode'];
		$insert_data['Nm_penyakit'] = $data['namapenyakit'];
		$insert_data['Definisi'] = $data['Definisi'];
		$insert_data['Saran'] = $data['Saran'];
		$insert_data['foto'] = $data['pic_file'];

		$query = $this->db->insert('hamapenyakit', $insert_data);
	}

	public function tampilSemuaData()
	{
		$this->db->distinct();
		$this->db->select('Kd_penyakit');
		$this->db->select('Nm_penyakit');
		$this->db->select('foto');
		return $this->db->get("hamapenyakit");
	}

	function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function tampil_data()
	{
		return $this->db->get('v_hamapenyakit');
	}
	function save()
	{
		$kodepenyakit = $this->input->post('kodepenyakit'); //objek model
		$namapenyakit = $this->input->post('namapenyakit');
		$namalatin = $this->input->post('namalatin');
		$definisi = $this->input->post('definisi');

		$data = array(
			'kodepenyakit' => $kodepenyakit,
			'namapenyakit' => $namapenyakit,
			'namalatin' => $namalatin,
			'definisi' => $definisi
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
		// $this->db->distinct();
		// $this->db->select('Kd_penyakit');
		// $this->db->select('Nm_penyakit');
		// $this->db->select('foto');
		// $this->db->select('Definisi');
		// $this->db->select('Kd_gejala');
		// $this->db->select('Gejala');
		// $this->db->select('Saran');
		return $this->db->get_where($table, $where);
	}

	function updateData($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function getALlByInGejala($whereIn = array())
	{
		$this->db->select("hamapenyakit.*,gejala.Nilai_CF")->from("hamapenyakit");
		$this->db->join("gejala", "hamapenyakit.Kd_gejala = gejala.Kd_gejala");
		$this->db->where_in("hamapenyakit.Kd_gejala", $whereIn);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return FALSE;
	}
	public function getALlBy($whereIn = array())
	{
		$this->db->select("hamapenyakit.*,gejala.Nilai_CF")->from("hamapenyakit"); //memilih
		$this->db->join("gejala", "hamapenyakit.Kd_gejala = gejala.Kd_gejala"); //menggabungkan
		// $this->db->where_in("hamapenyakit.Kd_gejala",$whereIn);  

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return FALSE;
	}
}
