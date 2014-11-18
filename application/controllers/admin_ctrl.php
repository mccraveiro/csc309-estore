<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();

    if (!is_admin()) {
      redirect('/');
    }

    $this->load->model('customers');
    $this->load->model('customer');
  }

  function list_customers() {
    $data['customers'] = $this->customers->getAll();
    $this->load->view('admin/customers', $data);
  }

  function delete_customer($id) {
    $this->customers->delete($id);
    redirect('/customers');
  }
}