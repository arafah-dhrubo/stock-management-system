<?php

class Order_model extends CI_Model
{
    function index()
    {
        $data = $this->db->get("orders");
        return $data->result();
    }

    function get_cart_items()
    {
        //var_dump($this->db->get_where('cart', array('checked' => 'no'))->row_array());
        $this->db->select('CONCAT(product, ' . ', quantity) AS product', FALSE);
        return $this->db->get_where('cart', array('checked' => 'no'))->row_array();
    }

    function update_product($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    function delete_product($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }
}
