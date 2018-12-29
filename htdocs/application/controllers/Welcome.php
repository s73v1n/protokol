<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		$this->load->model('dashboard_model');
		$this->load->database();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('blank');
	}
		public function all_agenda()
	{
		$data = $this->Dashboard_model->get_all();
		echo '<pre>'; print_r($data); echo '</pre>';
	}
}
