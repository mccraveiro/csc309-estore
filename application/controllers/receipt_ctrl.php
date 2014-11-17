<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Receipt_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index($id) {
    $this->load->model('order');
    $this->load->model('order_item');

    $order = new Order($id);

    $data['order'] = $order;
    $this->load->view('receipt/index', $data);
  }
}