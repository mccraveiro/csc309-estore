<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('is_admin')) {
  function is_admin() {
    $CI =& get_instance();
    $CI->load->library('session');
    $session = $CI->session->all_userdata();

    return (isset($session['admin']) && $session['admin']);
  }
}

if (!function_exists('is_logged')) {
  function is_logged() {
    $CI =& get_instance();
    $CI->load->library('session');
    $session = $CI->session->all_userdata();

    return (isset($session['login']));
  }
}

if (!function_exists('get_customer_id')) {
  function get_customer_id() {
    $CI =& get_instance();
    $CI->load->library('session');

    return $CI->session->userdata('id');
  }
}

if (!function_exists('get_customer_email')) {
  function get_customer_email() {
    $CI =& get_instance();
    $CI->load->library('session');

    return $CI->session->userdata('email');
  }
}