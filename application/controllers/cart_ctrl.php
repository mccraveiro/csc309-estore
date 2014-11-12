<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $data['cart_contents'] = $this->cart->contents();
    $data['cart_total'] = $this->cart->total();
    $this->load->view('cart/view.php', $data);
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

    $total_items = $this->cart->total_items();
    $this->output->set_output($total_items);
  }
}

?>