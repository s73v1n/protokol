<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		
		$this->load->view('panel.php',(array)$output);
	}

	
	public function index()
	{
		$this->_example_output((object)array('output' => '' ,'js_files' => array() , 'css_files' => array()));
	}
	public function agenda()
	{
			$crud = new grocery_CRUD();
			//$crud->set_theme('bootstrap');
			$crud->unset_bootstrap();
			//$crud->unset_jquery();
			$crud->set_table('tbl_giat');
			$crud->set_relation('disposisi','tbl_diposisi','perangkat');
			$crud->set_language('indonesian');
			//$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			//$crud->display_as('salesRepEmployeeNumber','from Employeer')
			//	 ->display_as('customerName','Name')
			//	 ->display_as('contactLastName','Last Name');
			//$crud->set_subject('agenda');
			//$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}
	public function perangkat($output = null)
	{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->unset_bootstrap();
			//$crud->unset_jquery();
			$crud->set_table('tbl_diposisi');
			$crud->callback_edit_field('color',function ($value, $primary_key) {
			return '<input type="text" class="colorpicker-default form-control" value="'.$value.'" name="color">';
			});
			$output = $crud->render();
			$this->load->view('disposisi.php',(array)$output);
	}
	
	
}