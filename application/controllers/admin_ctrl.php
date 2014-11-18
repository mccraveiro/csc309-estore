<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();

    if (!is_admin()) {
      redirect('/');
    }

    $this->load->model('orders');
    $this->load->model('order');
    $this->load->model('customers');
    $this->load->model('customer');
  }

  function list_customers() {
    $data['customers'] = $this->customers->getAll();
    $this->load->view('admin/customers', $data);
  }

  function delete_customer($id) {
    $this->customers->delete($id);
    redirect('/admin/customers');
  }

  function list_orders() {
    $data['orders'] = $this->orders->getAll();
    $this->load->view('admin/orders', $data);
  }

  function delete_order($id) {
    $this->orders->delete($id);
    redirect('/admin/orders');
  }
}