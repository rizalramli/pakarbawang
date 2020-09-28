<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infopenyakit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("MInfoPenyakit");
	}

	public function index($Kd_penyakit)
	{
		$where = array('Kd_penyakit' => $Kd_penyakit);
		$data['infopenyakit'] = $this->MInfoPenyakit->getWhere($where, 'v_hamapenyakit')->result(); // query menampilkan data dr beberapa penyakit
		$this->load->view('User/infopenyakit', $data);
	}
}
