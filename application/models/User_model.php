<?php
class User_model extends CI_Model {

  function authenticate($user, $pass) {
		$pass = md5($pass);
    $query = $this->db->get_where('users',
      array('username' => $user, 'password' => $pass));

	  return $query->result_object();
  }

  /**
   * Get an specific user
   */
  function getById($user_id) {
		$query = $this->db->get_where('users',
      array('id' => $user_id));

	  return $query->result_object();
  }

  /**
   * Get an specific user
   */
  function getByName($name) {
		$query = $this->db->get_where('users',
      array('first_name' => $name));

	  return $query->result_object();
  }

  /**
   * Get an specific user
   */
  function getByEmail($email) {
		$query = $this->db->get_where('users',
      array('email' => $email));

	  return $query->result_object();
  }

  function save($user)
  {
		$user['password'] = md5($user['password']);
    $r = $this->db->insert('users', $user);
    return $r;
  }

  function all()
  {
    $query = $this->db->get('users');

    return $query->result_object();
  }



}
