<?php
/**
 * @Filename: Notification.php
 * Location: ./application/controllers/backend/notification.php
 * Function: Notification class handles the entry point to notification listing. It also contains the functions of list list notification, add notification, edit notification, delete notification from admin.
 * @Author:  Anum Ishtiaq
 * @Creator: Bramerz.pk
 *
 */

// --------------------------------------------------------------------

/**
 * This Notification class extends CI_Controller
 * @see main_class
 */

// --------------------------------------------------------------------

class Notification extends CI_Controller

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
		$this->output->set_header("Cache-Control: no-cache, must-revalidate");
		$this->output->set_header('P3P: CP="CAO PSA OUR"');
		$this->output->set_header("Pragma: no-cache");
		date_default_timezone_set('Asia/Karachi');
		$this->load->helper('url');
		$this->load->helper('common_helper');
		$this->load->library('session');
		$this->load->model('backend/modeladmin');
		$this->load->library('xajax');
		$this->load->library('form_validation');
		$this->xajax->configure('javascript URI', base_url() . 'xajax');
		$this->xajax->registerFunction(array(
			'checkcredentail',
			$this,
			'checkcredentail'
		));
		$this->xajax->registerFunction(array(
			'fileupload',
			$this,
			'fileupload'
		));
		$this->xajax->processRequest();
		$this->xajax_js = $this->xajax->getJavascript(base_url());

		// check if admin logged in

		isAdminLogin();

		// check if admin has access

		isAdminHasAccess('notification');
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

		// set session page name

		$this->session->set_userdata('page', 'notifications');

		// declare table name and filter

		$table_name = TABLE_NOTIFICATION;
		$filter = 'notifications';

		// get all notifications

		$data['results'] = $this->modeladmin->getAllData($table_name, $filter);

		// load user view with data listing

		$this->load->view('backend/notification', $data);
		}

	// --------------------------------------------------------------------

	/**
	 * Insert
	 *
	 * This function get values from add notification form and passes an array to add data model.
	 *
	 *
	 * @access	public
	 * @return	void
	 */
	public function insert()
		{

		// get form data

		$array['first_name'] = Encode($this->input->post('first_name'));
		$array['last_name'] = Encode($this->input->post('last_name'));
		$array['email'] = Encode($this->input->post('val_email'));
		$array['status'] = Encode($this->input->post('status'));
		$array['created_at'] = date('Y-m-d H:i:s');
		$table_name = TABLE_NOTIFICATION;
		$filter = Encode($this->input->post('val_email'));

		// get all notification email address

		$data['results'] = $this->modeladmin->checkUserEmail($table_name, $filter);
		$row_count = $data['results']->num_rows;

		// check if the record alredy exist with row count

		if ($row_count <= 0)
			{

			// call model to insert notification data

			$this->modeladmin->insert($table_name, $array);

			// redirect to notification listing page

			redirect(base_url() . 'admin/notifications');
			}
		  else
			{

			// set flash session of error message

			$this->session->set_flashdata('error_message_notification', 'Email already exist. Please try again with different email address.');

			// redirect back to notification and show error

			redirect(base_url() . 'admin/notifications');
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

		// get url parameter

		$id = $this->uri->segment(3);

		// get table name

		$table_name = TABLE_NOTIFICATION;

		// call to delete model

		$data['row'] = $this->modeladmin->delete($table_name, $id);

		// load list notification

		redirect(base_url() . 'admin/notifications');
		}

	// --------------------------------------------------------------------

	/**
	 * Edit
	 *
	 * This function gets id parameter and request model to get that record and display data in edit view.
	 *
	 *
	 * @access	public
	 * @return	void
	 */
	public function edit()
		{

		// get url parameter

		$id = $this->uri->segment(3);

		// get table name

		$table_name = TABLE_NOTIFICATION;

		// get notification record of the given id

		$data['row'] = $this->modeladmin->getRecord($table_name, $id);
		if ($data['row'])
			{

			// load notification edit view

			$this->load->view('backend/notification_edit', $data);
			}
		  else
			{
			redirect(base_url() . 'admin/notifications');
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

		$id = Encode($this->input->post('id'));
		$array['first_name'] = Encode($this->input->post('first_name'));
		$array['last_name'] = Encode($this->input->post('last_name'));
		$array['status'] = Encode($this->input->post('notification_status'));
		$array['updated_at'] = date('Y-m-d H:i:s');
		$table_name = TABLE_NOTIFICATION;

		// call model to update notification data

		$this->modeladmin->update($table_name, $array, $id);

		// redirect to notification listing page

		redirect(base_url() . 'admin/notifications');
		}

	// --------------------------------------------------------------------

	/**
	 * Change Status
	 *
	 * This function gets id and status parameter and request model to change status of that record.
	 *
	 *
	 * @access	public
	 * @return	void
	 */
	public function changeStatus()
		{

		// set table name

		$table_name = TABLE_NOTIFICATION;

		// get id from url parameter

		$id = $this->uri->segment(3);

		// get status from url parameter

		$status = $this->uri->segment(4);
		if ($status == 1)
			{
			$status = 0;
			}
		  else
			{
			$status = 1;
			}

		$array['status'] = $status;
		$array['updated_at'] = date('Y-m-d H:i:s');

		// request model to update its status

		$this->modeladmin->update($table_name, $array, $id);

		// redirect to products listing page

		redirect(base_url() . 'admin/notifications');
		}
	}

// --------------------------------------------------------------------

/* End of file notification.php */
/* Location: ./application/controllers/backend/notification.php */
?>