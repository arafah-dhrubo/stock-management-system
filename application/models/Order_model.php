<?php

class Order_model extends CI_Model
{
    function index($user_id)
    {
        $data = $this->db->get_where("orders", array('user_id' => $user_id));
        return $data->result();
    }

    function all_orders(){
        $data = $this->db->get_where("orders");
        return $data->result();
    }

    function review_cart($user_id)
    {
        $data = $this->db->get_where("cart", array('user_id' => $user_id, 'checked' => 'no'));
        return $data->result();
    }


    function show_orders($user_id)
    {
        return $this->db->get_where('orders', array('user_id' => $user_id))->result();
    }

    function today_order()
    {
        return $this->db->get_where('orders', array('created_at' =>date("Y-m-d")))->result();
    }
}
