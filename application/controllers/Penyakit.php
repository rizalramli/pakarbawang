<?php
defined('BASEPATH') or exit('No direct script acces allowed');
/**
 * 
 */
class Penyakit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("Login/"));
		}
		$this->load->model("Penyakit_model");
		$this->load->model("Gejala_model");
		$this->load->library('form_validation');
		$this->load->model("Komplain_model");
	}

	public function ubah($id_penyakit)
	{
		// NOTIF
		$where = array('notif' => 'baru');
		// KOMPLAIN
		$data['jml_komplain'] = $this->Komplain_model->editData($where, "komplain")->num_rows();
		$data['data_komplain'] = $this->Komplain_model->editData($where, "komplain")->result();
		// RIWAYAT
		$data['jml_riwayat'] = $this->Komplain_model->editData($where, "konsultasi")->num_rows();
		$data['data_riwayat'] = $this->Komplain_model->editData($where, "konsultasi")->result();
		// TOTAL JML KOMPLAIN DAN RIWAYAT
		$data['total'] = $data['jml_komplain'] + $data['jml_riwayat'];

		// MENAMPILKAN DATA
		$where = array('id_penyakit' => $id_penyakit);
		$data['penyakit'] = $this->Penyakit_model->editData($where, "v_hamapenyakit")->result();
		$data['gejalaberdasarkanpenyakit'] = $this->Gejala_model->tampil_data()->result();

		// PANGGIL TEMPLATE DI VIEW
		$this->load->view('template/head&navbar', $data);
		$this->load->view('template/sidebar&menu', $data);
		$this->load->view('admin/penyakit/edit_penyakit', $data);
		$this->load->view('template/foot');
	}

	public function baruTambahPenyakit()
	{
		$where = array(
			'Kd_penyakit' => $this->input->post('kode')
		);
		$dataPenyakit = $this->Penyakit_model->editData($where, "hamapenyakit")->num_rows();

		// CEK KODE SUDAH ADA / TDK
		if ($dataPenyakit > 0) {
			$this->session->set_flashdata('kodeSama', '<div style="color:red;"><b>Kode penyakit ' . $this->input->post('kode') . ' sudah ada!</b></div>');
			redirect('Penyakit/formTambahPenyakit');
		} else {
			// KONNDISI JIKA KODE GEJALA KOSONG
			if ($this->input->post('gejala') == '') {
				$this->session->set_flashdata('gejalaKosong', '<div style="color:red;"><b>Mohon isi gejala minimal 1</b></div>');
				redirect('Penyakit/formTambahPenyakit');
			} else {
				// DATA INPUTAN DARI FORM
				$kode_penyakit = $this->input->post('kode');
				$nama_hama_penyakit = $this->input->post('namapenyakit');
				$definisi = $this->input->post('Definisi');
				$saran = $this->input->post('Saran');
				$kode_gejala = $this->input->post('gejala');
				$kategori = $this->input->post('kategori');

				// CONFIG UPLOAD GAMBAR
				$config['upload_path']          = APPPATH . '../upload/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 9999;

				$this->load->library('upload', $config);

				// KONDISI TIDAK UPLOAD GAMBAR
				if (!$this->upload->do_upload('pic_file')) {
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				} else {
					$upload_data = $this->upload->data();
					$dataFoto['pic_file'] = $upload_data['file_name'];

					// PERULANGAN UTK MENAMPUNG DATA
					$data = array();
					$index = 0;
					foreach ($kode_gejala as $kd_gejala) {
						array_push($data, array(
							'Kd_penyakit' => $kode_penyakit,
							'Nm_penyakit' => $nama_hama_penyakit,
							'kategori' => $kategori,
							'Definisi' => $definisi,
							'Kd_gejala' => $kd_gejala,
							'Saran' => $saran,
							'foto' => $dataFoto['pic_file']
						));
						$index++;
					}

					// GUNAKAN INSERT MULTIPLE
					$sql = $this->Penyakit_model->save_batch($data);
					redirect('Penyakit');
				}
			}
		}
	}

	public function formTambahPenyakit()
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
		$this->load->view('admin/penyakit/tambah_penyakit', $data);
		$this->load->view('template/foot');
	}

	public function baruEdit()
	{
		// MENAMPILKAN DATA PENYAKIT YG DI EDIT
		$where = array('id_penyakit' => $this->input->post('id_penyakit'));
		$whereNamaPenyakit = array(
			'Kd_penyakit' => $this->input->post('kode_penyakit')
		);
		$dataPenyakit = $this->Penyakit_model->editData($where, "hamapenyakit")->result();
		foreach ($dataPenyakit as $penyakit);

		// CONFIG UPLOAD GAMBAR
		$config['upload_path']          = APPPATH . '../upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 9999;
		$this->load->library('upload', $config);

		if ($this->input->post('kategori') == $penyakit->kategori) {

			// KONDISI FOTO BERUBAH ATAU TIDAK
			if (!$this->upload->do_upload('pic_file')) {

				// DATA TDK BERUBAH
				$dataTidakBisaDiEdit = array(
					'Kd_penyakit' => $this->input->post('kode_penyakit'),
					'Nm_penyakit' => $this->input->post('namapenyakit'),
					'Definisi' => $this->input->post('Definisi'),
					'Kd_gejala' => $this->input->post('kode_gejala_tidak_diubah'),
					'Saran' => $this->input->post('Saran'),
					'kategori' => $penyakit->kategori,
					'foto' => $penyakit->foto
				);
				$this->Penyakit_model->updateData($where, $dataTidakBisaDiEdit, 'hamapenyakit');
				// redirect('Penyakit');
			} else {

				// KATEGORI TTP, FOTO BERUBAH
				// UPLOAD FOTO
				$upload_data = $this->upload->data();
				$dataFoto['pic_file'] = $upload_data['file_name'];

				// TAMPUNG DATA DI ARRAY DAN SIMPAN
				$foto = array(
					'foto' => $dataFoto['pic_file']
				);

				$this->Penyakit_model->updateData($whereNamaPenyakit, $foto, 'hamapenyakit');
				// redirect('Penyakit');
			}
		} else {

			// KONDISI FOTO BERUBAH ATAU TIDAK
			if (!$this->upload->do_upload('pic_file')) {

				$kategoriBerubahFotoTetap = array(
					'Kd_penyakit' => $this->input->post('kode_penyakit'),
					'Nm_penyakit' => $this->input->post('namapenyakit'),
					'Definisi' => $this->input->post('Definisi'),
					'Kd_gejala' => $this->input->post('kode_gejala_tidak_diubah'),
					'Saran' => $this->input->post('Saran'),
					'kategori' => $this->input->post('kategori'),
					'foto' => $penyakit->foto
				);
				$this->Penyakit_model->updateData($whereNamaPenyakit, $kategoriBerubahFotoTetap, 'hamapenyakit');
				// redirect('Penyakit');
			} else {
				// UPLOAD FOTO
				$upload_data = $this->upload->data();
				$dataFoto['pic_file'] = $upload_data['file_name'];

				// TAMPUNG DATA DI ARRAY DAN SIMPAN
				$kategoriBerubahFotoBerubah = array(
					'Kd_penyakit' => $this->input->post('kode_penyakit'),
					'Nm_penyakit' => $this->input->post('namapenyakit'),
					'Definisi' => $this->input->post('Definisi'),
					'Kd_gejala' => $this->input->post('kode_gejala_tidak_diubah'),
					'Saran' => $this->input->post('Saran'),
					'kategori' => $this->input->post('kategori'),
					'foto' => $dataFoto['pic_file']
				);
				$this->Penyakit_model->updateData($whereNamaPenyakit, $kategoriBerubahFotoBerubah, 'hamapenyakit');
			}
		}

		// KONDISI UBAH GEJALA
		if ($this->input->post('kdgejala') == $penyakit->Kd_gejala) {
			$dataGejalaTetap = array(
				'Kd_gejala' => $this->input->post('kdgejala_tetap')
			);
			// print_r($dataGejalaTetap);
			$this->Penyakit_model->updateData($where, $dataGejalaTetap, 'hamapenyakit');
		} else {
			$dataGejalaBerubah = array(
				'Kd_gejala' => $this->input->post('kdgejala')
			);
			// print_r($dataGejalaBerubah);
			$this->Penyakit_model->updateData($where, $dataGejalaBerubah, 'hamapenyakit');
		}

		redirect('Penyakit');
	}

	public function edit()
	{
		$id_penyakit = $this->input->post('id_penyakit');

		// KONNDISI JIKA KODE GEJALA KOSONG
		if ($this->input->post('kdgejala') == '') {
			echo 'Gejala belum di pilih';
		} else {
			// DATA UNTUK UPDATE BERDASARKAN NAMA & ID PENYAKIT
			$where = array(
				'Nm_penyakit' => $this->input->post('namapenyakit'),
				'id_penyakit' => $this->input->post('id_penyakit')
			);

			// DATA UNTUK UPDATE BERDASARKAN NAMA PENYAKIT
			$whereKategori = array(
				'Nm_penyakit' => $this->input->post('namapenyakit')
			);

			// CONFIG UPLOAD GAMBAR
			$config['upload_path']          = APPPATH . '../upload/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 9999;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('pic_file')) {
				echo 'Masukan foto';
			} else {
				$upload_data = $this->upload->data();
				$data['pic_file'] = $upload_data['file_name'];
				$this->Penyakit_model->store_pic_data($data);
				redirect('Penyakit');
			}
			$data = array(
				'Nm_penyakit' => $this->input->post('namapenyakit'),
				'Definisi' => $this->input->post('Definisi'),
				'Kd_gejala' => $this->input->post('kdgejala'),
				'Saran' => $this->input->post('Saran')
			);
			$dataFoto = array('foto' => $this->input->post('pic_file'));
			$dataKategori = array(
				'kategori' => $this->input->post('kategori')
			);
			$this->Penyakit_model->updateData($whereKategori, $dataFoto, 'hamapenyakit');
			$this->Penyakit_model->updateData($where, $data, 'hamapenyakit');
			$this->Penyakit_model->updateData($whereKategori, $dataKategori, 'hamapenyakit');
			redirect('Penyakit');
		}
	}

	public function file_data()
	{
		$data['kode'] = $this->input->post('kode', TRUE);
		$data['namapenyakit'] = $this->input->post('namapenyakit', TRUE);
		$data['Definisi'] = $this->input->post('Definisi', TRUE);
		$data['Gejala'] = $this->input->post('Gejala', TRUE);
		$data['Saran'] = $this->input->post('Saran', TRUE);

		$whereNamaPenyakit = array('Nm_penyakit' => $this->input->post('namapenyakit'));
		$hitung = $this->Penyakit_model->editData("penyakit", $whereNamaPenyakit)->num_rows();
		if ($hitung > 0) {
			echo 'nama penyakit sudah ada';
		} else {
			$config['upload_path']          = APPPATH . '../upload/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 9999;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('pic_file')) {
				echo 'Masukan foto';
			} else {
				$upload_data = $this->upload->data();
				$data['pic_file'] = $upload_data['file_name'];
				$this->Penyakit_model->store_pic_data($data);
				redirect('Penyakit');
			}
		}
	}
	public function index()
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
	public function tampilgejala()
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
		$this->load->view('admin/penyakit/new_form', $data);
		$this->load->view('template/foot');
	}
	public function add_penyakit()
	{
		$kodepenyakit = $this->input->post('kode'); //objek model
		$namapenyakit = $this->input->post('namapenyakit');
		$namalatin = $this->input->post('namalatin');
		$definisi = $this->input->post('Definisi');
		$gejala = $this->input->post('Gejala');
		$saran = $this->input->post('Saran');
		$data = array(
			'Kd_penyakit' => $kodepenyakit,
			'Nm_penyakit' => $namapenyakit,
			'Definisi' => $definisi,
			'Gejala' => $gejala,
			'Saran' => $saran
		);
		$this->Penyakit_model->input_data($data, 'penyakit');
		redirect('Penyakit');
	}
	public function delete($id = null)
	{
		if (!isset($id)) show_404();
		if ($this->penyakit_model->delete($id)) {
			redirect(site_url('Admin/penyakit'));
		}
	}
}
