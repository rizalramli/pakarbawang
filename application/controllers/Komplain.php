<?php
defined('BASEPATH') or exit('No direct script acces allowed');
/**
 * 
 */
class Komplain extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Komplain_model");
	}

	public function edit()
	{
		$data = array(
			'nama_user' => $this->input->post('nama_user'),
			'komplain_user' => $this->input->post('komplain'),
		);
		$where = array('id_komplain' => $this->input->post('id'));
		$this->Komplain_model->updateData($where, $data, 'komplain');
		redirect('Komplain');
	}
	public function hapusData($id_komplain)
	{
		$where = array('id_komplain' => $id_komplain);
		$this->Komplain_model->hapusData($where, 'komplain');
		redirect('komplain');
	}
	public function cek_komplain($id_komplain)
	{
		$where = array('id_komplain' => $id_komplain);
		$data['komplain'] = $this->Komplain_model->editData($where, 'komplain')->result();
		$data['title'] = 'komplain';
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
		$this->load->view('admin/komplain/cek_komplain', $data);
		$this->load->view('template/foot');
	}

	public function tambah_komplain()
	{
		$username = $this->input->post('username'); //objek model
		$komplain = $this->input->post('komplain');
		$data = array( // field menampung
			'nama_user' => $username, // kiri nama fild dan kanan nama isi dari array
			'komplain_user' => $komplain,
			'notif' => 'baru'
		);
		$this->Komplain_model->input_data($data, 'komplain');
		redirect('Userbaruu/contact');
	}

	public function tambah_komplain_index()
	{
		$username = $this->input->post('username'); //objek model
		$komplain = $this->input->post('komplain');
		if ($username == '' && $komplain == '') {
			$this->session->set_flashdata('kosongSemua', '<div style="color:red"><b>Mohon untuk melengkapi form !</b></div>');
			redirect('Userbaruu/index');
		} elseif ($username == '') {
			$this->session->set_flashdata('namaKosong', '<div style="color:red"><b>Isi nama terlebih dahulu !</b></div>');
			redirect('Userbaruu/index');
		} elseif ($komplain == '') {
			$this->session->set_flashdata('saranKosong', '<div style="color:red"><b>Isi saran terlebih dahulu !</b></div>');
			redirect('Userbaruu/index');
		} else {
			$data = array(
				'nama_user' => $username,
				'komplain_user' => $komplain,
				'notif' => 'baru'
			);
			$this->Komplain_model->input_data($data, 'komplain');
			redirect('Userbaruu/index');
		}
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
		$this->Komplain_model->updateData($where, $data, 'komplain');
		
		$data['komplain'] = $this->Komplain_model->tampil_data()->result();
		$data['title'] = 'komplain';
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
		$this->load->view('admin/komplain/tabel_komplain', $data);
		$this->load->view('template/foot');
	}
}
