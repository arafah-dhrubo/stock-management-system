<?php
use \controller\Home;
class Checkout extends CI_Controller
{
    function index(){
        if (!$_SESSION['user']['username'])
            redirect('/accounts/login');

        if($this->cart->total_items() <= 0){
            redirect($_SERVER['HTTP_REFERER']);
        }

        $this->form_validation->set_rules('address', 'Address', 'required');

        if($_SERVER['REQUEST_METHOD']=='POST'){
            if($this->form_validation->run() == true){
                $insert = $this->product->insertCustomer($custData);
                $home = new Home;
                $home->htmlMail();
            }
        }
    }
}