<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bantuan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("Login/"));
		}
		$this->load->model("Bantuan_model");
		$this->load->model("Komplain_model");
	}
	public function edit()
	{
		$id = $this->input->post('id'); //objek model
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
		// konfigurasi upload foto
		$config['upload_path']          = APPPATH . '../upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 9999;
		$this->load->library('upload', $config);
		// kondisi jika update foto
		if ($this->upload->do_upload('pic_file')) {
			$upload_data = $this->upload->data();
			$data['pic_file'] = $upload_data['file_name'];
			$data = array(
				'kategori' => $kategori,
				'deskripsi' => $deskripsi,
				'foto' => $data['pic_file']
			);
		} else {
			$data = array(
				'kategori' => $kategori,
				'deskripsi' => $deskripsi,
				'foto' => $this->input->post('foto')
			);
		}
		// proses update data
		$where = array(
			'id_bantuan' => $id
		);
		$this->Bantuan_model->updateData($where, $data, 'bantuan');
		redirect('Bantuan');
	}
	public function file_data()
	{
		$data['kategori'] = $this->input->post('kategori', TRUE);
		$data['deskripsi'] = $this->input->post('deskripsi', TRUE);
		$config['upload_path']          = APPPATH . '../upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 9999;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('pic_file')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/bantuan/test_gambar', $error);
		} else {
			$upload_data = $this->upload->data();
			$data['pic_file'] = $upload_data['file_name'];
			$this->Bantuan_model->store_pic_data($data);
			redirect('Bantuan');
		}
	}

	public function tambahBantuan()
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
		$this->load->view('admin/bantuan/tambah_bantuan');
		$this->load->view('template/foot');
	}

	public function addData()
	{
		// AMBIL DATA DARI FORM CONTOH
		$foto = $this->input->post('berkas');
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');

		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 9999999999999;
		$config['max_width']            = 9999999999999;
		$config['max_height']           = 9999999999999;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('template/head&navbar');
			$this->load->view('template/sidebar&menu');
			$this->load->view('admin/bantuan/tambah_bantuan', $error);
			$this->load->view('template/foot');
		} else {
			$data = array(
				'kategori' => $kategori,
				'deskripsi' => $deskripsi
			);
			// LOAD MODEL CONTOH YG BERISI QUERY BUILDER INSERT
			$this->Bantuan_model->add_data($data, 'bantuan');
			// JIKA BERHASIL
			redirect('Bantuan');
		}
	}
	public function index()
	{
		// PANGGIL TEMPLATE DI VIEW
		$data['bantuan'] = $this->Bantuan_model->tampil_data()->result();
		$data['title'] = 'Bantuan';
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
		$this->load->view('admin/bantuan/tabel_bantuan', $data);
		$this->load->view('template/foot');
	}
	public function cek_bantuan($id_bantuan)
	{
		$where = array('id_bantuan' => $id_bantuan);
		$data['bantuan'] = $this->Bantuan_model->editData($where, 'bantuan')->result();
		$data['title'] = 'Bantuan';
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
		$this->load->view('admin/bantuan/cek_bantuan', $data);
		$this->load->view('template/foot');
	}
	public function hapusContoh($id)
	{
		$where = array('id_bantuan' => $id);
		$this->Bantuan_model->hapusData($where, 'bantuan');
		redirect('Bantuan');
	}
}
