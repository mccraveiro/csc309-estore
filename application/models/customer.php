<?php

Class Customer extends CI_Model {

  var $id = 0;
  var $first = '';
  var $last  = '';
  var $email = '';
  var $login = '';
  var $password = '';

  function __construct() {

  }

  function save() {
    $this->db->insert('customers', $this);
  }

  function create_session() {
    $this->load->library('session');
    $this->session->set_userdata(array(
      'id'    => $this->id,
      'first' => $this->first,
      'last'  => $this->last,
      'login' => $this->login,
      'email' => $this->email
    ));
  }

  function verify_user() {

    $this->db->from('customers');
    $this->db->where('login', $this->login);
    $this->db->where('password', $this->password);
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      return $query->row();
    }

    return false;
  }
}

?>