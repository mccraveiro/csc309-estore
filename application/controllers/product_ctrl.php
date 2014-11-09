<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function view($id) {
    $this->load->model('product_model');
    $product = $this->product_model->get($id);
    $data['product'] = $product;
    $this->load->view('product/read.php', $data);
  }

  function edit($id) {
    $this->load->model('product_model');
    $product = $this->product_model->get($id);
    $data['product'] = $product;
    $this->load->view('product/editForm.php', $data);
  }
}

?>