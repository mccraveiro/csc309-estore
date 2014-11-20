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

  function email_receipt($id) {
    $this->load->model('order');
    $this->load->model('order_item');

    $order = new Order($id);

    if (!is_admin() and ($order->customer_id != get_customer_id())) {
      redirect('/');
    }

    $data['order'] = $order;
    $body = $this->load->view('receipt/receipt', $data, TRUE);

    $config = array(
      'protocol' => 'smtp',
      'smtp_crypto' => 'ssl',
      'smtp_host' => 'smtp.gmail.com',
      'smtp_port' => 465,
      'smtp_user' => '', // Fill in with your credentials
      'smtp_pass' => '', // Fill in with your credentials
      'mailtype'  => 'html',
      'charset'   => 'utf-8'
    );

    $this->load->library('email');
    $this->email->initialize($config);

    $this->email->from($config['smtp_user'], 'eStore');
    $this->email->to(get_customer_email());

    $this->email->subject('eStore - receipt order #'.$order->id);
    $this->email->message($body);

    $this->email->send();
    $this->email->print_debugger();
  }
}