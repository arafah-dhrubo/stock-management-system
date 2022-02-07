<?php

class Product extends
    CI_Controller
{
    public function index()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');

        $categories = $this->getCategory();
        $data = array();
        $data['name'] = $data['description'] = $data['sku'] = $data['price'] = $data['stock'] = $data['category']= $data['is_visible'] = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->form_validation->run() == false || empty($_FILES['image']['name'])) {
                $products = $this->getProducts();
                $data = $_POST;
                $this->load->view('product/index', ['data' => $data, 'products'=>$products, 'categories' => $categories]);
            } else {
                $config['upload_path'] = './images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2000;
                $config['max_width'] = 1500;
                $config['max_height'] = 1500;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $item = array(
                        'color' => 'red',
                        'message' => $error
                    );
                } else {
                    $img = array('image_metadata' => $this->upload->data());
                    $data = $this->getData();
                    $this->Product_model->add_product($data);
                    $item = array(
                        'color' => 'green',
                        'message' => 'New product added successfully'
                    );
                }
                $this->session->set_tempdata($item, NULL, 3);
                redirect(base_url() . 'product/index');
            }
       } else {
            $_FILES['image']['name']='';
            $products = $this->getProducts();
            $this->load->view('product/index', ['data' => $data, 'products'=>$products, 'categories' => $categories]);
        }
    }

    public function show_product($id)
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Product_model');
        $data = $this->Product_model->show_product($_SESSION['user']['user_id'], $id);
        $this->load->view('product/show_product', ['product' => $data[0]]);
    }

    public function update($id)
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $products = $this->getProducts();
        $categories = $this->getCategory();
        $data = $this->Product_model->get_product($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->form_validation->run() == false || empty($_FILES['image']['name'])) {
                $data = $_POST;
                $this->load->view('product/index', ['data' => $data, 'products'=>$products, 'categories' => $categories]);
            } else {
                $config['upload_path'] = './images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2000;
                $config['max_width'] = 1500;
                $config['max_height'] = 1500;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $item = array(
                        'color' => 'red',
                        'message' => $error
                    );
                    $this->session->set_tempdata($item, NULL, 3);
                    $this->load->view('product/index', ['data' => $data, 'products'=>$products, 'categories' => $categories]);
                } else {
                    $img = array('image_metadata' => $this->upload->data());
                    $data = $this->getData();
                    $this->Product_model->update_product($id, $data);
                    $item = array(
                        'color' => 'green',
                        'message' => 'Product updated successfully'
                    );
                $this->session->set_tempdata($item, NULL, 3);
                redirect(base_url() . 'product/index');
            }}
        } else {
            $_FILES['image']['name']='';
            $this->load->model('Product_model');
            $this->load->view('product/index', ['data' => $data, 'products'=>$products, 'categories' => $categories]);
        }
    }

    public function delete_product($id)
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Product_model');
        $this->Product_model->delete_product($id);
        $item = array(
            'color' => 'green',
            'message' => 'Product deleted successfully'
        );
        $this->session->set_tempdata($item, NULL, 3);
        redirect(base_url() . 'product/index');
    }

    /**
     * @param array $data
     * @return array
     */
    public function getData(): array
    {
        $data['name'] = $_POST['name'];
        $data['image'] = $_FILES['image']['name'];
        $data['description'] = $_POST['description'];
        $data['sku'] = $_POST['sku'];
        $data['price'] = $_POST['price'];
        $data['stock'] = $_POST['stock'];
        $data['category'] = $_POST['category'];
        $data['user_id'] = $_SESSION['user']['user_id'];
        $data['is_visible'] = $_POST['is_visible'];
        return $data;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('sku', 'SKU', 'trim|required');
        if (empty($_FILES['image']['name']))
        {
            $this->form_validation->set_rules('image', 'Product Image', 'required');
        }
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required');
        $this->load->model('Product_model');
        $this->load->model('Category_model');
        return $categories = $this->Category_model->getParents($_SESSION['user']['user_id']);
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        $this->load->model('Product_model');
        $config = array();
        $config["base_url"] = base_url() . "product";
        $config["total_rows"] = $this->Product_model->get_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $products["links"] = $this->pagination->create_links();
        $products['products'] = $this->Product_model->index($config["per_page"], $page);
        return $products;
    }
}
