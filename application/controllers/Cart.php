<?php

class Cart extends
    CI_Controller
{
    public function index()
    {
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
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $products["links"] = $this->pagination->create_links();
            $products['products'] = $this->Product_model->index($config["per_page"], $page);
            $this->load->view('cart/add_cart', ['data' => $products]);
        }
    }
    public function saveOrderInfo()
    {
        if ($this->form_validation->run() == false) {
            $form_data = $_POST;
            $this->load->view('category/index', ['data' => $data, 'form_data' => $form_data]);
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
