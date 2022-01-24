<?php

class User_model extends CI_Model
{
	function get_user($username)
	{
		return $this->db->get_where('users', array('username' => $username))->row_array();
	}

	function login($username)
	{
		$this->db->select('password');
		$query = $this->db->get_where('users', array('username' => $username))->row_array();;
		return $query['password'];
	}

	function register($data){
		$this->db->insert("users", $data);
	}
}

?>
