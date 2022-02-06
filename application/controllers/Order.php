<?php

class Order extends
    CI_Controller
{
    public function index()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');
        $this->load->model('Order_model');
        $data = $this->Order_model->index($_SESSION['user']['user_id']);
        $this->load->view('order/index', ['data' => $data]);
    }

    public function checkout()
    {
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');

        $this->load->model('Cart_model');
        $total_price = $this->Cart_model->total_price($_SESSION['user']['user_id']);
        if($total_price<=0){
            $item = array(
                'color' => 'red',
                'message' => 'Add cart items'
            );
            $this->session->set_tempdata($item, NULL, 3);
            redirect('/cart/index');
        }
        $data=array();
        $data['customer']= $data['payable']='';
        $this->load->model('Order_model');
        $cart = $this->Order_model->review_cart($_SESSION['user']['user_id']);

        $this->load->model('Customer_model');
        $customer = $this->Customer_model->index($_SESSION['user']['user_id']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $products = '';
            foreach ($cart as $value) {
                $this->Cart_model->checked_cart($value->id);
                $products = $products . ' | ' . $value->id.','.$value->quantity;
            }
            $data['user_id']=$_SESSION['user']['user_id'];
            $data['customer']=$_POST['customer'];
            $data['products']= $products;
            $data['payable']=$total_price;
            $data['created_at']=date("Y-m-d");
            $this->Order_model->place_order($data);
            $item = array(
                'color' => 'green',
                'message' => 'Checkout Successful'
            );
            $this->session->set_tempdata($item, NULL, 3);
            redirect('order/index');
        }


        $this->load->view('order/checkout', ['cart' => $cart,
            'total_price'=>$total_price,
            'data'=>$data,
            'customer'=>$customer]);
    }

}
