<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function add($id) {
    $this->load->model('product_model');
    $product = $this->product_model->get($id);

    $this->cart->insertOrUpdate(array(
      'id'    => $product->id,
      'qty'   => 1,
      'price' => $product->price,
      'name'  => $product->name
    ));

    $contents = $this->cart->contents();
    $this->output->set_output(json_encode($contents, JSON_PRETTY_PRINT));
  }
}

?>