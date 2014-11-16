<?php

Class Order_Item extends CI_Model {

  var $id = 0;
  var $order_id = 0;
  var $product_id = 0;
  var $quantity = 0;

  public function __construct() {
    parent::__construct();
  }

  public function save() {
    $this->db->insert('order_items', $this);
  }
}

?>