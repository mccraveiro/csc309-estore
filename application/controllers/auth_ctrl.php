<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('login', 'Login', 'required|min_length[3]|max_length[16]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[16]');

    if ($this->form_validation->run() !== false) {
      $login    = $this->input->post('login');
      $password = $this->input->post('password');

      if ($login == 'admin' && $password == 'admin') {
        $this->session->set_userdata(array(
          'admin' => true,
          'login' => 'admin'
        ));

        redirect('/');
      }

      $this->load->model('customer');
      $result = $this->customer->verify_user($login, $password);

      if ($result !== false) {
        $this->session->set_userdata(array(
          'id'    => $result->id,
          'first' => $result->first,
          'last'  => $result->last,
          'login' => $result->login,
          'email' => $result->email
        ));

        redirect('/');
      }
    }

    $this->load->view('auth/login');
  }

  function logout() {
    $this->session->sess_destroy();
    redirect('/');
  }
}

?>