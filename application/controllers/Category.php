<?php

class Category extends
	CI_Controller
{
	public function index()
	{
		$this->load->model('Category_model');
		$data = $this->Category_model->index();
		$this->load->view('category/category', ['data' => $data]);
	}

	public function add_category()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('is_visible', 'is_visible', 'required');

		$this->load->model('Category_model');

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->form_validation->run() == false) {
				$this->load->view('category/add_category');
			} else {
				$data['name'] = $_POST['name'];
				$data['is_visible'] = (bool)$_POST['is_visible'];
				$this->Category_model->create($data);
				$this->load->view('category/add_category');
			}
		}
		else {
			$this->load->view('category/add_category');
		}
	}

	public function update_category($id)
	{
		$this->load->model('Category_model');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('is_visible', 'Visibility', 'required');

			if (array_key_exists('is_visible', $_POST) == false ||$this->form_validation->run() == false) {
				$query = $this->Category_model->get_category($id);
				return $this->load->view('category/update_category', ['query' => $query]);
			} else {
				$data=array();
				$data['name'] = $_POST['name'];
				$data['is_visible'] = $_POST['is_visible'];
				$this->Category_model->update_category($id, $data);
				return $this->index();
			}
		} else {
			$query = $this->Category_model->get_category($id);
			$data = $this->Category_model->index();
			$this->load->view('category/update_category', ['query' => $query, 'data' => $data
			]);
		}
	}

	public function delete_category($id)
	{
		$this->load->model('Category_model');
		$this->Category_model->delete_category($id);
		return $this->index();
	}
}
