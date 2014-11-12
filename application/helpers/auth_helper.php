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