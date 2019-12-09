<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Staff_Controller {

		protected $per_page = 2; //new

		public function __construct()
		{
			parent::__construct();
			$this->load->model('product_model');
			$this->load->library('pagination'); //new
			$this->load->model('brand_model');
		}

		public function index()
		{
			$this->read();
		}

		function read()
		{
			if($this->uri->segment(3)) //new
				$page = ($this->uri->segment(3)); //new
			else //new
				$page = 0;

			$data['title'] = 'Products';
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar');

			$data['results'] = $this->product_model->select('*', null, null, null);
			$total_row = count($data['results']);

			$config["base_url"] = base_url() . "product/read"; //new
			$config["total_rows"] = $total_row; //new
			$config["per_page"] = $this->per_page; //new
			$this->pagination->initialize($config); //new

			$data['results'] = $this->product_model->select('*', null, $this->per_page, $page); //new

			$data['total'] = $total_row;
			$this->load->view('product', $data);

			$str_links = $this->pagination->create_links(); //new
			$data3["links"] = explode('&nbsp;',$str_links ); //new
			$this->load->view('template/pagination', $data3); //new

			$this->load->view('template/copyright');
			$this->load->view('template/footer');
		}

		function create() 
{
	if ($this->input->post('form-submitted') == "add") 
	{
		if ($this->product_model->validate_id($this->input->post("id")) == true) {
			$data['title'] = 'Add a Products';
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar');
			$msg['type'] = 'danger';
			$msg['strong'] = 'Error: ';
			$msg['message'] = "The product id is already in the database";
			$this->load->view('template/alert', $msg);
			$this->load->view('product_add');
			$this->load->view('template/copyright');
			$this->load->view('template/footer');
		} 
		else 
		{
			$config['upload_path']          = 'images/'; //new
			$config['allowed_types']        = 'gif|jpg|png'; //new
			$config['max_size']             = 100000; //new
			$config['max_width']            = 1024; //new
			$config['max_height']           = 768; //new
			$config['overwrite'] 			= TRUE; //new

			$this->load->library('upload', $config); //new

			if ( ! $this->upload->do_upload('image')) //new
			{
			 	$data['title'] = 'Add a Products'; //new
			 	$this->load->view('template/header', $data); //new
			 	$this->load->view('template/navbar'); //new
			 	$msg['type'] = 'danger'; //new
			 	$msg['strong'] = 'Error: '; //new
			 	$msg['message'] = $this->upload->display_errors(); //new
			 	$this->load->view('template/alert', $msg); //new
			 	$this->load->view('product_add'); //new
			 	$this->load->view('template/copyright'); //new
			 	$this->load->view('template/footer'); //new
			} //new
			else //new
			{ //new
				$data = array(
				'fld_product_num' => $this->input->post("id"),
				'fld_product_name' => $this->input->post("name"),
				'fld_product_price' => $this->input->post("price"),
				'fld_product_brand' => $this->input->post("brand"),
				'fld_product_condition' => $this->input->post("cond"),
				'fld_product_year' => $this->input->post("year"),
				'fld_product_quantity' => $this->input->post("quantity"),
				'fld_product_image' => $this->upload->data('file_name') //new
				);

				$this->product_model->insert($data);
				$data['title'] = 'Add a Products';
				$this->load->view('template/header', $data);
				$this->load->view('template/navbar');
				$msg['type'] = 'success';
				$msg['strong'] = 'Done: ';
				$msg['message'] = "You had successfully create a product";
				$this->load->view('template/alert', $msg);
				$this->load->view('product_add');
				$this->load->view('template/copyright');
				$this->load->view('template/footer');
			} //new
		}
	}
		else 
		{
			$data['title'] = 'Add a Products';
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar');

			$data['brands'] = $this->brand_model->select('', null, null, null);
			$this->load->view('product_add', $data);
			$this->load->view('template/copyright');
			$this->load->view('template/footer');
		}	
	}

		function search() 
		{
			$search = $this->input->post("keyword");

			if($this->uri->segment(3))
				$page = ($this->uri->segment(3)) ;
			else
				$page = 0;

			$data['title'] = 'Products';
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar');

			$data['results'] = $this->product_model->like('*', 'fld_product_name', $search, null, null);
			$total_row = count($data['results']);
			
			$config["base_url"] = base_url() . "product/search";
			$config["total_rows"] = $total_row;
			$config["per_page"] = $this->per_page;
			$this->pagination->initialize($config);

			$msg['type'] = 'success';
			$msg['strong'] = 'Search: ';
			$msg['message'] = "Keyword '$search' found $total_row record(s)";
			$this->load->view('template/alert', $msg);

			$data2['results'] = $this->product_model->like('*', 'fld_product_name', $search, $this->per_page, $page);
			$data2['total'] = $total_row;
			$this->load->view('product', $data2);

			$str_links = $this->pagination->create_links();
			$data3["links"] = explode('&nbsp;',$str_links );
			$this->load->view('template/pagination', $data3);

			$this->load->view('template/copyright');
			$this->load->view('template/footer');
		}

		function detail() 
		{
			if($this->uri->segment(3))
				$id = ($this->uri->segment(3)) ;
			else
				$this-read();

			if ($this->product_model->validate_id($id) == true) 
			{
				$data['title'] = 'Product Information';
				$this->load->view('template/header', $data);
				$this->load->view('template/navbar');

				$select = array('fld_product_num' => $id);
				$data['results'] = $this->product_model->select('*', $select, null, null);
				$this->load->view('product_detail', $data);

				$this->load->view('template/copyright');
				$this->load->view('template/footer');
			}
			else
				$this->read();
			
		}

		function edit() 
		{
			$error = false;
			if ($this->input->post('form-submitted') == "edit") 
			{
				if ($_FILES['image']['name'] <> "") {
					$config['upload_path']			= 'images/';
					$config['allowed_types']		= 'gif|jpg|png';
					$config['max_size']				= 100000;
					$config['max_width']			= 1024;
					$config['max_height']			= 768;
					$config['overwrite'] 			= TRUE;

					$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('image'))
				{
						$data['title'] = 'Add a Products';
						$this->load->view('template/header', $data);
						$this->load->view('template/navbar');
						$msg['type'] = 'danger';
						$msg['strong'] = 'Error: ';
						$msg['message'] = $this->upload->display_errors();
						$this->load->view('template/alert', $msg);
						$this->load->view('product_add');
						$this->load->view('template/copyright');
						$this->load->view('template/footer');
						$error = true;
					}
				}
					if ($error == false)
					{
						if ($_FILES['image']['name'] <> "")
							$filename = $this->$_FILES['image']['name'];
						else
							$filename = $this->input->post('existingimage');	
						$data = array(
						'fld_product_name' => $this->input->post("name"),
						'fld_product_price' => $this->input->post("price"),
						'fld_product_brand' => $this->input->post("brand"),
						'fld_product_condition' => $this->input->post("cond"),
						'fld_product_year' => $this->input->post("year"),
						'fld_product_quantity' => $this->input->post("quantity"),
						'fld_product_image' => $filename
						);

						$this->product_model->update($this->input->post("id"), $data);
						$data['title'] = 'Add a Products';
						$this->load->view('template/header', $data);
						$this->load->view('template/navbar');
						$msg['type'] = 'success';
						$msg['strong'] = 'Done: ';
						$msg['message'] = "You had successfully edit ".$this->input->post("name")." information";
						$this->load->view('template/alert', $msg);
						$this->load->view('product_add');
						$this->load->view('template/copyright');
						$this->load->view('template/footer');
					}
				}
			else
			{
				if($this->uri->segment(3))
					$id = ($this->uri->segment(3)) ;
				else
					$this-read();

				$data['title'] = 'Edit a Products';
				$this->load->view('template/header', $data);
				$this->load->view('template/navbar');

				$select = array('fld_product_num' => $id);
				$data['result'] = $this->product_model->select('*', $select, null, null);
				$data['brands'] = $this->brand_model->select('', null, null, null);
				$this->load->view('product_edit', $data);
				$this->load->view('template/copyright');
				$this->load->view('template/footer');
			}	
		}

		function delete() 
		{
			if($this->uri->segment(3))
				$del = ($this->uri->segment(3)) ;
			else
				$this-read();

			if ($this->product_model->validate_id($del) == true) {
				$this->product_model->delete($del);

				$data['title'] = 'Products';
				$this->load->view('template/header', $data);
				$this->load->view('template/navbar');

				$data['results'] = $this->product_model->select('', null, null, null);
				$total_row = count($data['results']);

				$config["base_url"] = base_url() . "product/read";
				$config["total_rows"] = $total_row;
				$config["per_page"] = $this->per_page;
				$this->pagination->initialize($config);

				$msg['type'] = 'success';
				$msg['strong'] = 'Delete: ';
				$msg['message'] = "A product had been deleted";
				$this->load->view('template/alert', $msg);

				$data2['results'] = $this->product_model->select('', null, $this->per_page, 0);
				$data2['total'] = $total_row;
				$data2['search'] = '';
				$this->load->view('product', $data2);

				$str_links = $this->pagination->create_links();
				$data3["links"] = explode('&nbsp;',$str_links );
				$this->load->view('template/pagination', $data3);

				$this->load->view('template/copyright');
				$this->load->view('template/footer');
			}
			else
				$this->read();
		}

}