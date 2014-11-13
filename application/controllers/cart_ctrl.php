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

    if ($this->input->post('qty') !== false) {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('qty', 'Quantity', 'required|integer');

      if (!$this->form_validation->run()) {
        redirect('/product/'.$id);
      }

      $qty = $this->input->post('qty');
      $this->cart->insertOrUpdate(array(
        'id'    => $product->id,
        'qty'   => $qty,
        'price' => $product->price,
        'name'  => $product->name
      ));

      redirect('/cart');
    } else {
      $qty = $this->input->post('qty');
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

  function update_item_qty($rowid) {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('qty', 'Quantity', 'required|integer');

    if ($this->form_validation->run() !== false) {
      $qty = $this->input->post('qty');
      $this->cart->update(array(
        'rowid' => $rowid,
        'qty'   => $qty
      ));
    }

    redirect('cart');
  }

  function delete($rowid) {
    $this->cart->update(array(
      'rowid' => $rowid,
      'qty'   => 0
    ));

    redirect('cart');
  }
}

?>