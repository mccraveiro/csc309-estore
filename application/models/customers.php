<?php

Class Customers extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  function getAll() {
    $query = $this->db
              ->from('customers')
              ->order_by('last', 'asc')
              ->get();

    return $query->result('Customer');
  }

  function delete($id) {
    $this->db->delete('customers', array('id' => $id));
  }
}

?>