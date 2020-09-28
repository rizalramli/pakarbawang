<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tabelpenyakit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') !="login"){
            redirect(base_url("Login"));
        }
        $this->load->model("Penyakit_model");
		$this->load->model("Komplain_model");
    }
    public function index()
    {
        // VARIABEL UTK MENAMPILKAN DATA
        $data['penyakit'] = $this->Penyakit_model->tampil_data()->result();
        
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
        // LOAD VARIABEL DATA YG DI LINE 14
        $this->load->view('admin/penyakit/tabel_penyakit', $data);
        $this->load->view('template/foot');
    }
    public function formTabelpenyakit()
    {
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
        $this->load->view('penyakit/form_penyakit');
        $this->load->view('template/foot');
    }
    // METHOD AKSI TAMBAH DATA
    public function tambahData()
    {
        // AMBIL DATA DARI FORM CONTOH
        $kodepenyakit = $this->input->post('kodepenyakit'); //objek model
        $namapenyakit = $this->input->post('namapenyakit');
        $namalatin = $this->input->post('namalatin');
        $gejala = $this->input->post('gejala');
        $definisi = $this->input->post('definisi');
        // INPUT DATA KE TABEL
        $data = array(
            'penyakit_kodepenyakit' => $kodepenyakit,
            'penyakit_namapenyakit' => $namapenyakit,
            'penyakit_namalatin' => $namalatin,
            'penyakit_gejala' => $gejala,
            'penyakit_definisi' => $definisi
        );
        // LOAD MODEL CONTOH YG BERISI QUERY BUILDER INSERT
        $this->penyakitModel->input_data($data, 'tabel_penyakit');
        // JIKA BERHASIL
        redirect('Tabelpenyakit');
    }
    public function hapusContoh($penyakit_kodepenyakit)
    {
        $where = array('Kd_penyakit' => $penyakit_kodepenyakit);
        $this->Penyakit_model->hapusData($where, 'hamapenyakit');
        redirect('Tabelpenyakit');
    }
    public function editTabelpenyakit($penyakit_kodepenyakit)
    { 
        $where = array('Kd_penyakit' => $penyakit_kodepenyakit);
        $data['penyakit'] = $this->Penyakit_model->editData($where, 'penyakit')->result();
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
        $this->load->view('admin/penyakit/edit_form', $data);
        $this->load->view('template/foot');
    }
    public function updateData()
    {
        // AMBIL DATA DARI FORM CONTOH
        $kodepenyakit = $this->input->post('kode'); //objek model
        $namapenyakit = $this->input->post('nama_penyakit');
        $definisi = $this->input->post('definisi');
        $gejala = $this->input->post('gejala');
        $saran = $this->input->post('saran');

        // INPUT DATA KE TABEL
        $data = array(
            'Kd_penyakit' => $kodepenyakit,
            'Nm_penyakit' => $namapenyakit,
            'Definisi' => $definisi,
            'Gejala' => $gejala,
            'Saran' => $saran
        );
        
        // MASUKAN VARIABEL ID DARI LINE 77
        $where = array(
            'Kd_penyakit' => $kodepenyakit
        );
        $this->Penyakit_model->updateData($where, $data, 'penyakit');
        redirect('Tabelpenyakit');
    }
}