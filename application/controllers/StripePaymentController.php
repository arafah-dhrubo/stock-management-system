<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/libraries/PHPMailer_Lib.php';
class StripePaymentController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper('url');

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
        $this->sendMail($data['txn']);
        redirect('/');
    }

    //Get data from current order row
    public function extracted($id): array
    {
        $this->load->model('Order_model');
        $data = $this->Order_model->show_ordered_products($_SESSION['user']['user_id'], $id);

        $products = [];
        foreach (explode('|', $data[0]->products) as $item) {
            $item != "" ? array_push($products, $item) : "";
        }
        $this->load->model('Product_model');
        $ordered_products = [];
        foreach ($products as $index => $item) {
            $value = explode(',', $item);
            $temp = $this->Product_model->get_product($value[0]);
            $single = [];
            $single["id"] = $temp["id"];
            $single["image"] = $temp["image"];
            $single["name"] = $temp["name"];
            $single["price"] = $temp["price"];
            $single["qty"] = $value[1];
            $single["total"] = (int)$temp["price"] * (int)$value[1];
            $ordered_products[$index] = $single;
        }
        $this->load->view('order/show_order', [
            'data' => $data,
            'ordered_products' => $ordered_products
        ]);
        return array($data, $products, $ordered_products);
    }

    //Send email after successful payment
    public function sendMail($txn){

        $this->load->model('Order_model');
        $this->load->model('User_model');
        $id = (int)$this->Order_model->order_id($txn)[0]->id;
        $user = $this->User_model->get_user($_SESSION['user']['username']);
        $phpmailer_lib = new \PHPMailer\PHPMailer_Lib;

        // PHPMailer object
        $mail = $phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = "ssl://smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'samiul15-13051@diu.edu.bd';
        $mail->Password = 'zhmjqzdnybeuaxrz';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('samiul15-13051@diu.edu.bd', 'TDIpsum');
        $mail->addReplyTo('samiul15-13051@diu.edu.bd', 'TDIpsum');

        // Add a recipient
        $mail->addAddress($user['email']);

        // Email subject
        $mail->Subject = 'Order Confirmation';

        // Set email format to HTML
        $mail->isHTML(true);

        $data=$this->mailTemplate($id)[2];
        
        // Email body content
        $mail->Body = $this->load->view('order/email_template',$data,TRUE);

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }

    public function mailTemplate($id): array
    {
        $this->load->model('Order_model');
        $data = $this->Order_model->show_ordered_products($_SESSION['user']['user_id'], $id);

        $products = [];
        foreach (explode('|', $data[0]->products) as $item) {
            $item != "" ? array_push($products, $item) : "";
        }
        $this->load->model('Product_model');
        $ordered_products = [];
        foreach ($products as $index => $item) {
            $value = explode(',', $item);
            $temp = $this->Product_model->get_product($value[0]);
            $single = [];
            $single["id"] = $temp["id"];
            $single["image"] = $temp["image"];
            $single["name"] = $temp["name"];
            $single["price"] = $temp["price"];
            $single["qty"] = $value[1];
            $single["total"] = (int)$temp["price"] * (int)$value[1];
            $ordered_products[$index] = $single;
        }
        $this->load->view('order/show_order', [
            'data' => $data,
            'ordered_products' => $ordered_products
        ]);
        return array($data, $products, $ordered_products);
    }
}