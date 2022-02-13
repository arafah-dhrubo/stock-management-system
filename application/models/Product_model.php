<?php

class Product_model extends CI_Model
{
    function index($limit, $start)
    {
        $data = $this->db->get('products', $limit, $start);
        return $data->result();
    }

    function allProduct()
    {
        return $this->db->get('products')->result();
    }

    public function get_count()
    {
        return $this->db->count_all('products');
    }

    function stock_out()
    {
        $data = $this->db->get_where('products', array('stock <=' => 5));
        return $data->result();
    }

    function show_product($user_id, $id)
    {
        $data = $this->db->get_where('products', array('user_id' => $user_id, 'id' => $id));
        return $data->result();
    }

    function add_product($data)
    {
        $this->db->insert("products", $data);
    }

    function get_product($id)
    {
        return $this->db->get_where('products', array('id' => $id))->row_array();
    }

    function get_id($name, $user_id)
    {
        return $this->db->select(array('id', 'price', 'stock'))->get_where('products', array('name' => $name, 'user_id' => $user_id))->row_array();

    }

    function update_product($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    function update_stock($id, $updated_stock)
    {
        $this->db->set('stock', $updated_stock);
        $this->db->where('id', $id);
        $this->db->update('products');
    }

    function delete_product($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    function search_product($keyword, $limit, $start)
    {
        $this->db->select('*');
        $this->db->like('name', $keyword, $limit, $start);
        $data = $this->db->get('products');
        return $data->result();
    }

    function fetch_product($query)
    {
        $this->db->like('name', $query);
        $data = $this->db->get('products');

        return $data->result();
    }
}
