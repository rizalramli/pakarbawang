<?php
defined('BASEPATH') or exit('No direct script acces allowed');
/**
 * 
 */
class Konsultasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("Login/"));
		}
		$this->load->model("Konsultasi_model");
		$this->load->model("Penyakit_model");
		$this->load->model("Komplain_model");
	}
	public function print()
	{
		$data['konsultasi'] = $this->Konsultasi_model->tampil_data()->result();
		$this->load->view('admin/konsultasi/print', $data);
	}
	public function index()
	{
		// UPDATE STATUS NOTIF BARU KE LAMA
		$data = array(
			'notif' => 'lama'
		);
		$where = array(
			'notif' => 'baru'
		);
		$this->Konsultasi_model->updateData($where, $data, 'konsultasi');

		$data['konsultasi'] = $this->Konsultasi_model->tampil_data()->result();
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
		$this->load->view('admin/konsultasi/tabel_konsultasi', $data);
		$this->load->view('template/foot');
	}
	public function tampilpenyakit()
	{
		$data['penyakit'] = $this->Penyakit_model->tampil_data()->result();
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
		$this->load->view('admin/penyakit/tabel_penyakit', $data);
		$this->load->view('template/foot');
	}
	public function lihat()
	{
		$data['konsultasi'] = $this->Konsultasi_model->tampil_data()->result();
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
		$this->load->view('admin/konsultasi/detail_form', $data);
		$this->load->view('template/foot');
	}
	public function detail($id = null)
	{
		if (!isset($id)) redirect('Admin/konsultasi'); //redirect jika tidak ada $id
		$konsultasi = $this->Konsultasi_model; //objek model
		$validation = $this->form_validation; //objek validation
		$validation->set_rules($konsultasi->rules()); //menerapkan rules
		if ($validation->run()) { //melakukan va;idasi
			$konsultasi->update(); //menyimpan data
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}
		$data["konsultasi"] = $konsultasi->getById($id); //mengambil data untuk ditampilkan pada form
		if (!$data["konsultasi"]) show_404(); //jika tidak ada data, tampilkan error 404
		$this->load->view("admin/konsultasi/detail_form", $data); //menampilkan form edit
	}
	public function hapusData($id)
	{
		$where = array('id_konsultasi' => $id);
		$this->Konsultasi_model->hapusData($where, 'konsultasi');
		redirect('Konsultasi');
	}
	public function edit()
	{
		$data = array(
			'tgl_user' => $this->input->post('tanggal'),
			'Nm_user' => $this->input->post('namauser'),
			'umur' => $this->input->post('umur'),
			'Nm_alamat' => $this->input->post('alamat'),
			'Nm_penyakit' => $this->input->post('nama_penyakit'),
			'Nilai' => $this->input->post('nilai'),
		);

		// MASUKAN VARIABEL ID DARI LINE 77
		$where = array(
			'id_konsultasi' => $this->input->post('idkonsultasi')
		);
		$this->Konsultasi_model->updateData($where, $data, 'konsultasi');
		redirect('Konsultasi');
	}
}
