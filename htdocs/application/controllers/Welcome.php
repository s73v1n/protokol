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
		$row = $this->Dashboard_model->get_all();
		$data = array(
			'kegiatan'	=>$row->kegiatan,
			'mulai'		=>$row->start,
			'disposisi'	=>$row->disposisi
		
		);
		$this->load->view('blank',$data);
	}
	public function all_agenda()
	{
		$row = $this->Dashboard_model->get_all();
		$arrlength = count($row);
		$data = array(
			'kegiatan'	=>$row->kegiatan,
			'mulai'		=>$row->start,
			'disposisi'	=>$row->disposisi
		
		);
		echo '<pre>'; print_r($row); echo '</pre>';
	}
}
