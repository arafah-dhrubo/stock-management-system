<?php

class Cart_model extends CI_Model
{
	function index()
	{
		$data = $this->db->get("cart");
		return $data->result();
	}

	function add_cart($data)
	{
		$this->db->insert("cart", $data);
	}

	function get_cart($id)
	{
		return $this->db->get_where('cart', array('id' => $id))->row_array();
	}

	function get_name_quantity($id)
	{
		return $this->db->select(array('product', 'quantity'))->get_where('cart', array('id' => $id))->row_array();
	}

	function update_cart($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('cart', $data);
	}

	function delete_cart($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('cart');
	}


function total_price()
{
	$this->db->select_sum('net_price');
	$result = $this->db->get('cart')->row();
	return $result->net_price;
}
}
