<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();

    $config['upload_path'] = './images/product/';
    $config['allowed_types'] = 'gif|jpg|png';

    $this->load->library('upload', $config);
  }

  function view($id) {
    $this->load->model('product_model');
    $product = $this->product_model->get($id);

    $data['product'] = $product;

    $this->load->view('product/view.php', $data);
  }

  function edit($id) {
    if (!is_admin()) {
      redirect('/');
    }

    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required|max_length[45]');
    $this->form_validation->set_rules('description', 'Description', 'required');
    $this->form_validation->set_rules('price', 'Price', 'required');

    $this->load->model('product_model');

    if ($this->form_validation->run() !== false) {
      $name        = $this->input->post('name');
      $description = $this->input->post('description');
      $price       = $this->input->post('price');

      $product = new Product();
      $product->id = $id;
      $product->name = $name;
      $product->description = $description;
      $product->price = $price;

      $this->product_model->update($product);
      redirect('/');
    }

    $product = $this->product_model->get($id);
    $product->name        = set_value('name', $product->name);
    $product->description = set_value('description', $product->description);
    $product->price       = set_value('price', $product->price);

    $data['product'] = $product;

    $this->load->view('product/edit.php', $data);
  }

  function new_Product() {
    if (!is_admin()) {
      redirect('/');
    }

    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required|max_length[45]');
    $this->form_validation->set_rules('description', 'Description', 'required');
    $this->form_validation->set_rules('price', 'Price', 'required');

    $this->load->model('product_model');

    if ($this->form_validation->run() !== false) {
      if ($this->upload->do_upload('photo')) {
        $name        = $this->input->post('name');
        $description = $this->input->post('description');
        $price       = $this->input->post('price');

        $product = new Product();
        $product->id = $id;
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;

        $data = $this->upload->data();
        $product->photo_url = $data['file_name'];

        $this->product_model->insert($product);
        redirect('/');
      } else {
        $data['fileerror'] = $this->upload->display_errors();
      }
    }

    $product = new Product();
    $product->name        = set_value('name');
    $product->description = set_value('description');
    $product->price       = set_value('price');

    $data['product'] = $product;

    $this->load->view('product/new.php', $data);
  }

  function delete($id) {
    if (!is_admin()) {
      redirect('/');
    }

    $this->load->model('product_model');

    if (isset($id)) {
      $this->product_model->delete($id);
    }

    redirect('/');
  }
}

?>