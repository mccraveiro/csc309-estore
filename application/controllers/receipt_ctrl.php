<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Receipt_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index($id) {
    $this->load->model('order');
    $this->load->model('order_item');

    $order = new Order($id);

    if (!is_admin() and ($order->customer_id != get_customer_id())) {
      redirect('/');
    }

    $data['order'] = $order;
    $this->load->view('receipt/index', $data);
  }

  function list_orders() {

    if (!is_logged()) {
      redirect('/');
    }

    $this->load->model('orders');
    $this->load->model('order');

    $data['orders'] = $this->orders->getAllFromCustomer(get_customer_id());
    $this->load->view('orders', $data);
  }
}