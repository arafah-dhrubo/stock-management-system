<?php

class Product_model extends CI_Model
{
	function index()
	{
		$data = $this->db->get("products");
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

	function get_id($name)
	{
		return $this->db->select(array('id', 'price', 'stock'))->get_where('products', array('name' => $name))->row_array();

	}

	function update_product($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('products', $data);
	}

	function update_stock($id, $updated_stock){
		$this->db->set('stock', $updated_stock);
		$this->db->where('id', $id);
		$this->db->update('products'); // gives UPDATE mytable SET field = field+1 WHERE id = 2
	}

	function delete_product($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('products');
	}
}
