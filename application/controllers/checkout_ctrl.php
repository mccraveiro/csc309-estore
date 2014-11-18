<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Checkout_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {

    if (is_logged()) {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('creditcard_number', 'Credit Card Number', 'required|max_length[19]');
      $this->form_validation->set_rules('creditcard_month', 'Credit Card Expiration Month', 'required|max_length[2]');
      $this->form_validation->set_rules('creditcard_year', 'Credit Card Expiration Year', 'required|max_length[4]|callback_credit_card_expiration['.$this->input->post('creditcard_month').']');

      if ($this->form_validation->run() !== false) {
        $creditcard_number = $this->input->post('creditcard_number');
        $creditcard_month  = $this->input->post('creditcard_month');
        $creditcard_year   = $this->input->post('creditcard_year');
        $creditcard_number = str_replace(' ', '', $creditcard_number);

        $this->load->model('order');

        $order = new $this->order();
        $order->customer_id = get_customer_id();
        $order->total = $this->cart->total();
        $order->creditcard_number = $creditcard_number;
        $order->creditcard_month = $creditcard_month;
        $order->creditcard_year = $creditcard_year;

        // save temporary order
        $this->session->set_userdata('order', serialize($order));

        redirect('checkout/review');
      }

      $this->load->view('checkout/payment');
    } else {
      $this->load->view('checkout/index');
    }
  }

  function credit_card_expiration($creditcard_year, $creditcard_month) {
    $this_year = date('y');
    $this_month = date('m');

    if ($creditcard_year < $this_year or ($creditcard_year == $this_year and $creditcard_month <= $this_month)) {
      $this->form_validation->set_message('credit_card_expiration', 'This credit card is expired');
      return FALSE;
    }

    return TRUE;
  }

  function review() {
    $this->load->model('order');
    $this->load->model('order_item');

    if ($this->input->get('confirmed') !== false) {
      $order = unserialize($this->session->userdata('order'));
      $order->save();

      foreach ($this->cart->contents() as $item) {
        $order_item = new $this->order_item();
        $order_item->order_id = $order->id;
        $order_item->product_id = $item['id'];
        $order_item->quantity = $item['qty'];
        $order_item->save();
      }

      $this->cart->destroy();
      $this->session->unset_userdata('order');

      redirect('receipt/'.$order->id);
    }

    $data['order'] = unserialize($this->session->userdata('order'));
    $data['cart_contents'] = $this->cart->contents();
    $data['cart_total'] = $this->cart->total();

    $this->load->view('checkout/review', $data);
  }

  function sendReceiptEmail() {
    // $this->load->library('email');

    // $this->email->from('your@example.com', 'Your Name');
    // $this->email->to('someone@example.com');
    // $this->email->cc('another@another-example.com');
    // $this->email->bcc('them@their-example.com');

    // $this->email->subject('Email Test');
    // $this->email->message('Testing the email class.');

    // $this->email->send();
  }
}

?>