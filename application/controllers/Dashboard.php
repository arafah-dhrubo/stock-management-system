<?php

class Dashboard extends
    CI_Controller
{
    public function index()
    {

        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Order_model');
        $orders = $this->Order_model->index($_SESSION['user']['user_id']);
        $orders=array_slice($orders, 0, 5);
        $today_order = $this->Order_model->today_order($_SESSION['user']['user_id']);
        $revenue = $total_order = 0;
        foreach ($today_order as $value) {
            $revenue += $value->payable;
            $total_order++;
        }

        $this->load->model('Product_model');
        $stock_out = $this->Product_model->stock_out($_SESSION['user']['user_id']);
        $stock_out=array_slice($stock_out, 0, 5);
        $this->load->view('dashboard/index', [
            'orders' => $orders,
            'revenue' => $revenue,
            'total_order' => $total_order,
            'stock_out' => $stock_out
        ]);
    }
}