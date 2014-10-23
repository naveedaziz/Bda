<?php
   /**
    * @Filename: admin.php
    * Location: ./application/controllers/backend/admin.php
    * Function: Admin class handles the login of admin. It also contains the functions like query listing, query detail and export queries.
    * @Author: Anum Ishtiaq
    * @Creator: Bramerz.pk
    *
    */
   
   // --------------------------------------------------------------------
   
   /**
    * This Admin class extends CI_Controller
    * @see main_class
    */
   
   // --------------------------------------------------------------------
   
   class Admin extends CI_Controller{
   	/**
   	 * Constructor
   	 * set headers for no-cache
   	 * load helpers and libraries
   	 */
   
   	// --------------------------------------------------------------------
   
   	public function __construct()
   	{
   		parent::__construct();
   		session_start();
   		$this->output->set_header('Cache-Control: no-cache, must-revalidate');
   		$this->output->set_header("P3P: CP='CAO PSA OUR'");
   		$this->output->set_header('Pragma: no-cache');
   		date_default_timezone_set('Asia/Karachi');
   		$this->load->helper('url');
   		$this->load->helper('common_helper');
   		$this->load->library('session');
   		$this->load->library('form_validation');
   		$this->load->model('backend/modeladmin');
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
   		$session_id = $this->session->userdata('admin_id');
   
   		// check if session isset
   
   		if ($session_id)
   			{
   
   			// session isset load queries
   
   			redirect(base_url() . 'query');
   			}
   		  else
   			{
   
   			// session not set load login
   
   			$this->load->view('backend/index');
   			}
   	}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Unauthorized Access
   	 *
   	 * This function redirects user to unauthorized access.
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function unauthorized()
   	{
   		$session_id = $this->session->userdata('admin_id');
   
   		// check if session isset
   
   		if ($session_id)
   			{
   
   			// session isset load queries
   
   			$this->load->view('backend/unauthorized');
   			}
   		  else
   			{
   
   			// session not set load login
   
   			redirect(base_url() . 'admin');
   			}
   	}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Login
   	 *
   	 * This function authenticate admin and
   	 * helps him to login to the system.
   	 * It shows login form to user.
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function doLogin()
   	{
   
   		// get user_email input
   
   		$user_email = Encode($this->input->post('val_email'));
   
   		// get and encrypt password
   
   	   $password = Encrypt(Encode($this->input->post('password')));
   
   		// Authenticate admin
   
   		$admin_row = $this->modeladmin->adminLogin($user_email, $password);
   
   		// check if moderator has limited access
   
   		if ($admin_row->access_limited == '1')
   			{
   			$access_list_string = $admin_row->access_list;
   			$limited_access_list = (array)json_decode($access_list_string);
   			$this->session->set_userdata('limited_access', $limited_access_list);
   			}
   
		   $last_updated_date = $admin_row->updated_at;
		   $last_thirty_days_date = date('Y-m-d H:i:s', strtotime('today - 30 days')); 
		   
		   // update password after 30 days
		   
		   if($last_updated_date < $last_thirty_days_date)
		   {
			
		   // set admin session
			
		   $this->session->set_userdata('admin_email', $user_email);
		   $this->session->set_userdata('admin_id', $admin_row->id);
		   $this->session->set_userdata('first_name', $admin_row->first_name);
		   $this->session->set_userdata('last_name', $admin_row->last_name);
		   redirect(base_url() . 'update_password_admin');
		   }
		   else
					{
		   // set admin session
			
		   if ($admin_row)
			{
			$this->session->set_userdata('admin_email', $user_email);
			$this->session->set_userdata('admin_id', $admin_row->id);
			$this->session->set_userdata('first_name', $admin_row->first_name);
			$this->session->set_userdata('last_name', $admin_row->last_name);
			
			// Update last login
			
			$table_name = 'np_admin_users';
			$admin_data['last_logged_in'] = date('Y-m-d H:i:s');
			$this->modeladmin->update($table_name, $admin_data, $admin_row->id);
			redirect(base_url() . 'query');
			}
			 else
			{
			
			// Redirect to login if authentication fails and show error message
			
			$this->session->set_flashdata('error_message', 'Email or password you entered is incorrect. Try again or reset your password.');
			redirect(base_url() . 'admin');
			}
		   }
   	}
      	// --------------------------------------------------------------------
   
   	/**
   	 * updatePasswordAdmin
   	 *
   	 * This function redirects moderator to update password.
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function updatePasswordAdmin()
   	{
   		$session_id = $this->session->userdata('admin_id');
   
   		// check if session isset
   
   		if ($session_id)
   			{
   
   			// session isset load queries
   
   			$this->load->view('backend/update_password');
   			}
   		  else
   			{
   
   			// session not set load login
   
   			redirect(base_url() . 'admin');
   			}
   	}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Reset Password
   	 *
   	 * Update user name and password
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function resetPassword()
   	{
   
   		// get session admin id
   
   		$session_id = $this->session->userdata('admin_id');
   
   		// check if session isset
   
   		if ($session_id)
   			{
   
   			// get posted data
   
   			$id = Encode($this->input->post('admin_id'));
   			$array['first_name'] = Encode($this->input->post('val_first_name'));
   			$array['last_name'] = Encode($this->input->post('val_last_name'));
   			$array['password'] = Encrypt(Encode($this->input->post('val_password')));
   
   			// if password exist then encrypt that
   
   			$array['updated_at'] = date('Y-m-d H:i:s');
   
   			// declare table name;
   
   			$table_name = 'np_admin_users';
   
   			// get all queries
   
   			$this->modeladmin->update($table_name, $array, $id);
   
   			// destroy all session variables and forcefully logout from the system on reset password
   
   			if ($array['password'])
   				{
   				$this->session->unset_userdata('admin_email');
   				$this->session->unset_userdata('admin_id');
   				$this->session->userdata = array();
   
   				// set flash message successfully passowrd change
   
   				$this->session->set_flashdata('success_message', 'Your password has been reset successfully.');
   
   				// redirect to login
   
   				redirect(base_url() . 'admin');
   				}
   			}
   	}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Query
   	 *
   	 * load query listing.
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function query()
   	{
   
   		// check admin acces to query section
   
   		isAdminHasAccess('query');
   
   		// declare an empty array
   
   		$data['results'] = '';
   
   		// declare table name
   
   		$table_name = 'np_query';
   		$filter = '';
   
   		// get session admin id
   
   		$session_id = $this->session->userdata('admin_id');
   
   		// check if user loged in or session exist
   
   		if ($session_id)
   			{
   
   			// set session page name
   
   			$this->session->set_userdata('page', 'query');
   
   			// get all queries
   
   			$data['results'] = $this->modeladmin->getAllData($table_name, $filter);
   
   			// load user view with data listing
   
   			$this->load->view('backend/query', $data);
   			}
   		  else
   			{
   
   			// session not set load login
   
   			$this->load->view('backend/index');
   			}
   	}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Query Detail
   	 *
   	 * load query detail.
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function queryDetail()
   	{
   
   		// check if user hass access to query
   
   		isAdminHasAccess('query');
   		$data = '';
   
   		// get session admin id
   
   		$session_id = $this->session->userdata('admin_id');
   
   		// set session page name
   
   		$this->session->set_userdata('page', 'query');
   
   		// get url parameter
   
   		$id = $this->uri->segment(2);
   
   		// check if session isset
   
   		if ($session_id)
   			{
   			$table_name = 'np_query';
   
   			// get record
   
   			$data['row'] = $this->modeladmin->getRecord($table_name, $id);
   
   			// load query detail view
   
   			$this->load->view('backend/query_detail', $data);
   			}
   		  else
   			{
   
   			// session not set load login
   
   			$this->load->view('backend/index');
   			}
   	}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Logout
   	 *
   	 * This function is used to distroy session.
   	 *
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function logout()
   	{
   
   		// unset session variables to logout
   
   		$this->session->unset_userdata('admin_email');
   		$this->session->unset_userdata('admin_id');
   		$this->session->unset_userdata('limited_access');
   		$this->session->userdata = array();
   
   		// set flash message for successfully logout
   
   		$this->session->set_flashdata('success_message', 'You have successfully logged out.');
   
   		// redirect to login
   
   		redirect(base_url() . 'admin');
   	}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Export Users Statistics
   	 *
   	 * This function is used to export user stats in excel format.
   	 *
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function exportUsers()
   	{
   
   		// check admin access
   
   		isAdminHasAccess('query');
   
   		// get session admin id
   
   		$session_id = $this->session->userdata('admin_id');
   
   		// set session page name
   
   		$this->session->set_userdata('export', 'allUsers');
   
   		// check if session isset
   
   		if ($session_id)
   			{
   
   			// declare file extension
   
   			$filename = date('users_YmdHis') . '.xls';
   
   			// get all queries records for statistics
   
   			$table_name = 'np_query';
   			$filter = '';
   
   			// get all queries
   
   			$data['results'] = $this->modeladmin->getAllData($table_name, $filter);
   
   			// set xls headers
   
   			header('Pragma: public');
   			header('Expires: 0');
   			header('Cache-Control: must-revalidate, post-check=0, pres-check=0');
   			header('Content-Type: application/force-download');
   			header('Content-Type: application/octet-stream');
   			header('Content-Type: application/download');
   			header('Content-Disposition: attachment;filename=NestleProfessional-Statistics(' . date('Y-m-d H:i:s') . ').xls ');
   
   			// write xls content
   
   			$content = $this->load->view('backend/statistics', $data);
   			}
   		  else
   			{
   
   			// session not set load login
   
   			$this->load->view('backend/index');
   			}
   	}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Export Query Statistics
   	 *
   	 * This function is used to export single query/user stats in excel format.
   	 *
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   	public function exportSingleQuery()
   	{
   
   		// check access to query
   
   		isAdminHasAccess('query');
   
   		// set session page name
   
   		$this->session->set_userdata('export', 'SingleQuery');
   
   		// get session admin id
   
   		$session_id = $this->session->userdata('admin_id');
   
   		// get url parameter
   
   		$id = $this->uri->segment(2);
   
   		// check if session isset
   
   		if ($session_id)
   			{
   			$filename = date('users_YmdHis') . '.xls';
   
   			// get all queries records for statistics
   
   			$table_name = 'np_query';
   
   			// get single query data
   
   			$data['row'] = $this->modeladmin->getRecord($table_name, $id);
   
   			// set xls headers
   
   			header('Pragma: public');
   			header('Expires: 0');
   			header('Cache-Control: must-revalidate, post-check=0, pres-check=0');
   			header('Content-Type: application/force-download');
   			header('Content-Type: application/octet-stream');
   			header('Content-Type: application/download');
   			header('Content-Disposition: attachment;filename=NestleProfessional-Statistics(' . date('Y-m-d H:i:s') . ').xls ');
   
   			// write xls content
   
   			$content = $this->load->view('backend/statistics', $data);
   			}
   		  else
   			{
   
   			// session not set load login
   
   			$this->load->view('backend/index');
   			}
   	}
   }
// --------------------------------------------------------------------
/* End of file admin.php */
/* Location: ./application/controllers/backend/admin.php */
?>