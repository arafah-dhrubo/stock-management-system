<?php

class Order_model extends CI_Model
{
    function index($user_id)
    {
        $data = $this->db->get_where("orders", array('user_id' => $user_id));
        return $data->result();
    }

    public function get_count()
    {
        return $this->db->count_all('orders');
    }

    function all_orders($limit, $start){
        $data = $this->db->get("orders",$limit, $start);
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

    function show_ordered_products($user_id, $id)
    {
        return $this->db->get_where('orders', array('user_id' => $user_id, 'id'=>$id))->result();
    }

    function today_order()
    {
        $this->db->select('*');
        $this->db->like('created_at', date("Y-m-d"));
        $data = $this->db->get('orders');
        return $data->result();
    }

    function place_order($data)
    {
        $this->db->insert("orders", $data);
    }
}
