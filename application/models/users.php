<?php

class Users extends CI_Model
{
	public function get_all_users()
	{
		$query = "SELECT * FROM users";
		$users = $this->db->query($query)->result_array();
		return $users;
	}
}

?>