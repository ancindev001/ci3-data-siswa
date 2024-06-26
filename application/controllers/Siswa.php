<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Siswa', 'siswa');
	}

	public function index()
	{

		$this->load->view('partials/header');
		$siswa = $this->siswa->get_all_siswa();
		$this->load->view('siswa/index_siswa', ['siswa' => $siswa]);
		$this->load->view('partials/footer');
	}

	public function tambah_siswa()
	{
		$this->load->view('partials/header');
		$this->load->view('siswa/tambah_siswa');
		$this->load->view('partials/footer');
	}

	public function edit_siswa($id)
	{
		$data['siswa'] = $this->siswa->get_siswa((int)$id)[0];
		$this->load->view('partials/header');
		$this->load->view('siswa/edit_siswa', $data);
		$this->load->view('partials/footer');
	}

	public function simpan_siswa()
	{
		$this->load->library('form_validation'); // load library validation
		$rules = [
			[
				'field' => 'nama_siswa',
				'label' => 'Nama Siswa',
				'rules' => 'required',
				'errors' => [
					'required' => '%s harus diiisi'
				]
			],
			[
				'field' => 'alamat_siswa',
				'label' => 'Alamat Siswa',
				'rules' => 'required',
				'errors' => [
					'required' => '%s harus diiisi'
				]
			]
		];
		$this->form_validation->set_rules($rules);

		$nama_siswa = $this->input->post('nama_siswa');
		$alamat_siswa = $this->input->post('alamat_siswa');

		if ($this->form_validation->run()) {
			// success validation
			if (!$this->siswa->simpan_siswa($nama_siswa, $alamat_siswa)) {
				$this->session->set_flashdata('error_message', 'Gagal menambahkan user ' . $nama_siswa);
				$this->load->view('partials/header');
				$this->load->view('siswa/tambah_siswa');
				$this->load->view('partials/footer');
			} else {
				$this->session->set_flashdata('success_message', 'Berhasil menambahkan user ' . $nama_siswa);
				redirect(base_url('/siswa'));
			}
		} else {
			$this->load->view('partials/header');
			$this->load->view('siswa/tambah_siswa');
			$this->load->view('partials/footer');
		}
	}

	function delete_siswa($id)
	{
		if ($this->siswa->delete_siswa($id)) {
			$this->session->set_flashdata('success_message', 'Berhasil menghapus user');
			redirect('/siswa');
		}
	}

	function update_siswa($id)
	{

		$this->load->library('form_validation'); // load library validation
		$rules = [
			[
				'field' => 'nama_siswa',
				'label' => 'Nama Siswa',
				'rules' => 'required',
				'errors' => [
					'required' => '%s harus diiisi'
				]
			],
			[
				'field' => 'alamat_siswa',
				'label' => 'Alamat Siswa',
				'rules' => 'required',
				'errors' => [
					'required' => '%s harus diiisi'
				]
			]
		];
		$this->form_validation->set_rules($rules);

		$nama_siswa = $this->input->post('nama_siswa');
		$alamat_siswa = $this->input->post('alamat_siswa');

		if ($this->form_validation->run()) {
			$update = [
				'nama_siswa' => $nama_siswa,
				'alamat_siswa' => $alamat_siswa
			];
			if ($this->siswa->update_siswa($update, $id)) {
				$this->session->set_flashdata('success_message', 'Berhasil update user');
				redirect('/siswa');
			}
		} else {
			$this->load->view('partials/header');
			$this->load->view('siswa/tambah_siswa');
			$this->load->view('partials/footer');
		}
	}
}
