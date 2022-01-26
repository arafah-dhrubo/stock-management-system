<?php

class Category extends
    CI_Controller
{
    public function index()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Category_model');
        $data = $this->Category_model->index($_SESSION['user']['user_id']);
        $this->load->view('category/category', ['data' => $data]);
    }

    public function add_category()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('is_visible', 'is_visible', 'required');
        $this->load->model('Category_model');
        $data=array();
        $data['name'] = $data['user_id'] = $data['is_visible'] = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->form_validation->run() != false) {
                $this->load->model('User_model');
                $data['name'] = $_POST['name'];
                $data['user_id'] = $_SESSION['user']['user_id'];
                $data['is_visible'] = $_POST['is_visible'];
                $this->Category_model->create($data);
                redirect('category/index');
            }
        }
        $this->load->view('category/add_category', ['data'=>$data]);
    }

    public function update_category($id)
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Category_model');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('is_visible', 'Visibility', 'required');

            if (array_key_exists('is_visible', $_POST) == false || $this->form_validation->run() == false) {
                $query = $this->Category_model->get_category($id);
                return $this->load->view('category/update_category', ['query' => $query]);
            } else {
                $data = array();
                $data['name'] = $_POST['name'];
                $data['is_visible'] = $_POST['is_visible'];
                $this->Category_model->update_category($id, $data);
                redirect('category/index');
            }
        } else {
            $query = $this->Category_model->get_category($id);
            $data = $this->Category_model->index(($_SESSION['user']['user_id']));
            $this->load->view('category/update_category', ['query' => $query, 'data' => $data
            ]);
        }
    }

    public function delete_category($id)
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Category_model');
        $this->load->model('Subcategory_model');
        $query = $this->Category_model->get_category($id);
        $this->Subcategory_model->delete_subcategory_by_name($query['name']);
        $this->Category_model->delete_category($id);

        redirect('category/index');
    }
}
