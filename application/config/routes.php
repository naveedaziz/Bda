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
|	$route['default_controller'] = 'user';
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


/**
* Frontend routes
*/
$route['default_controller'] = 'frontend/home';
$route['home:any'] = 'frontend/home/index';
$route['category'] = "frontend/home/getAllProducts";
$route['category:any'] = "frontend/home/getAllProducts";
$route['pages:any'] = "frontend/home/getPageDetail";
$route['search'] = "frontend/home/getSearchDetail";
$route['search:any'] = "frontend/home/getSearchDetail";
$route['vending_solution'] = "frontend/home/getVendingSolution";
$route['vending_product:any'] = "frontend/home/getVendingProductDetail";
$route['product:any'] = 'frontend/home/getProductDetail';
$route['enquiry'] = 'frontend/home/query';
$route['enquiry:any'] = 'frontend/home/query';
$route['submitQuery'] = 'frontend/home/submitQuery';
$route['thanks'] = 'frontend/home/thanks';
$route['404_override'] = 'frontend/home/notFound';

/**
* Admin routes
*/

$route['admin'] = "backend/admin/index";
$route['admin/login'] = "backend/admin/doLogin";
$route['admin/update_password_admin'] = "backend/admin/updatePasswordAdmin";
$route['admin/reset_password'] = "backend/admin/resetPassword";
$route['admin/reset-password:any'] = "backend/admin/forgotPasswordReset";
$route['admin/unauthorized'] = "backend/admin/unauthorized";
$route['admin/forgot-password'] = "backend/admin/forgotPassword";

$route['admin/query'] = "backend/admin/query";
$route['admin/query_detail:any'] = "backend/admin/queryDetail";
$route['admin/export_queries'] = "backend/admin/exportUsers";
$route['admin/export_query:any'] = "backend/admin/exportSingleQuery";

$route['admin/categories'] = "backend/category/index";
$route['admin/add_category'] = "backend/category/add";
$route['admin/insert_category'] = "backend/category/insert";
$route['admin/edit_category:any'] = "backend/category/edit";
$route['admin/change_category_status:any'] = "backend/category/changeStatus";
$route['admin/update_category'] = "backend/category/update";
$route['admin/delete_category:any'] = "backend/category/delete";

$route['admin/brands'] = "backend/brand/index";
$route['admin/add_brand'] = "backend/brand/add";
$route['admin/insert_brand'] = "backend/brand/insert";
$route['admin/edit_brand:any'] = "backend/brand/edit";
$route['admin/change_brand_status:any'] = "backend/brand/changeStatus";
$route['admin/update_brand'] = "backend/brand/update";
$route['admin/delete_brand:any'] = "backend/brand/delete";

$route['admin/products'] = "backend/product/index";
$route['admin/add_product'] = "backend/product/add";
$route['admin/insert_product'] = "backend/product/insert";
$route['admin/edit_product:any'] = "backend/product/edit";
$route['admin/change_product_status:any'] = "backend/product/changeStatus";
$route['admin/update_product'] = "backend/product/update";
$route['admin/delete_product:any'] = "backend/product/delete";

$route['admin/pages'] = "backend/page/index";
$route['admin/add_page'] = "backend/page/add";
$route['admin/insert_page'] = "backend/page/insert";
$route['admin/edit_page:any'] = "backend/page/edit";
$route['admin/change_page_status:any'] = "backend/page/changeStatus";
$route['admin/update_page'] = "backend/page/update";
$route['admin/delete_page:any'] = "backend/page/delete";

$route['admin/banners'] = "backend/banner/index";
$route['admin/add_banner'] = "backend/banner/add";
$route['admin/insert_banner'] = "backend/banner/insert";
$route['admin/edit_banner:any'] = "backend/banner/edit";
$route['admin/change_banner_status:any'] = "backend/banner/changeStatus";
$route['admin/update_banner'] = "backend/banner/update";
$route['admin/delete_banner:any'] = "backend/banner/delete";

$route['admin/notifications'] = "backend/notification/index";
$route['admin/insert_notification'] = "backend/notification/insert";
$route['admin/edit_notification:any'] = "backend/notification/edit";
$route['admin/change_notification_status:any'] = "backend/notification/changeStatus";
$route['admin/update_notification'] = "backend/notification/update";
$route['admin/delete_notification:any'] = "backend/notification/delete";

$route['admin/account_setting'] = "backend/account/index";
$route['admin/insert_account'] = "backend/account/insert";
$route['admin/edit_account:any'] = "backend/account/edit";
$route['admin/update_account'] = "backend/account/update";
$route['admin/update_account_owner'] = "backend/account/updateAccountOwner";
$route['admin/update_site_settings'] = "backend/account/updateSiteSettings";
$route['admin/delete_account:any'] = "backend/account/delete";
$route['admin/logout'] = "backend/admin/logout";
$route[':any'] = 'frontend/home/notFound';


/* End of file routes.php */
/* Location: ./application/config/routes.php */