<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
		$this->load->model('product_model');
	}

	public function index()
	{
		$data = $this->product_model->select('', null, null, null);
		
		$file_content = "letter\tfrequency";
		foreach ($data as $record) {
			$file_content = $file_content."\r\n$record->fld_product_num\t$record->fld_product_quantity";
		}
		
		if ( !write_file('data.tsv', $file_content)){
			echo 'Unable to write the file';
		}
		$data['title'] = 'Dashboard';
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar');
		$this->load->view('dashboard');
		$this->load->view('template/copyright');
		$this->load->view('template/footer');
	}
}