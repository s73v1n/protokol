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
		date_default_timezone_set('Asia/Jakarta');
		setlocale(LC_TIME, "id_ID.utf8");
		$data = array(
				'tanggal' => strftime( "%A, %d %B %Y", time()),
				'besok' => strftime( "%A, %d %B %Y", strtotime("+1 day")),
				'lusa' => strftime( "%A, %d %B %Y", strtotime("+2 day")),
		);
		
		
		$this->load->view('blank',$data);
	}
	public function all_agenda()
	{
		$row['agenda'] = $this->Dashboard_model->get_all();
		$arrlength = count($row);

		echo '<pre>'; print_r($row); echo '</pre>';
	}
}
