<?php

class Order_model extends CI_Model
{
    function index($user_id)
    {
        $data = $this->db->get_where("orders", array('user_id' => $user_id));
        return $data->result();
    }

    function review_cart($user_id)
    {
        $data = $this->db->get_where("cart", array('user_id' => $user_id, 'checked' => 'no'));
        return $data->result();
    }

    function cart_items($user_id)
    {
        $this->db->select("CONCAT(id, ',', quantity) AS product", FALSE);
        $data = $this->db->get_where('cart', array('checked' => 'no', 'user_id' => $user_id));
        return $data->result();
    }

    function place_order($data)
    {
        $this->db->insert('orders', $data);
    }

    function today_order($user_id)
    {
        return $this->db->get_where('orders', array('user_id' => $user_id, 'created_at' =>date("Y-m-d")))->result();
    }
}
