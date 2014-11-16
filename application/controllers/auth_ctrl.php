<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_Ctrl extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('login', 'Login', 'required|min_length[3]|max_length[16]');
    // cannot validate password as min_length[6] because of 'admin'
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
      $customer = new $this->customer();
      $customer->login = $login;
      $customer->password = $password;

      $result = $customer->auth();

      if ($result !== false) {
        $this->redirect();
      }
    }

    $this->load->view('auth/login');
  }

  function signup() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('first', 'First Name', 'trim|required|max_length[24]');
    $this->form_validation->set_rules('last', 'Last Name', 'trim|required|max_length[24]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[45]|valid_email|is_unique[customers.email]');
    $this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[3]|max_length[16]|[customers.login]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[16]|matches[repeatpassword]');
    $this->form_validation->set_rules('repeatpassword', 'Repeat Password', 'required|min_length[6]|max_length[16]');

    if ($this->form_validation->run() !== false) {
      $first          = $this->input->post('first');
      $last           = $this->input->post('last');
      $email          = $this->input->post('email');
      $login          = $this->input->post('login');
      $password       = $this->input->post('password');
      $repeatpassword = $this->input->post('repeatpassword');

      if ($login == 'admin') {
        $this->form_validation->set_message('rule', 'Login cannot be "admin"');
        $this->load->view('auth/signup');
        return;
      }

      $this->load->model('customer');
      $customer = new $this->customer();
      $customer->first    = $first;
      $customer->last     = $last;
      $customer->email    = $email;
      $customer->login    = $login;
      $customer->password = $password;

      $customer->save();
      $customer->create_session();

      $this->redirect();
    }

    $this->load->view('auth/signup');
  }

  function logout() {
    $this->session->sess_destroy();
    redirect('/');
  }

  private function redirect() {
    if ($this->input->get('redirect') !== false) {
      redirect($this->input->get('redirect'));
    } else {
      redirect('/');
    }
  }
}

?>