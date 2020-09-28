<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') !="login"){
			redirect(base_url("Login"));
		}
		$this->load->model("ProfilModel");
		$this->load->model("Komplain_model");
	}

	public function index()
	{
		$data['profil'] = $this->ProfilModel->tampil_data()->result();
		// PANGGIL TEMPLATE DI VIEW
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
		$this->load->view('profil', $data);
		$this->load->view('template/foot');
	}
	public function updateData()
	{
		// INPUT DATA KE TABEL
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tgl_lahir' => $this->input->post('tanggal_lahir'),
			'nmr_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
		);

		// MASUKAN VARIABEL ID DARI LINE 77
		$where = array(
			'id_profil' => $this->input->post('id')
		);
		$this->ProfilModel->updateData($where, $data, 'profil');
		redirect('Profil');
	}
}
