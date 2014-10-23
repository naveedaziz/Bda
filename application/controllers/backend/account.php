<?php
   /**
    * @Filename: Account.php
    * Location: ./application/controllers/backend/account.php
    * Function: Account class handles the entry point to account listing. It also contains the functions of list list account, add account, edit account, delete account from admin.
    * @Author:  Anum Ishtiaq
    * @Creator: Bramerz.pk
    *
    */
   
   // --------------------------------------------------------------------
   
   /**
    * This Account class extends CI_Controller
    * @see main_class
    */
   
   // --------------------------------------------------------------------
   class Account extends CI_Controller
   {
   /**
   * Constructor
   * set headers for no-cache
   * load helpers and libraries
   */
   // --------------------------------------------------------------------
   	public function __construct( )
   	{
   		parent::__construct();
   		session_start();
   		$this->output->set_header("Cache-Control: no-cache, must-revalidate");
   		$this->output->set_header( 'P3P: CP="CAO PSA OUR"' );
   		$this->output->set_header("Pragma: no-cache"); 
   		date_default_timezone_set('Asia/Karachi');
   		
   		$this->load->helper('url');
   		$this->load->helper('common_helper');
   		$this->load->library('session');
   	    $this->load->model('backend/modeladmin');
   		
   		$this->load->library( 'xajax' );
   		$this->load->library('form_validation');
           $this->xajax->configure( 'javascript URI', base_url() . 'xajax' );
           $this->xajax->registerFunction( array(
                'checkcredentail',
               $this,
               'checkcredentail' 
           ) );
           $this->xajax->registerFunction( array(
                'fileupload',
               $this,
               'fileupload' 
           ) );
           $this->xajax->processRequest();
           $this->xajax_js = $this->xajax->getJavascript( base_url() );
   		//check if admin logged in
   		isAdminLogin();
   		//check if admin has access
   		isAdminHasAccess( 'accounts' );
   	 }
   	// --------------------------------------------------------------------
   
   	/**
   	 * Index
   	 *
   	 * This function is the entery point to this class. 
   	 * It shows notification listing.
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function index()
   	{
   		//set table name and filter 
   		$table_name = 'np_admin_users';
   	    $filter 	= '';
   		// set session page name
   		$this->session->set_userdata( 'page'	, 'account_setting' ); 
   		//get all account
   		$data[ 'results' ]  = $this->modeladmin->getAllData( $table_name, $filter ); 
		
		$table_name = 'np_site_settings';
   	    $filter 	= '';
		$data[ 'siteSettings' ]  = $this->modeladmin->getAllData( $table_name, $filter )->row(); 
		//print_r($data[ 'siteSettings' ]);die();
   		//load user view with data listing
   		$this->load->view( 'backend/account', $data );
   	}
   	
   	 // --------------------------------------------------------------------
   	/**
   	 * Insert 
   	 *
   	 * This function get values from add account form and passes an array to model.
   	 * 
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function insert()
   	{
   	        // get form data
   			$array['first_name']	    = Encode($this->input->post('first_name'));
   			$array['last_name']		    = Encode($this->input->post('last_name'));
   			$array['email']				= Encode($this->input->post('val_email'));
   			$array['city']				= Encode($this->input->post('city'));
   			$array['access_limited']	= '1';
   			$array['access_list']		= '["query","category","brands","product","page","notification","accounts"]';
   			$password					= Encode($this->input->post('val_password'));
   			// if password exist then encrypt
   			if($password){
   				$encrypt_password 		= Encrypt($password);
   				$array['password']		= $encrypt_password;
   			}
   			$array['created_at']		= date('Y-m-d H:i:s');
   			// declare table name and filter
   			$table_name					= 'np_admin_users';
   			$filter 					= Encode($this->input->post('val_email'));
   			//get all account
   		    $data[ 'results' ]  = $this->modeladmin->checkUserEmail( $table_name, $filter ); 
   			$row_count 			= $data[ 'results' ]->num_rows;
   			// check row count if the same email id exists
   			if($row_count <= 0){
   			  //call model to insert notification data
   			  $this->modeladmin->insert($table_name,$array);
   			  //redirect to account listing page
   			  redirect(base_url().'account_setting');
   			}else{
   				// set flash message for email already exists.
   				$this->session->set_flashdata('error_message','Email already exist. Please try again with different email address.');
   				 redirect(base_url().'account_setting');
   			}
   			 
   }
   	 
   	// --------------------------------------------------------------------
   	/**
   	 * Delete
   	 *
   	 * This function gets id parameter and request model to deleted that record.
   	 * 
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function delete()
   	{
   		    //get url parameter
   			$id = $this->uri->segment(2);
   			//get table name
   			$table_name	= 'np_admin_users';
   		   //call model to delete record
   		    $this->modeladmin->delete( $table_name, $id ); 
   		   //load listing view
   		      redirect(base_url().'account_setting');
   	}
       
   	// --------------------------------------------------------------------
   	/**
   	 * Edit 
   	 *
   	 * This function gets id parameter and request model to get that record.
   	 * 
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function edit()
   	{
   		    //get url parameter
   			$id = $this->uri->segment(2);
   			//get table name
   			$table_name	= 'np_admin_users';
   			//get notification record of the given id
   		    $data[ 'row' ]  = $this->modeladmin->getRecord( $table_name, $id ); 
   		    if($data[ 'row' ]){
   		     //load account edit view
   		    $this->load->view( 'backend/account_edit', $data);
   		   }else{
   			  redirect(base_url().'account_setting');
   		   }
   	}
   	
   // --------------------------------------------------------------------
   	/**
   	 * Update 
   	 *
   	 * This function get values from and update existing data with new one.
   	 * 
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function update()
   	{
   		   // get form data
   		    $id	    					= Encode($this->input->post('id'));
         	$array['first_name']	= Encode($this->input->post('first_name'));
   			$array['last_name']		    = Encode($this->input->post('last_name'));
   			$array['city']				= Encode($this->input->post('city'));
   			$array['access_limited']	= Encode($this->input->post('access_limited'));
   			$array['access_list']		= json_encode($this->input->post('access_list'));
   			$array['updated_at']		= date('Y-m-d H:i:s');
   			$table_name					= 'np_admin_users';
   			//call model to update data
   			$this->modeladmin->update( $table_name, $array, $id );
   			 //redirect to listing page
   			redirect(base_url().'account_setting');
   		
         }
   // --------------------------------------------------------------------
   	/**
   	 * updateAccountOwner 
   	 *
   	 * This function get values from and update account/admin ownership.
   	 * 
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function updateAccountOwner()
   	{
   			// set table name and filters
   			$table_name					= 'np_admin_users';
   			$filter						= '1';
   			$array['super_access']	    = '0';
   			// call model to update record
   			$this->modeladmin->updateAdminOwner( $table_name, $array, $filter );
   		   // get form data
   		    $id	    					= Encode($this->input->post('access_owner'));
         		$array['super_access']	    = '1';
   			$array['updated_at']		= date('Y-m-d H:i:s');
   			//call model to insert notification data
   			$this->modeladmin->update( $table_name, $array, $id );
   			 //redirect to notification listing page
   			redirect(base_url().'account_setting');
   		
         }
	public function updateSiteSettings()
   	{
   			// set table name and filters
   			$table_name					= 'np_site_settings';
			$array['seo_title']	= Encode($this->input->post('seo_title'));
   			$array['seo_description']		    = Encode($this->input->post('seo_description'));
   			$this->modeladmin->updateSiteSittings( $table_name, $array);
   			redirect(base_url().'account_setting');
   		
         }
   
   }
   

// --------------------------------------------------------------------
/* End of file account.php */
/* Location: ./application/controllers/backend/account.php */
?>