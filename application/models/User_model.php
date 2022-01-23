<?php

class User_model extends CI_Model
{
	function login($data)
	{
		$query = $this->db->get_where('users', array('is_admin' => 1))->row_array();
		if ($query['username'] == $data['username'] && $query['password'] == $data['password']) {
			return true;
		}
	}
}

?>
