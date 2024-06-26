<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('partials/header', ['nav' => false]);
		$this->load->view('home');
		$this->load->view('partials/footer');
	}
}
