<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store_Ctrl extends CI_Controller {

  function __construct() {
    // Call the Controller constructor
    parent::__construct();
  }

  function index() {
    $this->load->model('product_model');
    $products = $this->product_model->getAll();

    $data['products'] = $products;
    $data['session'] = $this->session->all_userdata();

    $this->load->view('store.php', $data);
  }

  function delete($id) {
    $this->load->model('product_model');

    if (isset($id))
      $this->product_model->delete($id);

    //Then we redirect to the index page again
    redirect('store/index', 'refresh');
  }
}