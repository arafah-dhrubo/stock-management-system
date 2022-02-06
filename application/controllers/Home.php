<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends
    CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->model('Product_model');
        $data = $this->Product_model->allProduct();
        $this->load->view('home/index', ['data' => $data]);
    }

    public function productDetail($id)
    {
        $this->load->model('Product_model');
        $product = $this->Product_model->get_product($id);
        $this->load->view('product/product_detail', ['product' => $product]);
    }

    public function addCart($id)
    {
        $this->load->model('Product_model');
        $this->load->library('cart');
        $product = $this->Product_model->get_product($id);

        $this->cart->insert(array(
            'id' => $product['id'],
            'qty' => 1,
            'price' => $product['price'],
            'name' => $product['name'],
        ));
        $item = array(
            'color' => 'green',
            'message' => 'product added to cart successfully'
        );
        $this->session->set_tempdata($item, NULL, 1);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function upCart($rowid, $qty)
    {
        (int)$qty++;
        $result = $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => $qty,
        ));
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function downCart($rowid, $qty)
    {
        (int)$qty--;
        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => $qty--,
        ));
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteCart()
    {
        $this->cart->destroy();
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function showCart()
    {
        $form_data = $this->getValidation();
        $data = $this->cart->contents();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->saveOrderInfo();
        } else {
            $this->load->view('cart/show_cart', ['data' => $data, 'form_data' => $form_data]);
        }
    }

    public function removeCart($rowId)
    {
        $this->cart->remove($rowId);
        $item = array(
            'color' => 'green',
            'message' => 'Cart cleared successfully'
        );
        $this->session->set_tempdata($item, NULL, 1);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getValidation(): array
    {
        $this->form_validation->set_rules('name', 'Full name', 'required');
        $this->form_validation->set_rules('phone', 'Phone No.', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('division', 'Division', 'required');
        $this->form_validation->set_rules('area', 'Area', 'required');

        $data['name'] = $data['phone'] = $data['district'] = $data['division'] = $data['area'] = '';
        return $data;
    }

    public function saveOrderInfo(){
        if ($this->form_validation->run() == false) {
            $form_data = $_POST;
            $this->load->view('category/index', ['data' => $data, 'form_data' => $form_data]);
        } else {
            $order_info = array(
                'user_id'=>$_SESSION['user']['user_id'],
                'name'=>$_POST['name'],
                'phone'=>$_POST['phone'],
                'district'=>$_POST['district'],
                'division'=>$_POST['division'],
                'area'=>$_POST['area'],
            );
            $_SESSION['order_info']=$order_info;
            $item = array(
                'color' => 'green',
                'message' => 'Information saved successfully'
            );
            $this->session->set_tempdata($item, NULL, 1);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function removeOrderInfo(){
        unset($_SESSION['order_info']);
        $item = array(
            'color' => 'green',
            'message' => 'Information cleared successfully'
        );
        $this->session->set_tempdata($item, NULL, 1);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function history(){
        $this->load->model('Order_model');
        $data=$this->Order_model->show_orders($_SESSION['user']['user_id']);
        $this->load->view('order/show_order', ['data'=>$data]);
    }
}
