<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StripePaymentController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper('url');
        var_dump($this->cart->total());
    }

    public function handlePayment()
    {
        require_once('application/libraries/stripe-php/init.php');

        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $response = \Stripe\Charge::create([
            "amount" => ($this->cart->total() + 60) * 100,
            "currency" => "bdt",
            "source" => $this->input->post('stripeToken'),
            "description" => $_SESSION['user']['user_id'] . '|' . $_SESSION['order_info']['name'] . '|' . $_SESSION['order_info']['phone']
        ]);

        $products = '';
        $cart = $this->cart->contents();
        $this->load->model(Product_model::class);

        foreach ($cart as $item) {
            $products = $products. '|' .$item['id'] . ',' . $item['qty'] ;
            $product=$this->Product_model->get_product($item['id']);
            $stock=$product['stock']-$item['qty'];
            $this->Product_model->update_stock($item['id'],$stock);
        }

        $data = array(
            "user_id" => $_SESSION['user']['user_id'],
            "name" => $_SESSION['order_info']['name'],
            "phone"=> $_SESSION['order_info']['phone'],
            "division"=> $_SESSION['order_info']['division'],
            "district"=> $_SESSION['order_info']['district'],
            "area"=> $_SESSION['order_info']['area'],
            "products" => $products,
            "payable" => $this->cart->total(),
            "txn" => $response['payment_method'],
            "created_at"=>date('Y-m-d H:i:s')
        );
       $this->load->model('Order_model');
       $this->Order_model->place_order($data);

        $item = array(
            'color' => 'green',
            'message' => 'Payment Successful'
        );
        $this->session->set_tempdata($item, NULL, 1);

        unset($_SESSION['order_info']);
        $this->cart->destroy();

        redirect($_SERVER['HTTP_REFERER']);
    }
}