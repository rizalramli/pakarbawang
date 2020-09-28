<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tabelgejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') !="login"){
            redirect(base_url("Login"));
        }
        $this->load->model("Gejala_model");
		$this->load->model("Komplain_model");
    }
    public function index()
    {
        // VARIABEL UTK MENAMPILKAN DATA
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
        // LOAD VARIABEL DATA YG DI LINE 14
        $this->load->view('admin/gejala/tabel_gejala', $data);
        $this->load->view('template/foot');
    }
    public function formTabelgejala()
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
        $this->load->view('gejala/form_gejala');
        $this->load->view('template/foot');
    }
    // METHOD AKSI TAMBAH DATA
    public function tambahData()
    {
        // AMBIL DATA DARI FORM CONTOH
        $kodegejala = $this->input->post('kodegejala'); //objek model
        $namagejala = $this->input->post('namagejala');
        $nilaicf = $this->input->post('nilaicf');
        // INPUT DATA KE TABEL
        $data = array(
            'gejala_kodegejala' => $kodegejala,
            'gejala_namagejala' => $namagejala,
            'nilaicf' => $nilaicf
        );
        // LOAD MODEL CONTOH YG BERISI QUERY BUILDER INSERT
        $this->Gejala_model->input_data($data, 'tabel_gejala');
        // JIKA BERHASIL
        redirect('Tabelgejala');
    }
    public function hapusContoh($gejala_kodegejala)
    {
        $where = array('Kd_gejala' => $gejala_kodegejala);
        $this->Gejala_model->hapusData($where, 'gejala');
        redirect('Tabelgejala');
    }
    public function editTabelgejala($gejala_kodegejala)
    {
        $where = array('Kd_gejala' => $gejala_kodegejala);
        $data['gejala'] = $this->Gejala_model->editData($where, 'gejala')->result();
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
        $this->load->view('admin/gejala/edit_form', $data);
        $this->load->view('template/foot');
    }
    public function updateData()
    {
        // AMBIL DATA DARI FORM CONTOH
        $kodegejala = $this->input->post('kode_gejala'); //objek model
        $namagejala = $this->input->post('nama_gejala');
        $nilaicf = $this->input->post('nilaicf');
        // INPUT DATA KE TABEL
        $data = array(
            'Kd_gejala' => $kodegejala,
            'Nm_gejala' => $namagejala,
            'Nilai_CF' => $nilaicf
        );
        
        // MASUKAN VARIABEL ID DARI LINE 77
        $where = array(
            'Kd_gejala' => $kodegejala
        );
        $this->Gejala_model->updateData($where, $data, 'gejala');
        redirect('Tabelgejala');
    }
}