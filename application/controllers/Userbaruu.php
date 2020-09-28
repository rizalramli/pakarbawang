
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userbaruu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Bantuan_model");
		$this->load->model("Gejala_model");
		$this->load->model("Identifikasi_model");
		$this->load->model("Tentang_model");
		$this->load->model("Form_konsultasi_gejala_model");
		$this->load->model("Penyakit_model");
	}

	public function tambahFormKonsultasiGejala()
	{
		$nama_user = $this->input->post('user');
		$kd = $this->input->post('kd');
		$nilai = $this->input->post('Nilai');

		$data = array(
			'Kd_gejala' => $kd,
			'nilai' => $nilai,
			'nama_user' => $nama_user
		);

		$this->Form_konsultasi_gejala_model->input_data($data, 'nilai_gejala_user');
		redirect('Userbaruu/konsultasi');
	}

	public function form_konsultasi_gejala()
	{
		$nama_user_login = array(
			'nama_user' => $this->session->userdata("nama")
		);
		$data['konsultasi_gejala'] = $this->Form_konsultasi_gejala_model->getWhere("v_gejala", $nama_user_login)->result();
		$this->load->view('user/form_konsultasi_gejala', $data);
	}

	public function index()
	{
		$data['penyakit'] = $this->Penyakit_model->tampilSemuaData()->result();
		$data['tentang'] = $this->Tentang_model->tampil_data()->result();
		# code.// PANGGIL TEMPLATE DI VIEW
		$this->load->view('User/index', $data);
	}
	public function tentang()
	{
		$data['tentang'] = $this->Tentang_model->tampil_data()->result();
		$this->load->view('User/tentang', $data);
	}

	public function tambahGejalaKonsultasi()
	{
		if ($this->input->post('gejala') == '') {
			$this->session->set_flashdata('gejalaKosong', '<div style="color:red"><b>Mohon, Pilih minimal 1 gejala !<b></div>');
			redirect('Userbaruu/konsultasi');
		} else {
			$nama_gejala = $this->input->post('gejala');
			$nama_user = $this->input->post('username');
			$data = array(); //menampung data array
			$index = 0; // Set index array awal dengan 0, index digunakan krn menyimpan lbh 1 data
			foreach ($nama_gejala as $nm_gjl) { // Kita buat perulangan berdasarkan gejala yang dipilih
				array_push($data, array(
					'Kd_gejala' => $nm_gjl,
					'nama_user' => $nama_user  // Ambil dan set data nama sesuai index array dari $index
				));
				$index++;
			}
			$sql = $this->Form_konsultasi_gejala_model->save_batch($data);
			redirect("Userbaruu/form_konsultasi_gejala");
		}
	}

	public function info()
	{
		$data['penyakit'] = $this->Penyakit_model->tampilSemuaData()->result();
		$this->load->view('User/info', $data);
	}
	public function konsultasi()
	{
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("Login/"));
		}
		$where = array('nama_user' => $this->session->userdata("nama"));
		$this->Form_konsultasi_gejala_model->hapus_data($where, 'gejala_konsultasi');
		$data['gejala'] = $this->Gejala_model->tampil_data()->result();
		$this->load->view('User/konsultasi', $data);
	}
	public function contact()
	{
		$this->load->view('User/contact');
	}
	public function tabel_bantuan()
	{
		$data['bantuan'] = $this->Bantuan_model->tampil_data()->result();
		$this->load->view('User/tabel_bantuan', $data);
	}
}
