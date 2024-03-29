<?php

Class Orders extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  function getAll() {
    $query = $this->db
              ->from('orders')
              ->order_by('order_date', 'desc')
              ->get();

    return $query->result('Order');
  }

  function getAllFromCustomer($customer_id) {
    $query = $this->db
              ->from('orders')
              ->where('customer_id', $customer_id)
              ->order_by('order_date', 'desc')
              ->get();

    return $query->result('Order');
  }

  function delete($id) {
    $this->db->delete('orders', array('id' => $id));
  }
}

?>