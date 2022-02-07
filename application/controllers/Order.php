<?php

class Order extends
    CI_Controller
{
    public function index()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Order_model');
        $data = $this->Order_model->all_orders();
        $this->load->view('order/index', ['data' => $data]);
    }


}
