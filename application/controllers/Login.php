<?php

/**
 * 
 */
class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('User/login');
	}

	public function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->M_login->cek_login("admin", $where)->num_rows();
		if ($cek > 0) {

			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			$where_role_yang_login = array(
				'username' => $username,
				'password' => $password
			);
			$data_role_yg_login = $this->M_login->cek_login("admin", $where_role_yang_login)->result();
			foreach ($data_role_yg_login as $data) {
				if ($data->role == 'User') {
					redirect(base_url("Userbaruu/konsultasi"));
				} else {
					redirect(base_url("Auth"));
				}
			}
		} else {
			echo "Username dan Password Salah !";
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Userbaruu/index');
	}

	public function register()
	{
		$this->load->view('User/register');
	}

	public function tambahRegister()
	{
		$whereUsername = array('username' => $this->input->post('username'));
		$hitung = $this->M_login->editData("admin", $whereUsername)->num_rows();
		if ($hitung > 0) {
			echo 'Username sudah ada!';
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array(
				'username' => $username,
				'password' => $password,
				'role' => 'User'
			);

			$this->M_login->input_data($data, 'admin');
			redirect('Login');
		}
	}
}
