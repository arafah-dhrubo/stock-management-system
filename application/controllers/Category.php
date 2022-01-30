<?php

class Category extends
    CI_Controller
{
    public function index()
    {
        $data = $this->getValidation();
        $this->load->model('Category_model');

        //Getting categories of only signed in member
        $categories = $this->Category_model->index($_SESSION['user']['user_id']);

        //When request method is "GET"
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //If form is posted but invalid
            if ($this->form_validation->run() == false) {
                $data = $_POST;
                $this->load->view('category/index', ['data' => $data, 'categories' => $categories]);
            }
            //If form is posted and valid
            else {
                $data = $this->getData($data);
                $this->Category_model->create($data);
                redirect('category/index');
            }
            //When request method is "POST"
        } else {
            $this->load->view('category/index', ['data' => $data, 'categories' => $categories]);
        }
    }

    public function update($id)
    {
        $data = $this->getValidation();
        $this->load->model('Category_model');
        $categories = $this->Category_model->index($_SESSION['user']['user_id']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->form_validation->run() == false) {
                $data = $_POST;
                $this->load->view('category/index', ['data' => $data, 'categories' => $categories]);
            } else {
                $data = $this->getData($data);
                $this->Category_model->update($data);
                redirect('category/index');
            }
        } else {
            $data=$this->Category_model->getCategory($id);
            $this->load->view('category/index', ['data' => $data, 'categories' => $categories]);
        }
    }

    public function delete($id)
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Category_model');
        $query = $this->Category_model->getCategory($id);
        $this->Category_model->deletCategory($id);
        redirect('category/index');
    }

    /**
     * @param array $data
     * @return array
     */

    //Code for preparing data for save into database
    public function getData(array $data): array
    {
        $this->load->model('User_model');
        $data['name'] = $_POST['name'];
        $data['slug'] = $_POST['slug'];
        $data['parent'] = $_POST['parent'];
        $data['user_id'] = $_SESSION['user']['user_id'];
        $data['is_visible'] = $_POST['is_visible'];
        return $data;
    }

    /**
     * @return array
     */

    //Code for form validation
    public function getValidation(): array
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required|is_unique[categories.slug]');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('is_visible', 'Visibility', 'required');
        $this->load->model('Category_model');
        $data = array();
        $data['name'] = $data['user_id'] = $data['is_visible'] = $data['slug'] = $data['parent'] = '';
        return $data;
    }
}
