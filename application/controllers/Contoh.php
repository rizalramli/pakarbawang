<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Contoh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("contohModel");
    }
    public function index()
    {
        // VARIABEL UTK MENAMPILKAN DATA
        $data['contoh'] = $this->contohModel->tampil_data()->result();

        // PANGGIL TEMPLATE DI VIEW
        $this->load->view('template/head&navbar');
        $this->load->view('template/sidebar&menu');
        // LOAD VARIABEL DATA YG DI LINE 14
        $this->load->view('admin/contoh/tabel_contoh', $data);
        $this->load->view('template/foot');
    }
    public function formContoh()
    {
        // PANGGIL TEMPLATE DI VIEW
        $this->load->view('template/head&navbar');
        $this->load->view('template/sidebar&menu');
        $this->load->view('admin/contoh/form_contoh');
        $this->load->view('template/foot');
    }
    // METHOD AKSI TAMBAH DATA
    public function tambahData()
    {
        // AMBIL DATA DARI FORM CONTOH
        $id = $this->input->post('id'); //objek model
        $nama = $this->input->post('nama');
        $jenisKelamin = $this->input->post('jenisKelamin');
        // INPUT DATA KE TABEL
        $data = array(
            'contoh_id' => $id,
            'contoh_nama' => $nama,
            'contoh_jenis_kelamin' => $jenisKelamin
        );
        // LOAD MODEL CONTOH YG BERISI QUERY BUILDER INSERT
        $this->contohModel->add_data($data, 'tabel_contoh');
        // JIKA BERHASIL
        redirect('Contoh/');
    }
    public function hapusContoh($contoh_id)
    {
        $where = array('contoh_id' => $contoh_id);
        $this->contohModel->hapusData($where, 'tabel_contoh');
        redirect('Contoh/');
    }
    public function editContoh($contoh_id)
    {
        $where = array('contoh_id' => $contoh_id);
        $data['contoh'] = $this->contohModel->editData($where, 'tabel_contoh')->result();
        $this->load->view('template/head&navbar');
        $this->load->view('template/sidebar&menu');
        $this->load->view('admin/contoh/edit_contoh', $data);
        $this->load->view('template/foot');
    }
    public function updateData()
    {
        // AMBIL DATA DARI FORM CONTOH
        $id = $this->input->post('id'); //objek model
        $nama = $this->input->post('nama');
        $jenisKelamin = $this->input->post('jenisKelamin');
        // INPUT DATA KE TABEL
        $data = array(
            'contoh_id' => $id,
            'contoh_nama' => $nama,
            'contoh_jenis_kelamin' => $jenisKelamin
        );

        // MASUKAN VARIABEL ID DARI LINE 77
        $where = array(
            'contoh_id' => $id
        );
        $this->contohModel->updateData($where, $data, 'tabel_contoh');
        redirect('Contoh/');
    }
}
