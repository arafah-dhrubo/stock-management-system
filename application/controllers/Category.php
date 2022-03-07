<?php

class Category extends
    CI_Controller
{
    public function index()
    {
        $_SESSION['title'] = 'Category';
        $data = $this->getValidation();
        $this->load->model('Category_model');

        //Getting categories of only signed in member
        $categories = $this->getCategories();

        //Getting parent categories
        $parent = $this->Category_model->getParents();

        //When request method is "GET"
        $this->load->view('category/index', ['data' => $data, 'categories' => $categories, 'parent' => $parent]);

    }

    public function add(){
        $this->load->model('Category_model');
        $data=$this->Category_model->create(json_decode(file_get_contents("php://input"), true));

        $item = array(
            'color' => 'green',
            'message' => 'New Category Added'
        );
        $this->session->set_tempdata($item, NULL, 3);

        echo json_encode($data);
    }

    public function update($id)
    {
        $_SESSION['title'] = 'Category';
        $data = $this->getValidation();
        $this->load->model('Category_model');
        $categories = $this->getCategories();
        $parent = $this->Category_model->getParents($_SESSION['user']['user_id']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->form_validation->run() == false) {
                $data = $_POST;
                $this->load->view('category/index', ['data' => $data, 'categories' => $categories, 'parent' => $parent]);
            } else {
                $data = $this->getData($data);
                $item = array(
                    'color' => 'green',
                    'message' => 'Category updated successfully'
                );
                $this->session->set_tempdata($item, NULL, 3);
                $this->Category_model->update($id, $data);
                redirect('category/index');
            }
        } else {
            $data = $this->Category_model->getCategory($id);
            $this->load->view('category/index', ['data' => $data, 'categories' => $categories, 'parent' => $parent]);
        }
    }

    public function delete($id)
    {
        $_SESSION['title'] = 'Category';
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
        $data['is_visible'] = $_POST['is_visible'];
        return $data;
    }

    /**
     * @return array
     */

    public function getCategories(): array
    {
        $config = array();
        $config["base_url"] = base_url() . "category";
        $config["total_rows"] = $this->Category_model->get_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 2;
        $config['full_tag_open'] = '<div class="mt-2 pagination pagination-large"><ul class="flex gap-2">';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active bg-indigo-500 text-white w-6 h-6 text-center rounded"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $categories["links"] = $this->pagination->create_links();
        $categories['categories'] = $this->Category_model->index($config["per_page"], $page, $_SESSION['user']['user_id']);
        return $categories;
    }

    //Code for form validation
    public function getValidation(): array
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('is_visible', 'Visibility', 'required');
        $this->load->model('Category_model');
        $data = array();
        $data['name'] = $data['user_id'] = $data['is_visible'] = $data['slug'] = $data['parent'] = '';
        return $data;
    }
}
