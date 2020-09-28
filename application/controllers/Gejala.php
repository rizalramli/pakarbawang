<?php
defined('BASEPATH') or exit('No direct script acces allowed');
/**
 * 
 */
class Gejala extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("Login/"));
		}
		$this->load->model("Gejala_model");
		$this->load->model("Komplain_model");
	}

	public function edit()
	{
		$data = array(
			'Nm_gejala' => $this->input->post('namagejala'),
			'Nilai_CF' => $this->input->post('nilai')
		);
		$where = array(
			'Kd_gejala' => $this->input->post('kodegejala')
		);
		$this->Gejala_model->updateData($where, $data, 'gejala');
		redirect('Gejala');
	}

	public function index()
	{
		$data['gejala'] = $this->Gejala_model->tampil_data()->result();
		$where = array('notif' => 'baru');
		// KOMPLAIN
		$data['jml_komplain'] = $this->Komplain_model->editData($where, "komplain")->num_rows();
		$data['data_komplain'] = $this->Komplain_model->editData($where, "komplain")->result();
		// RIWAYAT
		$data['jml_riwayat'] = $this->Komplain_model->editData($where, "konsultasi")->num_rows();
		$data['data_riwayat'] = $this->Komplain_model->editData($where, "konsultasi")->result();
		// TOTAL JML KOMPLAIN DAN RIWAYAT
		$data['total'] = $data['jml_komplain'] + $data['jml_riwayat'];
		// PANGGIL TEMPLATE DI VIEW
		$this->load->view('template/head&navbar', $data);
		$this->load->view('template/sidebar&menu', $data);
		$this->load->view('admin/gejala/tabel_gejala', $data);
		$this->load->view('template/foot');
	}

	public function add()
	{
		$where = array('notif' => 'baru');
		// KOMPLAIN
		$data['jml_komplain'] = $this->Komplain_model->editData($where, "komplain")->num_rows();
		$data['data_komplain'] = $this->Komplain_model->editData($where, "komplain")->result();
		// RIWAYAT
		$data['jml_riwayat'] = $this->Komplain_model->editData($where, "konsultasi")->num_rows();
		$data['data_riwayat'] = $this->Komplain_model->editData($where, "konsultasi")->result();
		// TOTAL JML KOMPLAIN DAN RIWAYAT
		$data['total'] = $data['jml_komplain'] + $data['jml_riwayat'];
		// PANGGIL TEMPLATE DI VIEW
		$this->load->view('template/head&navbar', $data);
		$this->load->view('template/sidebar&menu', $data);
		$this->load->view('admin/gejala/new_form');
		$this->load->view('template/foot');
	}
	public function add_gejala()
	{
		$whereNamaGejala = array('Kd_gejala' => $this->input->post('kodegejala'));
		$hitung = $this->Gejala_model->editData("gejala", $whereNamaGejala)->num_rows(); // query menampilkan data berdasarkan kode gejala dijadikan nomer
		if ($hitung > 0) {
			$this->session->set_flashdata('kodeSama', '<div style="color:red;"><b>Kode gejala ' . $this->input->post('kodegejala') . ' sudah ada!</b></div>');
			redirect('Gejala');
		} else {
			$kodegejala = $this->input->post('kodegejala'); //objek model
			$namagejala = $this->input->post('namagejala');
			$nilaicf = $this->input->post('nilaicf');
			$data = array( //menampung data
				'Kd_gejala' => $kodegejala,
				'Nm_gejala' => $namagejala,
				'Nilai_CF' => $nilaicf

			);
			$this->Gejala_model->input_data($data, 'gejala');
			redirect('Gejala');
		}
	}
	public function delete($id = null)
	{
		if (!isset($id)) show_404();
		if ($this->gejala_model->delete($id)) {
			redirect(site_url('Admin/gejala'));
		}
	}
}
