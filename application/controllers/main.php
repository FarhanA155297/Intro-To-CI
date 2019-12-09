<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends Public_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		$data['title'] = 'Home';
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar');
		$this->load->view('template/footer');
	}

	public function contactus() {
		$data['title'] = 'Home';
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar');
		$this->load->view('aboutus');
		$this->load->view('template/copyright');
		$this->load->view('template/footer');
	}
}
?>