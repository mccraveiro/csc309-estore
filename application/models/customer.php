<?php

Class Customer extends CI_Model {

  var $id = 0;
  var $first = '';
  var $last  = '';
  var $email = '';
  var $login = '';
  var $password = '';

  public function __construct() {
    parent::__construct();
  }

  public function getName() {
    return $this->first . ' ' . $this->last;
  }

  function save() {
    $this->db->insert('customers', $this);
    $this->id = $this->db->insert_id();
  }

  function create_session() {
    $this->load->library('session');
    $this->session->set_userdata('id',    $this->id);
    $this->session->set_userdata('first', $this->first);
    $this->session->set_userdata('last',  $this->last);
    $this->session->set_userdata('login', $this->login);
    $this->session->set_userdata('email', $this->email);
  }

  function auth() {
    $this->db->from('customers');
    $this->db->where('login', $this->login);
    $this->db->where('password', $this->password);
    $this->db->limit(1);

    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      $result = $query->row();

      $this->id    = $result->id;
      $this->first = $result->first;
      $this->last  = $result->last;
      $this->email = $result->email;
      $this->login = $result->login;

      $this->create_session();

      return true;
    }

    return false;
  }
}

?>