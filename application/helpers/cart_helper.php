<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('cart_number_of_items')) {
  function cart_number_of_items() {
    $CI =& get_instance();
    $CI->load->library('cart');

    return $CI->cart->total_items();
  }
}

if (!function_exists('cart_is_empty')) {
  function cart_is_empty() {
    $CI =& get_instance();
    $CI->load->library('cart');

    return ($CI->cart->total_items() == 0);
  }
}