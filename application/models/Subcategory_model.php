<?php

class Subcategory_model extends CI_Model
{
	function index()
	{
		$data = $this->db->get("subcategories");
		return $data->result();
	}

	function create_subcategory($data)
	{
		$this->db->insert("subcategories", $data);
	}

	function get_subcategory($id)
	{
		return $this->db->get_where('subcategories', array('id' => $id))->row_array();
	}

	function update_subcategory($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('subcategories', $data);
	}

	function delete_subcategory($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('subcategories');
	}
}
