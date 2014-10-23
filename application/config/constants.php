<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */

/**
* FrontEnd Constants
*/

define('ASSETS_FRONTEND_CSS_DIR' ,  'assets/frontend/css/');
define('ASSETS_FRONTEND_JS_DIR' ,  'assets/frontend/js/');
define('ASSETS_FRONTEND_FONTAWESOME_DIR' ,  'assets/frontend/font-awesome-4.1.0/');
define('ASSETS_FRONTEND_IMAGE_DIR' ,  'assets/frontend/img/');
define('DEFAULT_LOGO' ,  'assets/frontend/img/logo.png');
define('LIMIT_PAGINATION' ,  '10');
define('CAPTCHA_DIR' ,  'captcha');

/**
* Admin Constants
*/

define('NO_RECORD_FOUND' ,  'No Record Found!');
define('ASSETS_ADMIN_CSS_DIR' ,  'assets/admin/css/');
define('ASSETS_ADMIN_JS_DIR' ,  'assets/admin/js/');
define('ASSETS_ADMIN_DATATABLE_DIR' ,  'assets/admin/media/');
define('ASSETS_ADMIN_IMAGE_DIR' ,  'assets/admin/img/');
define('IMAGES_CATEGORY_DIR'		, 'assets/uploads/categories/');
define('IMAGES_BRAND_DIR'		, 'assets/uploads/brands/');
define('IMAGES_PAGES_DIR'		, 'assets/uploads/pages/');
define('IMAGES_PRODUCTS_DIR'		, 'assets/uploads/products/');
define('IMAGES_GALLERY_DIR'		, 'assets/uploads/banners/');



