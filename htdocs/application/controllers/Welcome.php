<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->database();
		$this->load->helper('url');
	}

	public function index()
	{
		$data = $this->Dashboard_model->get_all();
		$this->load->view('blank',$data);
	}
	public function all_agenda()
	{
		$row['dashboard'] = $this->Dashboard_model->get_all();
		$arrlength = count($row);

		echo '<pre>'; print_r($row); echo '</pre>';
	}
}
