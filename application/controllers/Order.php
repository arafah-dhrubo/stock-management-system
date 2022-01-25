<?php

class Order extends
    CI_Controller
{
    public function index()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Order_model');
        $data = $this->Order_model->index();
        $this->load->view('order/index', ['data' => $data]);
    }

    public function checkout()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Order_model');
        $data = $this->Order_model->get_cart_items();
        var_dump($data);
        $this->load->view('Order/checkout', ['data' => $data]);
    }

    public function delete_product($id)
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Product_model');
        $this->Product_model->delete_product($id);
        redirect(base_url() . 'product/index');
    }
}
