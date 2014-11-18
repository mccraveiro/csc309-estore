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

  public function __construct($id = 0) {
    parent::__construct();

    if ($id != 0) {
      $this->loadById($id);
    }
  }

  public function getTotal() {
    return money_format('%.2n', $this->total);
  }

  public function save() {
    $this->db
      ->set($this)
      ->set('order_date', 'NOW()', FALSE)
      ->set('order_time', 'NOW()', FALSE)
      ->insert('orders');

    $this->id = $this->db->insert_id();
  }

  public function getItems() {
    $items = array();

    $query = $this->db->get_where('order_items', array('order_id' => $this->id));

    foreach ($query->result('order_item') as $order_item) {
      $q = $this->db->get_where('products', array('id' => $order_item->product_id));
      $product =  $q->row();

      $items[] = array(
        'id'    => $product->id,
        'name'  => $product->name,
        'qty'   => $order_item->quantity,
        'price' => $product->price
      );
    }

    return $items;
  }

  public function getCustomer() {
    $this->load->model('customer');
    $query = $this->db
              ->from('customers')
              ->where('id', $this->customer_id)
              ->get();
    return $query->row(0, 'customer');
  }

  public function getCustomerName() {
    $customer = $this->getCustomer();
    return $customer->getName();
  }

  protected function loadById($id) {
    $query = $this->db->get_where('orders', array('id' => $id));
    $result = $query->row();

    $this->id = $result->id;
    $this->customer_id = $result->customer_id;
    $this->order_date = $result->order_date;
    $this->order_time = $result->order_time;
    $this->total = $result->total;
    $this->creditcard_number = $result->creditcard_number;
    $this->creditcard_month = $result->creditcard_month;
    $this->creditcard_year = $result->creditcard_year;
  }
}

?>