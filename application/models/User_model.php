<?php

class User_model extends CI_Model
{
	function get_user($username)
	{
		$query = $this->db->get_where('users', array('username' => $username))->row_array();
		return (bool)$query;
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
