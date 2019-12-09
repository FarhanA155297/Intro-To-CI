<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('staff_model');
		if (!isset($_SESSION)) session_start();
	}

	public function index() {
		$this->load->view('login_form');
	}

	public function login() {

		$this->load->helper(array('form', 'url'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($_SESSION['logged_in'])){
				redirect('main/index', 'refresh');
			} else {
				$data['title'] = 'Login';
				$this->load->view('template/header', $data);
				$this->load->view('template/navbar');
				$this->load->view('login');
				$this->load->view('template/copyright');
				$this->load->view('template/footer');
			}
		} else 
		{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$result = $this->staff_model->login($data);
			if ($result == TRUE) {

				$where = array(
				'fld_staff_num' => $this->input->post('username')
				);
				$result = $this->staff_model->select('*', $where, null, null);
				$session_data = array(
					'username' => $result[0]->fld_staff_num,
					'level' => $result[0]->fld_staff_level
					);
				$_SESSION['logged_in'] = $session_data;
				
				redirect('main/index', 'refresh');
				
			} else 
			{
				$data['title'] = 'Login';
				$this->load->view('template/header', $data);
				$this->load->view('template/navbar');

				$msg['type'] = 'danger';
				$msg['strong'] = 'Error: ';
				$msg['message'] = "Invalid Username or Password";
				$this->load->view('template/alert', $msg);

				$this->load->view('login');
				$this->load->view('template/copyright');
				$this->load->view('template/footer');
			}
		}
	}

	public function logout() 
	{
		$_SESSION['logged_in'] = NULL;
		unset($_SESSION['logged_in']);
		redirect('main/index', 'refresh');
	}
}

?>