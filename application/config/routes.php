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
$route['frontend/submitQuery'] = 'frontend/home/submitQuery';
$route['thanks'] = 'frontend/home/thanks';
$route['404_override'] = 'frontend/home/notFound';
$route[':any'] = 'frontend/home/404_override';


/**
* Admin routes
*/
$route['admin:any'] = "backend/admin/index";
$route['admin']	= "backend/admin/index";
$route['admin'] = "backend/admin/index";
$route['login'] = "backend/admin/doLogin";
$route['update_password_admin'] = "backend/admin/updatePasswordAdmin";
$route['reset_password'] = "backend/admin/resetPassword";
$route['unauthorized'] = "backend/admin/unauthorized";

$route['query'] = "backend/admin/query";
$route['query_detail:any'] = "backend/admin/queryDetail";
$route['export_queries'] = "backend/admin/exportUsers";
$route['export_query:any'] = "backend/admin/exportSingleQuery";

$route['categories'] = "backend/category/index";
$route['admin/add_category'] = "backend/category/add";
$route['admin/insert_category'] = "backend/category/insert";
$route['edit_category:any'] = "backend/category/edit";
$route['change_category_status:any'] = "backend/category/ChangeStatus";
$route['update_category'] = "backend/category/update";
$route['delete_category:any'] = "backend/category/delete";

$route['brands'] = "backend/brand/index";
$route['add_brand'] = "backend/brand/add";
$route['insert_brand'] = "backend/brand/insert";
$route['edit_brand:any'] = "backend/brand/edit";
$route['change_brand_status:any'] = "backend/brand/ChangeStatus";
$route['update_brand'] = "backend/brand/update";
$route['delete_brand:any'] = "backend/brand/delete";

$route['products'] = "backend/product/index";
$route['add_product'] = "backend/product/add";
$route['insert_product'] = "backend/product/insert";
$route['edit_product:any'] = "backend/product/edit";
$route['change_product_status:any'] = "backend/product/ChangeStatus";
$route['update_product'] = "backend/product/update";
$route['delete_product:any'] = "backend/product/delete";

$route['pages'] = "backend/page/index";
$route['add_page'] = "backend/page/add";
$route['insert_page'] = "backend/page/insert";
$route['edit_page:any'] = "backend/page/edit";
$route['change_page_status:any'] = "backend/page/ChangeStatus";
$route['update_page'] = "backend/page/update";
$route['delete_page:any'] = "backend/page/delete";

$route['banners'] = "backend/banner/index";
$route['add_banner'] = "backend/banner/add";
$route['insert_banner'] = "backend/banner/insert";
$route['edit_banner:any'] = "backend/banner/edit";
$route['change_banner_status:any'] = "backend/banner/ChangeStatus";
$route['update_banner'] = "backend/banner/update";
$route['delete_banner:any'] = "backend/banner/delete";

$route['notifications'] = "backend/notification/index";
$route['insert_notification'] = "backend/notification/insert";
$route['edit_notification:any'] = "backend/notification/edit";
$route['change_notification_status:any'] = "backend/notification/ChangeStatus";
$route['update_notification'] = "backend/notification/update";
$route['delete_notification:any'] = "backend/notification/delete";

$route['account_setting'] = "backend/account/index";
$route['insert_account'] = "backend/account/insert";
$route['edit_account:any'] = "backend/account/edit";
$route['update_account'] = "backend/account/update";
$route['update_account_owner'] = "backend/account/updateAccountOwner";
$route['update_site_settings'] = "backend/account/updateSiteSettings";
$route['delete_account:any'] = "backend/account/delete";

$route['admin/logout'] = "backend/admin/logout";


/* End of file routes.php */
/* Location: ./application/config/routes.php */