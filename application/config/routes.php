<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'store_ctrl';

$route['auth'] = 'auth_ctrl';
$route['signup'] = 'auth_ctrl/signup';
$route['logout'] = 'auth_ctrl/logout';

$route['product/(:num)'] = 'product_ctrl/view/$1';
$route['product/new'] = 'product_ctrl/new_product';
$route['product/edit/(:num)'] = 'product_ctrl/edit/$1';
$route['product/delete/(:num)'] = 'product_ctrl/delete/$1';

$route['cart'] = 'cart_ctrl';
$route['cart/add/(:num)'] = 'cart_ctrl/add/$1';
$route['cart/update/(:any)'] = 'cart_ctrl/update_item_qty/$1';
$route['cart/delete/(:any)'] = 'cart_ctrl/delete/$1';

$route['checkout'] = 'checkout_ctrl';
$route['checkout/review'] = 'checkout_ctrl/review';

$route['receipt/(:num)'] = 'receipt_ctrl/index/$1';
$route['orders'] = 'receipt_ctrl/list_orders';
$route['receipt/(:num)/email'] = 'receipt_ctrl/email_receipt/$1';

$route['admin/customers'] = 'admin_ctrl/list_customers';
$route['admin/customers/delete/(:num)'] = 'admin_ctrl/delete_customer/$1';
$route['admin/orders'] = 'admin_ctrl/list_orders';
$route['admin/orders/delete/(:num)'] = 'admin_ctrl/delete_order/$1';

$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
