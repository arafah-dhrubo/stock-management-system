<?php

class Product extends
    CI_Controller
{
    public function index()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $_FILES['image']['name'] = '';
        $products = $this->getProducts();
        $this->load->model('Product_model');
        $this->load->view('product/index', ['products' => $products]);
    }

    public function all_product()
    {
        $this->load->model('Product_model');
        $products = $this->getProducts();
        $this->load->view('product/product_page', ['products' => $products]);
    }

    public function add_product()
    {
        $categories = $this->getCategory();
        $this->load->view('product/add_product', ['categories' => $categories]);
    }

    public function edit_product($id)
    {
        $categories = $this->getCategory();
        $this->load->model('Product_model');
        $product = $this->Product_model->get_product($id);

        $this->load->view('product/edit_product', [
            'categories' => $categories,
            'product' => $product
        ]);
    }

    public function store_product()
    {
        $config['upload_path'] = 'images';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $new_name = time();
        $config['file_name'] = $new_name;
//        $this->resizeImage( $new_name);
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        var_dump($this->upload->do_upload('image'));
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $item = array(
                'color' => 'red',
                'message' => $error
            );
            $this->session->set_tempdata($item, NULL, 3);
            return $this->add_product();
        } else {
            $img = array('image_metadata' => $this->upload->data());
            $data = $this->getData();
            $data['image'] = $new_name . $this->upload->data('file_ext');
            $this->load->model('Product_model');
            $this->Product_model->add_product($data);
            $item = array(
                'color' => 'green',
                'message' => 'successful'
            );
            $this->session->set_tempdata($item, NULL, 3);
            return $this->index();
        }
    }

    public function update_product($id)
    {
        $config['upload_path'] = 'images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->model('Product_model');
        $new_name = time();
        $config['file_name'] = $new_name;
//        $this->resizeImage($new_name);
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;
        $this->load->library('upload', $config);
        if ($_FILES['image']['name'] != "" && !$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $item = array(
                'color' => 'red',
                'message' => $error
            );
            $this->session->set_tempdata($item, NULL, 3);
            return $this->edit_product($id);
        } else {
            if ($_FILES['image']['name'] != "") {
                $filename = $this->Product_model->get_image($id)['image'];
                unlink("images/" . $filename);
            }

            $data = $this->getData();
            $data['image'] = $_FILES['image']['name'] != "" ? $new_name . $this->upload->data('file_ext') : $this->Product_model->get_image($id)['image'];
            $img = array('image_metadata' => $this->upload->data());
            $this->Product_model->update_product($id, $data);
            $item = array(
                'color' => 'green',
                'message' => 'successful'
            );

            $this->session->set_tempdata($item, NULL, 3);
            return $this->index();
        }
    }

    public
    function resizeImage($filename)
    {
        $source_path = base_url() . 'images/' . $filename;
        var_dump($source_path);
        $target_path = base_url() . 'images/resized/';
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
            'thumb_marker' => '_thumb',
            'width' => 256,
            'height' => 256
        );


        $this->load->library('image_lib', $config_manip);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }


        $this->image_lib->clear();
    }

    public
    function show_product($id)
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Product_model');
        $data = $this->Product_model->show_product($_SESSION['user']['user_id'], $id);
        $this->load->view('product/show_product', ['product' => $data[0]]);
    }

//    public
//    function update($id)
//    {
//        if (!$_SESSION['user']['username'])
//            redirect('/accounts/login');
//        $products = $this->getProducts();
//        $categories = $this->getCategory();
//        $data = $this->Product_model->get_product($id);
//
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            if ($this->form_validation->run() == false || empty($_FILES['image']['name'])) {
//                $data = $_POST;
//                $this->load->view('product/edit', ['data' => $data, 'categories' => $categories]);
//            } else {
//                $config['upload_path'] = './images/';
//                $config['allowed_types'] = 'gif|jpg|png';
//                $config['max_size'] = 2000;
//                $config['max_width'] = 1500;
//                $config['max_height'] = 1500;
//                $this->load->library('upload', $config);
//                if (!$this->upload->do_upload('image')) {
//                    $error = array('error' => $this->upload->display_errors());
//                    $item = array(
//                        'color' => 'red',
//                        'message' => $error
//                    );
//                    $this->session->set_tempdata($item, NULL, 3);
//                    $this->load->view('product/index', ['data' => $data, 'products' => $products, 'categories' => $categories]);
//                } else {
//                    $img = array('image_metadata' => $this->upload->data());
//                    $data = $this->getData();
//                    $this->Product_model->update_product($id, $data);
//                    $item = array(
//                        'color' => 'green',
//                        'message' => 'Product updated successfully'
//                    );
//                    $this->session->set_tempdata($item, NULL, 3);
//                    redirect(base_url() . 'product/index');
//                }
//            }
//        } else {
//            $_FILES['image']['name'] = '';
//            $this->load->model('Product_model');
//            $this->load->view('product/index', ['data' => $data, 'products' => $products, 'categories' => $categories]);
//        }
//    }

    public
    function delete_product($id)
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Product_model');
        $filename = $this->Product_model->get_image($id)['image'];
        unlink("images/" . $filename);
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
    public
    function getData(): array
    {
        $this->load->model('Product_model');
        $data['name'] = $_POST['name'];
        $data['description'] = $_POST['description'];
        $data['sku'] = $_POST['sku'];
        $data['price'] = $_POST['price'];
        $data['stock'] = $_POST['stock'];
        $data['category'] = $_POST['category'];
        $data['user_id'] = $_SESSION['user']['user_id'];
        $data['is_visible'] = $_POST['is_visible'];
        $data['is_feat'] = $_POST['is_feat'];
        return $data;
    }

    /**
     * @return mixed
     */
    public
    function getCategory()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('sku', 'SKU', 'trim|required');
//        if (empty($_FILES['image']['name'])) {
//            $this->form_validation->set_rules('image', 'Product Image', 'required');
//        }

        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required');
        $this->load->model('Product_model');
        $this->load->model('Category_model');
        return $categories = $this->Category_model->getParents($_SESSION['user']['user_id']);
    }

    /**
     * @return array
     */
    public
    function getProducts(): array
    {
        $this->load->model('Product_model');
        $config = array();
        $config["base_url"] = base_url() . "product";
        $config["total_rows"] = $this->Product_model->get_count();
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
        $products["links"] = $this->pagination->create_links();
        $products['products'] = $this->Product_model->index($config["per_page"], $page);
        return $products;
    }

    function fetch()
    {
        $query = explode('/', $_SERVER['REQUEST_URI'])[4];
        $this->load->model('Product_model');
        $result = $this->Product_model->fetch_product($query);
        $this->load->view('home/result', ['result' => $result]);
    }

    function product_page()
    {
        $this->load->model('Product_model');
        $config = array();
        $config["base_url"] = base_url() . "product";
        $config["total_rows"] = $this->Product_model->get_count();
        $config["per_page"] = 18;
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
        $products["links"] = $this->pagination->create_links();
        $products['products'] = $this->Product_model->search_product($_GET['keyword'], $config["per_page"], $page);
        $this->load->view('product/product_page', ['data' => $products]);
    }
}
