<?php

class Product extends
    CI_Controller
{
    public function index()
    {
        if (!$_SESSION['username'])
            redirect('/accounts/login');
        $this->load->model('Product_model');
        $data = $this->Product_model->index();
        $this->load->view('product/index', ['data' => $data]);
    }

    public function add_product()
    {
        $category = $this->getCategory();

        $data = array();
        $data['name'] = $data['sku'] = $data['price'] = $data['stock'] = $data['category'] = $data['is_visible'] = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->form_validation->run() == false) {
                $data = $_POST;
                $this->load->view('product/add_product', ['data' => $data]);
            } else {
                $data = $this->getData($data);
                $this->Product_model->add_product($data);
                redirect(base_url() . 'product/index');
            }
        } else {
            $this->load->view('product/add_product', ['data' => $data, 'category' => $category]);
        }
    }

    public function update_product($id)
    {
        $category = $this->getCategory();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->form_validation->run() == false) {
                $data = $this->Product_model->get_product($id);
                return $this->load->view('product/update_product', ['data' => $data, 'category' => $category]);
            } else {
                $data = array();
                $data = $this->getData($data);
                $this->Product_model->update_product($id, $data);
                redirect(base_url() . 'product/index');
            }
        } else {
            $data = $this->Product_model->get_product($id);
            $this->load->view('product/update_product', ['data' => $data, 'category' => $category]);
        }
    }

    public function delete_product($id)
    {
        if (!$_SESSION['username'])
            redirect('/accounts/login');
        $this->load->model('Product_model');
        $this->Product_model->delete_product($id);
        redirect(base_url() . 'product/index');
    }

    /**
     * @param array $data
     * @return array
     */
    public function getData(array $data): array
    {
        $data['name'] = $_POST['name'];
        $data['sku'] = $_POST['sku'];
        $data['price'] = $_POST['price'];
        $data['stock'] = $_POST['stock'];
        $data['category'] = $_POST['category'];
        $data['is_visible'] = $_POST['is_visible'];
        return $data;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        if (!$_SESSION['username'])
            redirect('/accounts/login');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('sku', 'Sku', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');

        $this->load->model('Product_model');
        $this->load->model('Subcategory_model');
        return $this->Subcategory_model->index();
    }
}
