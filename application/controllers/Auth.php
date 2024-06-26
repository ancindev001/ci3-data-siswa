<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin', 'admin');
	}

	function login()
	{
		if ($this->session->userdata('admin')) {
			redirect('/siswa');
			return;
		}
		$this->load->view('partials/header');
		$this->load->view('auth/login');
		$this->load->view('partials/footer');
	}
	// TODO: implement register
	private function register()
	{
		if ($this->session->userdata('admin')) {
			redirect('/siswa');
			return;
		}
		$this->load->view('partials/header');
		$this->load->view('auth/register');
		$this->load->view('partials/footer');
	}

	function logout()
	{
		unset($_SESSION['admin']);
		redirect(base_url('/auth/login'));
	}

	function dologin()
	{
		$this->load->library('form_validation');
		$rules = [
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required',
				['errors' => [
					'required' => '%s harus diisi'
				]]
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required',
				['errors' => [
					'required' => '%s harus diisi'
				]]
			]
		];
		$this->form_validation->set_rules($rules);
		if (!$this->form_validation->run()) {
			// validasi gagal
			$this->load->view('partials/header');
			$this->load->view('auth/login');
			$this->load->view('partials/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$res = $this->admin->verify($username, $password);
			if (isset($res[0])) {
				if (password_verify($password, $res[0]->password)) {
					$this->session->set_userdata('admin', $res[0]->username);
					redirect(base_url('/siswa'));
				} else {
					$this->session->set_flashdata('error_message', 'Passsword tidak cocok');
					redirect(base_url('/auth/login'));
				}
			} else {
				$this->session->set_flashdata('error_message', 'User' . $username . ' tidak ditemukan');
				redirect(base_url('/auth/login'));
			}
		}
	}
	function doregister()
	{
	}
}
