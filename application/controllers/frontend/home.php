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
		// declare table name
   
   		$table_name = 'np_general_settings';
   		$filter = 'category';
	  	// get record
   		$data['brands'] = $this->modelfrontend->getAllData($table_name, $filter);
		
   		$filter_banner = 'banner';
		$data['banners'] = $this->modelfrontend->getAllData($table_name, $filter_banner);
		//print_r($data['banner']);die();
		// pagination
		
		$config['base_url'] = base_url().'frontend/home';
		$config['uri_segment'] = 3;
		$config['total_rows'] = $data['brands']->num_rows;
		$config['per_page'] = LIMIT_PAGINATION;
		$config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config); 
		
		$data['brands'] = $this->modelfrontend->itemList($config['per_page'],$this->uri->segment(3),$table_name, $filter);
		$data['page_offset'] = intval($this->uri->segment(3));
   
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
		
		// get brands
		
		$table_name = 'np_general_settings';
   		$filter = 'brand';
   		$data['brands'] = $this->modelfrontend->getAllData($table_name, $filter);
   
   		
		// get url parameter
   
   		$filter = $this->uri->segment(3);
		
		// get products
		
   		$table_name = 'np_products';
   		$data['products'] = $this->modelfrontend->getProductCount($table_name, $filter);
		
   		// config pagination
		
   		/*$config['base_url'] = base_url().'frontend/allProducts/'.$filter;
		$config['uri_segment'] = 4;
		$config['total_rows'] = $data['products']->num_rows;
		$config['per_page'] = LIMIT_PAGINATION;
		$config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
	    $config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config); 
		
		$data['products'] = $this->modelfrontend->getAllProducts($config['per_page'],$this->uri->segment(4),$table_name, $filter); */
		//print_r($data['products']); die();
		$data['products'] = $this->modelfrontend->getAllProducts($table_name, $filter);
		$data['page_offset'] = intval($this->uri->segment(4));
		$data['active_category'] = $filter;
        $this->session->set_userdata('active_category', $filter);
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
   
   		$id = $this->uri->segment(3);
		
		// get product
		
		$table_name = 'np_products';
   		$data['product'] = $this->modelfrontend->getRecord($table_name, $id);
   
   		// load view
   
   		$this->load->view('frontend/product_detail', $data);
   		
   	}
	public function getPageDetail()
   	{
   
   		$data = '';
   		
		// get url parameter
   
   		$slug = $this->uri->segment(2);
		//echo $id;die();
		// get product
		
		$table_name = 'np_general_settings';
   		$data['page'] = $this->modelfrontend->getPageRecord($table_name, $slug);
   		//print_r($data['page']);die();
   		// load view
   
   		$this->load->view('frontend/layout/detail_template', $data);
   		
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
   
   		$id = $this->uri->segment(3);
		
		// get brands
		
		$table_name = 'np_general_settings';
   		$filter = 'brand';
   		$data['brands'] = $this->modelfrontend->getAllData($table_name, $filter);
		
		// get categories
		
		$table_name = 'np_general_settings';
   		$filter = 'category';
   		$data['categories'] = $this->modelfrontend->getAllData($table_name, $filter);
		
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
   
   		// check if the form posted
   		// echo 'here'; die();
   			// get form data
   
   			$array['first_name'] = Encode($this->input->post('firstname'));
			$array['last_name'] = Encode($this->input->post('lastname'));
			$array['product_id'] = Encode($this->input->post('product_id'));
   			$array['company_name'] = Encode($this->input->post('company'));
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
   
   			redirect(base_url() . 'frontend/thanks');
  	}
	// --------------------------------------------------------------------
   
   	/**
   	 * About US
   	 *
   	 * Load About US view
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function aboutus()
   	{
		$this->load->library('parser');
		$data = "";
		$data = array(
              'title'   => 'My Blog Title',
              'Description' => 'Description'
            );
   		// load user view with data listing
   
   		$this->parser->parse('frontend/layout/detail_template', $data);
   	}
		
		// --------------------------------------------------------------------
}   	
// --------------------------------------------------------------------
/* End of file home.php */
/* Location: ./application/controllers/frontend/home.php */