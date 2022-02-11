<?php

class Order extends
    CI_Controller
{
    public function index()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');

        $data = $this->getOrders();
        $this->load->view('order/index', ['data' => $data]);
    }

    public function getOrders(): array
    {

        $this->load->model('Order_model');
        $config = array();
        $config["base_url"] = base_url() . "order";
        $config["total_rows"] = $this->Order_model->get_count();
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
        $config['cur_tag_open'] =  '<li class="active bg-indigo-500 text-white w-6 h-6 text-center rounded"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $orders["links"] = $this->pagination->create_links();
        $orders['orders'] = $this->Order_model->all_orders($config["per_page"], $page);
        return $orders;
    }
}
