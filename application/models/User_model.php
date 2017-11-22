<?php
class User_model extends CI_Model {

  function authenticate($user, $pass) {
		$pass = md5($pass);
    $query = $this->db->get_where('users',
      array('username' => $user, 'password' => $pass));

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
