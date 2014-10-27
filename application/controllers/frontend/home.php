<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @Filename: home.php
 * Location: ./application/controllers/frontend/home.php
 * Function: Home class handles the frontend
 * views and category,product and brands listing and query.
 *
 * @Author: Anum Ishtiaq
 * @Creator: Bramerz.pk
 *
 */
/**
 * this Home class extends CI_Controller
 * @see main_class
 */
class Home extends CI_Controller

{
	/**
	 * Constructor
	 * set headers for no-cache
	 * load helpers and libraries
	 */

	// --------------------------------------------------------------------

	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->helper('url');
		$this->load->helper('common_helper');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('frontend/modelfrontend');
		$_SESSION['site_meta'] = $this->modelfrontend->getSeoData('np_site_settings');
		$_SESSION['site_meta']->images = base_url() . DEFAULT_LOGO;
		date_default_timezone_set('Asia/Karachi');
	}

	// --------------------------------------------------------------------

	/**
	 * Index
	 *
	 * This function is the entery point to this class.
	 * It shows login form to user.
	 *
	 * @access	public
	 * @return	void
	 */
	public function index()
	{

		// set session page name

		$this->session->set_userdata('page', 'home');

		// declare table name

		$table_name = 'np_general_settings';
		$filter = 'category';

		// get record

		$data['categories'] = $this->modelfrontend->getAllData($table_name, $filter);
		$filter_banner = 'banner';
		$data['banners'] = $this->modelfrontend->getAllData($table_name, $filter_banner);

		// print_r($data['banners']);die();
		// load view

		$this->load->view('frontend/index', $data);
	}

	// --------------------------------------------------------------------

	/**
	 * getAllProducts
	 *
	 * load all products with pagination
	 *
	 * @access	public
	 * @return	void
	 */
	public function getAllProducts()
	{
		$data = '';

		// get categories

		$table_name = 'np_general_settings';
		$filter = 'category';
		$data['categories'] = $this->modelfrontend->getAllData($table_name, $filter);
		$filter = $this->uri->segment(2);

		// get single catagory

		$data['catagory'] = $this->modelfrontend->getRecord($table_name, $filter);
		//print_r($data['catagory']);die();
		if (isset($data['catagory']) && isset($data['catagory']->title)) {
			$_SESSION['site_meta'] = $data['catagory'];
			$imageDefault = (array)json_decode($_SESSION['site_meta']->images);
			if (isset($imageDefault[0])) {
				$_SESSION['site_meta']->images = base_url() . $imageDefault[0];
			}
		}else{
			redirect(base_url() . '404_override');
		}
		
		// get url parameter
		// get products

		$table_name = 'np_products';
		if(isset($data['catagory']->id)){
			$filterCatagory = $data['catagory']->id;
		}else{
			$filterCatagory = false;
		}
		$data['products'] = $this->modelfrontend->getProductCount($table_name, $filterCatagory);
		//print_r($data['products']);die();
		$data['active_category'] = $filter;

		// load query detail view

		$this->load->view('frontend/products', $data);
	}

	// --------------------------------------------------------------------

	/**
	 * getProductDetail
	 *
	 * get request pram from uri and get that record to display product detail
	 *
	 * @access	public
	 * @return	void
	 */
	public function getProductDetail()
	{
		$data = '';

		// get url parameter

		$id = $this->uri->segment(2);

		// get product

		$table_name = 'np_products';
		$data['product'] = $this->modelfrontend->getRecord($table_name, $id);
		$data['product_detail'] = $this->modelfrontend->getRecord($table_name, $id);
		if (isset($data['product_detail']) && isset($data['product_detail']->title)) {
			$_SESSION['site_meta'] = $data['product_detail'];
			$imageDefault = (array)json_decode($_SESSION['site_meta']->images);
			if (isset($imageDefault[0])) {
				$_SESSION['site_meta']->images = base_url() . $imageDefault[0];
			}
		}else{
			redirect(base_url() . '404_override');
		}

		// load view

		$this->load->view('frontend/product_detail', $data);
	} // --------------------------------------------------------------------
	/**
	 * getProductDetail
	 *
	 * get request pram from uri and get that record to display product detail
	 *
	 * @access	public
	 * @return	void
	 */
	public function getVendingProductDetail()
	{
		$data = '';

		// get url parameter

		$id = $this->uri->segment(2);

		// get product

		$table_name = 'np_products';
		$data['product'] = $this->modelfrontend->getRecord($table_name, $id);

		// load view

		$this->load->view('frontend/vending_detail', $data);
	}

	// --------------------------------------------------------------------

	public function getPageDetail()
	{
		$data = '';

		// get url parameter

		$slug = $this->uri->segment(2);
		$this->session->set_userdata('page', $slug);

		// get pages

		$table_name = 'np_general_settings';
		$data['page'] = $this->modelfrontend->getPageRecord($table_name, $slug);
		
		$data['page_detail'] = $this->modelfrontend->getPageRecord($table_name, $slug);
		if (isset($data['page_detail']) && isset($data['page_detail']->title)) {
			$_SESSION['site_meta'] = $data['page_detail'];
			$imageDefault = (array)json_decode($_SESSION['site_meta']->images);
			if (isset($imageDefault[0])) {
				$_SESSION['site_meta']->images = base_url() . $imageDefault[0];
			}
		}else{
			redirect(base_url() . '404_override');
		}

		// load view

		$this->load->view('frontend/layout/detail_template', $data);
	}

	public function getSearchDetail()
	{
		$data = '';

		// get categories

		$filter = Encode($this->input->post('search_string'));
		$data['search_string'] = $filter;
		$data['search_data'] = $this->modelfrontend->getSearchRecord($filter);

		// print_r($data['search_data']->row());die();
		// get url parameter
		// get products

		$table_name = 'np_products';
		$data['products'] = $this->modelfrontend->getProductCount($table_name, $filter);
		$data['active_category'] = $filter;

		// load view

		$this->load->view('frontend/search', $data);
	}

	// --------------------------------------------------------------------

	public function getVendingSolution()
	{
		$data = '';

		// set session page name

		$this->session->set_userdata('page', 'vending_solution');

		// get categories

		$table_name = 'np_general_settings';
		$filter = 'category';
		$data['category'] = $this->modelfrontend->getRecord($table_name, $filter);
		
		$data['category_detail'] = $this->modelfrontend->getRecord($table_name, $filter);
		if (isset($data['category_detail']) && isset($data['category_detail']->title)) {
			$_SESSION['site_meta'] = $data['category_detail'];
			$imageDefault = (array)json_decode($_SESSION['site_meta']->images);
			if (isset($imageDefault[0])) {
				$_SESSION['site_meta']->images = base_url() . $imageDefault[0];
			}
		}else{
			redirect(base_url() . '404_override');
		}
		// get products

		if ($data['category']) {
			$table_name = 'np_products';
			$filter = $data['category']->id;
			$data['products'] = $this->modelfrontend->getAllProducts($table_name, $filter);
		}

		// load view

		$this->load->view('frontend/vending_solution', $data);
	}

	// --------------------------------------------------------------------

	/**
	 * query
	 *
	 * Load query view
	 *
	 * @access	public
	 * @return	void
	 */
	public function query()
	{

		// get url parameter

		$id = $this->uri->segment(2);

		// get brands

		$table_name = 'np_general_settings';
		$filter = 'brand';
		$data['brands'] = $this->modelfrontend->getAllData($table_name, $filter);

		// get categories

		$table_name = 'np_general_settings';
		$filter = 'category';
		$data['categories'] = $this->modelfrontend->getAllData($table_name, $filter);
		if ($this->uri->segment(2)) {
			$data['product_id'] = $this->uri->segment(2);
		}

		// load qury view

		$this->load->view('frontend/query', $data);
	}

	// --------------------------------------------------------------------

	/**
	 * Thanks
	 *
	 * Load query view
	 *
	 * @access	public
	 * @return	void
	 */
	public function thanks()
	{

		// load user view with data listing

		$this->load->view('frontend/thanks');
	}

	// --------------------------------------------------------------------

	/**
	 * Insert
	 *
	 * This function get values from add brand form and passes an array to model.
	 *
	 *
	 * @access	public
	 * @return	void
	 */
	public function submitQuery()
	{

		// get form data
		//print_r($this->input->post('category_name'));die();
		$catagory_name = $this->input->post('category_name');
		$array['first_name'] = Encode($this->input->post('firstname'));
		$array['last_name'] = Encode($this->input->post('lastname'));
		$array['product_id'] = Encode($this->input->post('product_id'));
		$array['company_name'] = Encode($this->input->post('company'));
		if(!empty($catagory_name)){
			$array['category_name'] = Encode($this->input->post('category_name'));
		}else{
			$array['category_name'] = '';
		}
		$array['brand_name'] = Encode($this->input->post('brand_name'));
		$array['city'] = Encode($this->input->post('city'));
		$array['phone'] = Encode($this->input->post('contact'));
		$array['email'] = Encode($this->input->post('email'));
		$array['address'] = Encode($this->input->post('address'));
		$array['note'] = Encode($this->input->post('description'));
		$array['created_at'] = date('Y-m-d H:i:s');
		$table_name = 'np_query';

		// call model to enquiry form data

		$this->modelfrontend->insert($table_name, $array);
		
		$data['fName'] = $array['first_name'];
		$data['lName'] = $array['last_name'];
		$data['email'] = $array['email'];
		$data['company'] = $array['company_name'];
		$data['city'] = $array['city'];
		$data['contact'] = $array['phone'];
		$data['address'] = $array['address'];
		$data['comments'] = $array['note'];
		$data['business'] = $array['category_name'];
		$data['brand'] = $array['brand_name'];
		
		$message = $this->load->view('frontend/email_template', $data, true);
		$from = EMAIL_CLIENT_FROM;
		$to = EMAIL_CLIENT_TO;
		$cc = '';
		$bcc = '';
		$subject = 'New Query Request Nestle Professionals';
		//$message = 'Test email';
		
		$this->sendEMail($from, $to, $cc, $bcc, $subject, $message);

		// redirect to thanks page

		redirect(base_url() . 'thanks');
		
		
	}

	// --------------------------------------------------------------------

	/**
	 * sendEmailTemplate
	 *
	 * This function get email template and call email send function.
	 *
	 *
	 * @access	public
	 * @return	void
	 */
	

	// --------------------------------------------------------------------

	/**
	 * sendEMail
	 *
	 * This function get email params and load email library to send email.
	 *
	 *
	 * @access	public
	 * @return	void
	 */
	public function sendEMail($from, $to, $cc, $bcc, $subject, $message)
	{
		
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->cc($cc);
		$this->email->bcc($bcc);
		$this->email->subject($subject);
		$this->email->message($message);

		// echo $message;

		$this->email->send();

		 //echo $this->email->print_debugger();

	}
	function notFound (){
		$this->load->view('frontend/not_found');
	}
}

// --------------------------------------------------------------------

/* End of file home.php */
/* Location: ./application/controllers/frontend/home.php */