<?php

Class Customer extends CI_Model {

  var $id = 0;
  var $first = '';
  var $last  = '';
  var $login = '';
  var $email = '';

  function login($login, $password) {

    $this->db->select('id, login, password');
    $this->db->from('customers');
    $this->db->where('login', $login);
    $this->db->where('password', $password);
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      return true;
    } else {
      return false;
    }
  }
}

?>