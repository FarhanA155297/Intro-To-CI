<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->set_table('tbl_staffs_a123456');
			$crud->set_subject('Staff');
			$crud->required_fields('fld_staff_num, fld_staff_fname, fld_staff_email');
			$crud->columns('fld_staff_num','fld_staff_fname','fld_staff_lname','fld_staff_gender','fld_staff_phone', 'fld_staff_email');

			$output = $crud->render();

			$this->load->view('template/header_grocery_crud', (array)$output);
			$this->load->view('template/navbar');
			$this->load->view('example.php');
			$this->load->view('template/copyright');
			$this->load->view('template/footer');

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}