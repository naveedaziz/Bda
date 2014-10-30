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
   
   class Admin extends CI_Controller
   
   	{
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
   		
   		// Load model, helper and libraries
   		
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
   
   			redirect(base_url() . 'admin/query');
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
   
   		$user_email = encode($this->input->post('val_email'));
   
   		// get and encrypt password
   
   		$password = encrypt(encode($this->input->post('password')));
   
   		// Authenticate admin
   
   		$admin_row = $this->modeladmin->adminLogin($user_email, $password);
   		
   		
   		// check if moderator has limited access
   
   		if ($admin_row && $admin_row->access_limited == '1')
   			{
   			$access_list_string = $admin_row->access_list;
   			$limited_access_list = (array)json_decode($access_list_string);
   			$this->session->set_userdata('limited_access', $limited_access_list);
   		}
   		if ($admin_row)
   				{
   					$last_updated_date = $admin_row->updated_at;
   					$last_thirty_days_date = date('Y-m-d H:i:s', strtotime('today - 30 days'));
   					// update password after 30 days
   					if(isset($admin_row->updated_at)){
   					if ($last_updated_date < $last_thirty_days_date)
   						{
   							// set admin session
   				
   							$this->session->set_userdata('admin_email', $user_email);
   							$this->session->set_userdata('admin_id', $admin_row->id);
   							$this->session->set_userdata('first_name', $admin_row->first_name);
   							$this->session->set_userdata('last_name', $admin_row->last_name);
   							redirect(base_url() . 'admin/update_password_admin');
   						}
   					}
   				$this->session->set_userdata('admin_email', $user_email);
   				$this->session->set_userdata('admin_id', $admin_row->id);
   				$this->session->set_userdata('first_name', $admin_row->first_name);
   				$this->session->set_userdata('last_name', $admin_row->last_name);
   
   				// Update last login
   
   				$table_name = TABLE_ADMIN_USERS;
   				$admin_data['last_logged_in'] = date('Y-m-d H:i:s');
   				$this->modeladmin->update($table_name, $admin_data, $admin_row->id);
   				redirect(base_url() . 'admin/query');
   				}
   			  else
   				{
   
   				// Redirect to login if authentication fails and show error message
   				if($user_email){
   					$this->session->set_flashdata('error_message', 'Email or password you entered is incorrect. Try again or reset your password.');
   				}else{
   					$this->session->set_flashdata('error_message',false);
   				}
   				redirect(base_url() . 'admin');
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
   		public function forgotPassword()
   		{
   		$user_email = encode($this->input->post('val_email'));
   		if (!empty($user_email))
   			{
   			$resetPassord = $this->modeladmin->checkForgotPassword($user_email);
   			if (!empty($resetPassord))
   				{
   				$to = $user_email;
   				$subject = 'Reset Password Nestle Professional';
   				$data['key'] = $resetPassord['key'];
   				$data['userName'] = $resetPassord['userName'];
   				$message = $this->load->view('backend/forgot_password_template', $data, true);
   				$this->sendEmail($to, $subject, $message);
   				redirect(base_url() . 'admin/forgot-password?success');
   				}
   			  else
   				{
   				redirect(base_url() . 'admin/forgot-password?error');
   				}
   			}
   
   		$this->load->view('backend/forgot_password');
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * forgotPasswordReset
   	 *
   	 * This function validates password with regx expression and
   	 * reset user password.
   	 *
   	 * @access	public
   	 * @return	void
   	 */
   		
   		public function forgotPasswordReset()
   		{
   		
   		// password validate Regex expresson 
   		
   		if ( validatePasswordRegex($this->input->post('val_password')) === FALSE ) {
   			redirect(base_url() . 'admin');
   		} else {
   			$key = $this->uri->segment(3);
   			$validLink = $resetPassord = $this->modeladmin->linkValidationPasswordReset($key);
   		if ($validLink)
   			{
   			$user_password = encode($this->input->post('val_password'));
   			if (!empty($user_password))
   				{
   				$updatedPassword = encrypt(encode($this->input->post('val_password')));
   				$resetPassord = $this->modeladmin->updateUserPassword($updatedPassword, $key);
   				redirect(base_url() . 'admin/reset-password/' . $key . '?success');
   				}
   
   			$data['key'] = $key;
   			$this->load->view('backend/reset_password', $data);
   			}
   		  else
   			{
   			redirect(base_url() . 'admin/');
   			}
   		}
   	}
   	// --------------------------------------------------------------------
   
   	/**
   	 * sendEmail
   	 *
   	 * This function get email parameters and send emails. 
   	 * 
   	 *
   	 * @access	private
   	 * @return	void
   	 */
   	private function sendEmail($to, $subject, $message)
   		{
   		$this->load->library('email');
   		$this->email->set_newline("\r\n");
   		$this->email->from(EMAIL_CLIENT_FROM);
   		$this->email->to($to);
   		$this->email->subject($subject);
   		$this->email->message($message);
   		$this->email->send();
   		
   		}
   	// --------------------------------------------------------------------
   
   	/**
   	 * updatePasswordAdmin
   	 *
   	 * This function loads the view of update password. 
   	 * 
   	 *
   	 * @access	private
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
   
   		// password validate Regex expresson 
   		
   		if ( validatePasswordRegex($this->input->post('val_password')) === FALSE ) {
   			redirect(base_url() . 'admin');
   		} else {
   			
   		// get session admin id
   
   		$session_id = $this->session->userdata('admin_id');
   
   		// check if session isset
   
   		if ($session_id)
   			{
   
   			// get posted data
   
   			$id = encode($this->input->post('admin_id'));
   			$array['first_name'] = encode($this->input->post('val_first_name'));
   			$array['last_name'] = encode($this->input->post('val_last_name'));
   			$array['password'] = encrypt(encode($this->input->post('val_password')));
   
   			// if password exist then encrypt that
   
   			$array['updated_at'] = date('Y-m-d H:i:s');
   
   			// declare table name;
   
   			$table_name = TABLE_ADMIN_USERS;
   
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
   
   		$table_name = TABLE_QUERY;
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
   
   		$id = $this->uri->segment(3);
   
   		// check if session isset
   
   		if ($session_id)
   			{
   			$table_name = TABLE_QUERY;
   
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
   
   			$table_name = TABLE_QUERY;
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
   
   		$id = $this->uri->segment(3);
   
   		// check if session isset
   
   		if ($session_id)
   			{
   			$filename = date('users_YmdHis') . '.xls';
   
   			// get all queries records for statistics
   
   			$table_name = TABLE_QUERY;
   
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