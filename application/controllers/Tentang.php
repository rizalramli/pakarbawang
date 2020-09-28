<?php
defined('BASEPATH') or exit('No direct script acces allowed');
/**
 * 
 */
class Tentang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') !="login"){
			redirect(base_url("Login"));
		}
		$this->load->model("Tentang_model");
		$this->load->model("Komplain_model");
	}
	public function index()
	{
		$data['tentang'] = $this->Tentang_model->tampil_data()->result();
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
		$this->load->view('admin/tentang/tabel_tentang', $data);
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
		$this->load->view('admin/tentang/new_form');
		$this->load->view('template/foot');
	}
	public function add_tentang()
	{
		$namatentang = $this->input->post('namatentang'); //objek model
		$data = array(
			'Nm_tentang' => $namatentang
		);
		$this->Tentang_model->input_data($data, 'tentang');
		redirect('Tentang');
	}
	public function get_where()
	{
		$data['tentang'] = $this->Tentang_model->tampil_data()->result();
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
		$this->load->view("admin/tentang/edit_form", $data); //menampilkan form edit
		$this->load->view('template/foot');
	}
	public function edit()
	{
		// AMBIL DATA DARI FORM CONTOH
		$id_tentang = $this->input->post('id_tentang'); //objek model
		$nama_tentang = $this->input->post('nama_tentang');
		// INPUT DATA KE TABEL
		$data = array(
			'Nm_tentang' => $nama_tentang
		);

		// MASUKAN VARIABEL ID DARI LINE 77
		$where = array(
			'id_tentang' => $id_tentang
		);
		$this->Tentang_model->updateData($where, $data, 'tentang');
		redirect('Tentang');
	}
    public function hapusContoh($id_tentang)
    {
        $where = array('id_tentang' => $id_tentang);
        $this->Tentang_model->hapusData($where, 'tentang');
        redirect('Tentang');
    }
}
