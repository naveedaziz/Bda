<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
class Home extends CI_Controller {
	
/**
* Constructor
* set headers for no-cache
* load helpers and libraries
*/
// --------------------------------------------------------------------
	 function __construct( )
    {
      parent::__construct();
      session_start();
	  $this->load->helper('url');
   	  $this->load->helper('common_helper');
   	  $this->load->library('session');
	  $this->load->library('pagination');
	  $this->load->model('frontend/modelfrontend');
	  $_SESSION['site_meta'] = $this->modelfrontend->getSeoData('np_site_settings');	
	  $_SESSION['site_meta']->images = base_url().DEFAULT_LOGO;  
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
   		$data['categories'] = $this->modelfrontend->getAllData($table_name, $filter );
		
   		$filter_banner = 'banner';
		$data['banners'] = $this->modelfrontend->getAllData($table_name, $filter_banner );
		//print_r($data['banners']);die();
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
   		$data['categories'] = $this->modelfrontend->getAllData($table_name, $filter );
		
		$filter = $this->uri->segment(2);
		
		// get single catagory
		
		$data['catagory'] = $this->modelfrontend->getRecord($table_name, $filter);
		
		$_SESSION['site_meta'] = $data['catagory'];
		$imageDefault = (array) json_decode($_SESSION['site_meta']->images);
		
		if(isset($imageDefault[0])){
			$_SESSION['site_meta']->images = base_url().$imageDefault[0];
		}  
   		
		// get url parameter
   
   		
		
		// get products
		
   		$table_name = 'np_products';
   		$data['products'] = $this->modelfrontend->getProductCount($table_name, $filter);
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
		
		
		$_SESSION['site_meta'] = $data['product_detail'];
		
		$imageDefault = (array) json_decode($_SESSION['site_meta']->images);
		
		if(isset($imageDefault[0])){
			
			$_SESSION['site_meta']->images = base_url().$imageDefault[0];
			
		}
		
   		// load view
   
   		$this->load->view('frontend/product_detail', $data);
   		
   	}// --------------------------------------------------------------------
   
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
   		
		// load view
   
   		$this->load->view('frontend/layout/detail_template', $data);
   		
   	}
	
	public function getSearchDetail(){
		$data = '';
		
   		// get categories
		$filter = Encode($this->input->post('search_string'));
		$data['search_string'] = $filter;
		$data['search_data'] = $this->modelfrontend->getSearchRecord($filter);
		
		//print_r($data['search_data']->row());die();
   		
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
		$data['category'] = $this->modelfrontend->getRecord( $table_name, $filter );
		
		// get products
		if($data['category']){
			$table_name = 'np_products';
			$filter = $data['category']->id;
			$data['products'] = $this->modelfrontend->getAllProducts( $table_name, $filter);
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
   		$data['brands'] = $this->modelfrontend->getAllData($table_name, $filter );
		
		// get categories
		
		$table_name = 'np_general_settings';
   		$filter = 'category';
   		$data['categories'] = $this->modelfrontend->getAllData($table_name, $filter );
		if($this->uri->segment(2)){
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
   
   			$array['first_name'] = Encode($this->input->post('firstname'));
			$array['last_name'] = Encode($this->input->post('lastname'));
			$array['product_id'] = Encode($this->input->post('product_id'));
   			$array['company_name'] = Encode($this->input->post('company'));
			$array['category_name'] = Encode($this->input->post('category_name'));
			$array['brand_name'] = Encode($this->input->post('brand_name'));
   			$array['city'] = Encode($this->input->post('city'));
   			$array['phone'] = Encode($this->input->post('contact'));
   			$array['email'] = Encode($this->input->post('email'));
   			$array['address'] = Encode($this->input->post('address'));
   			$array['note'] = Encode($this->input->post('description'));
   			$array['created_at'] = date('Y-m-d H:i:s');
   			$table_name = 'np_query';
   
   			// call model to insert brand data
   
   			$this->modelfrontend->insert($table_name, $array);
   
   			// redirect to brand listing page
   
   			redirect(base_url() . 'thanks');
	}
	public function sendEmailTemplate(){
		$data = '123';
		$message = $this->load->view('frontend/email', $data, true);
		$this->sendEMail($from,$to,$cc,$bcc,$subject,$message); 
		$this->parser->parse('frontend/layout/detail_template', $data);
	}
	public function sendEMail($from,$to,$cc,$bcc,$subject,$message){
		/*
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('hrm@bramerz.pk', 'MUNA LIZA HRM');
		$this->email->to($to); 
		$this->email->cc($cc); 
		$this->email->bcc($bcc);
		$this->email->subject($subject);
		$this->email->message($message);	
		//echo $message;
		$this->email->send();*/
		//echo $this->email->print_debugger();
	}
		
}   	
// --------------------------------------------------------------------
/* End of file home.php */
/* Location: ./application/controllers/frontend/home.php */