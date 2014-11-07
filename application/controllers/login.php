<?php

class Login extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $this->load->view('auth/login.php');
  }

  function validate() {
    $login    = $this->input->post('login');
    $password = $this->input->post('password');

    $this->load->model('customer');

    $result = $this->customer->login($login, $password);

    if ($result) {
      $this->output->set_output('Welcome!');
    } else {
      $this->output->set_output('FORBIDDEN');
    }
  }
}

?>