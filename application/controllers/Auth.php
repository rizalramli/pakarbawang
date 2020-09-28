<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("Login/"));
		}
		$this->load->model("Komplain_model");
	}

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
	public function index()
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
		$this->load->view('index');
		$this->load->view('template/foot');
	}
}
