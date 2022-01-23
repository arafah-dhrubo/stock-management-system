<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends
	CI_Controller
{
	public function login()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['username'] = $_POST['username'];
			$data['password'] = $_POST['password'];
			$this->load->model('User_model');
			if ($this->User_model->login($data) == true) {
				$this->load->view('stock/dashboard');
			} else {
				$this->load->view('accounts/login');
			}
		} else {
			$this->load->view('accounts/login');
		}
	}
}
