<?php

class Cart extends
    CI_Controller
{
    public function index()
    {
        $_SESSION['title']='Cart';
        $form_data = $this->getValidation();
        $data = $this->cart->contents();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->saveOrderInfo();
        } else {
            $this->load->view('cart/index', ['data' => $data, 'form_data' => $form_data]);
        }
    }

    public function add_cart()
    {
        $_SESSION['title']='Cart';
        $this->load->model('Product_model');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array();
            $data['products'] = $this->Product_model->search_product($_POST['keyword']);

            $this->load->view('cart/add_cart', ['data' => $data]);
        } else {
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
            $config['cur_tag_open'] =  '<li class="active bg-indigo-500 text-white w-6 h-6 text-center rounded"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $products["links"] = $this->pagination->create_links();
            $products['products'] = $this->Product_model->index($config["per_page"], $page);
            $this->load->view('cart/add_cart', ['data' => $products]);
        }
    }
    public function saveOrderInfo()
    {
        $_SESSION['title']='Cart';
        if ($this->form_validation->run() == false) {
            $form_data = $_POST;
            $data = $this->cart->contents();
            $this->load->view('cart/index', ['data' => $data, 'form_data' => $form_data]);
        } else {
            $order_info = array(
                'user_id' => $_POST['user_id'],
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'district' => $_POST['district'],
                'division' => $_POST['division'],
                'area' => $_POST['area'],
            );
            $_SESSION['order_info'] = $order_info;
            $item = array(
                'color' => 'green',
                'message' => 'Information saved successfully'
            );
            $this->session->set_tempdata($item, NULL, 1);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function getValidation(): array
    {
        $this->form_validation->set_rules('name', 'Full name', 'required');
        $this->form_validation->set_rules('phone', 'Phone No.', 'required');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('division', 'Division', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');
        $this->form_validation->set_rules('txn', 'Transaction ID', 'required');
        $data['name'] = $data['phone'] = $data['txn'] = $data['district'] = $data['division'] = $data['area'] = $data['user_id']='';
        return $data;
    }
}