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

$route['default_controller'] = "user/login";
$route['404_override'] = '';

$route['dang-ky'] = 'register';
$route['dang-nhap'] = 'user/login';
$route['khoi-phuc-mat-khau'] = 'user/forgotpassword';
$route['xac-nhan-khoi-phuc-mat-khau'] = 'user/confirmforgotpassword';
$route['thong-tin-tai-khoan'] = 'user/info';
$route['thoat'] = 'user/logout';


$route['cap-nhat-thong-tin'] = 'user/updateinfo';
$route['cap-nhat-mat-khau'] = 'user/changepass';
$route['cap-nhat-avatar'] = 'user/avatar';
$route['quan-ly-ket-noi'] = 'client/listservices';

$route['quan-ly-thanh-vien'] = 'admin/users';
$route['quan-ly-thanh-vien/(:num)'] = 'admin/users';
$route['thay-doi-thanh-vien'] = 'admin/users';

$route['quan-ly-dich-vu'] = 'admin/clients';
$route['them-moi-dich-vu'] = 'admin/addclient';




/* End of file routes.php */
/* Location: ./application/config/routes.php */