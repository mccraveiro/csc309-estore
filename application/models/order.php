<?php

Class Order extends CI_Model {

  var $id = 0;
  var $customer_id = 0;
  var $order_date = null;
  var $order_time = null;
  var $total = 0.0;
  var $creditcard_number = '';
  var $creditcard_month = 0;
  var $creditcard_year = 0;

  public function __construct() {
    parent::__construct();
  }

  public function save() {
    $this->db->set($this);
    $this->db->set('order_date', 'NOW()', FALSE);
    $this->db->set('order_time', 'NOW()', FALSE);
    $this->db->insert('orders');

    $this->id = $this->db->insert_id();
  }
}

?>