<?php

class Customer_model extends CI_Model
{
	function index()
	{
		$data = $this->db->get("customers");
		return $data->result();
	}

	function add_customer($data)
	{
		$this->db->insert("customers", $data);
	}

	function get_customer($id)
	{
		return $this->db->get_where('customers', array('id' => $id))->row_array();
	}

	function update_customer($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('customers', $data);
	}

	function delete_customer($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('customers');
	}
}
