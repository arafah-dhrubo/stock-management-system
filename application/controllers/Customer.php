<?php

class Customer extends
	CI_Controller
{
	public function index()
	{
		$this->load->model('Customer_model');
		$data = $this->Customer_model->index();
		$this->load->view('customer/index', ['data' => $data]);
	}

	public function add_customer()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->load->model('Customer_model');

		$data=array();
		$data['name'] = '';
		$data['phone'] = '';
		$data['email'] = '';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->form_validation->run() == false) {
				$data = $_POST;
				$this->load->view('customer/add_customer', ['data'=>$data]);
			} else {
				$data['name'] = $_POST['name'];
				$data['phone'] = $_POST['phone'];
				$data['email'] = $_POST['email'];
				$this->Customer_model->add_customer($data);
				redirect(base_url().'customer/index');
			}
		} else {
			$this->load->view('customer/add_customer', ['data'=>$data]);
		}
	}

	public function update_customer($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->load->model('Customer_model');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->form_validation->run() == false) {
				$data = $this->Customer_model->get_customer($id);
				return $this->load->view('customer/update_customer', ['data' => $data]);
			} else {
				$data=array();
				$data['name'] = $_POST['name'];
				$data['phone'] = $_POST['phone'];
				$data['email'] = $_POST['email'];
				$this->Customer_model->update_customer($id, $data);
				redirect(base_url().'customer/index');
			}
		} else {
			$data = $this->Customer_model->get_customer($id);
			$this->load->view('customer/update_customer', ['data' => $data
			]);
		}
	}

	public function delete_customer($id)
	{
		$this->load->model('Customer_model');
		$this->Customer_model->delete_customer($id);
		redirect(base_url().'customer/index');
	}
}
