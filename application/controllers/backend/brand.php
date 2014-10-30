<?php
/**
 * @Filename: Brand.php
 * Location: ./application/controllers/backend/brand.php
 * Function: Brand class handles the entry point to brands listing. It also contains the functions of list list brand, add brand, edit brand, delete brand from admin.
 * @Author:  Anum Ishtiaq
 * @Creator: Bramerz.pk
 *
 */

// --------------------------------------------------------------------

/**
 * This Brand class extends CI_Controller
 * @see main_class
 */

// --------------------------------------------------------------------

class Brand extends CI_Controller

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
		
		// Load model, helper and libraries
		
		$this->load->helper('url');
		$this->load->helper('common_helper');
		$this->load->library('session');
		$this->load->model('backend/modeladmin');
		$this->load->library('xajax');
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

		isAdminHasAccess('brands');
		}

	// --------------------------------------------------------------------

	/**
	 * Index
	 *
	 * This function is the entery point to this class.
	 * It shows brand listing.
	 *
	 * @access	public
	 * @return	void
	 */
	public function index()
		{

		// set session page name

		$this->session->set_userdata('page', 'brands');

		// declare table name and filter variable

		$table_name = TABLE_GENERAL_SETTINGS;
		$filter = 'brand';

		// get all brands

		$data['results'] = $this->modeladmin->getAllData($table_name, $filter);

		// load user view with data listing

		$this->load->view('backend/brand', $data);
		}

	// --------------------------------------------------------------------

	/**
	 * Add
	 *
	 * Add brand view to post image, name and title.
	 *
	 * @access	public
	 * @return	void
	 */
	public function add()
		{

		// load user view with data listing

		$this->load->view('backend/brand_add');
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
	public function insert()
		{

		// declare table name

		$table_name = TABLE_GENERAL_SETTINGS;

		// declare variable and array

		$imagesCounts = 0;
		$imageToSave = array();

		// check if the form posted

		if ($this->input->post('submit'))
			{

			// check if the file size exist or file has been uploaded

			if ($_FILES['myfile']['size'])
				{

				// loop through the file size array

				foreach($_FILES['myfile']['size'] as $key)
					{

					// check if the file size is greater than 1MB

					if ($key > 1048576)
						{

						// set session for error message

						$this->session->set_flashdata('file_size_error', 'The file size exceeded the limit allowed and cannot be saved.');

						// redirect back to edit page and display error

						redirect(base_url() . 'admin/add_brand');
						}
					}

				// loop through the REQUEST/POST images array and upload multiple images..

				foreach($_REQUEST as $key => $value)
					{

					// convert images to base64 and concatinate pic_ with each image name.

					if (strpos($key, 'pic_') !== false && strpos($value, 'data:') !== false)
						{

						// define upload directory path

						$upload_dir = IMAGES_BRAND_DIR;

						// assign image name to variable image

						$image = $value;
						if (strpos($value, 'data:image/jpeg') !== false)
							{
							$image = str_replace('data:image/jpeg;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".jpeg";
							}

						if (strpos($value, 'data:image/jpg') !== false)
							{
							$image = str_replace('data:image/jpg;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".jpg";
							}

						if (strpos($value, 'data:image/jpg') !== false)
							{
							$image = str_replace('data:image/jpg;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".JPG";
							}

						if (strpos($value, 'data:image/png') !== false)
							{
							$image = str_replace('data:image/png;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".png";
							}

						if (strpos($value, 'data:image/png') !== false)
							{
							$image = str_replace('data:image/png;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".PNG";
							}

						if (strpos($value, 'data:image/gif') !== false)
							{
							$image = str_replace('data:image/gif;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".gif";
							}

						$image = str_replace(' ', '+', $image);
						$data = base64_decode($image);
						$success = file_put_contents($file, $data);
						$imageToSave[$imagesCounts] = $file;
						$imagesCounts++;
						}
					  else
					if (strpos($key, 'pic_') !== false && strpos($value, 'data:') === false)
						{
						$imageToSave[$imagesCounts] = $value;
						$imagesCounts++;
						}
					}
				}

			// json decode image array

			$array['images'] = json_encode($imageToSave);

			// get form data

			$array['title'] = Encode($this->input->post('title'));
			$array['description'] = Encode($this->input->post('description'));
			$array['type'] = Encode($this->input->post('type'));
			$array['status'] = Encode($this->input->post('status'));
			$array['seo_title'] = Encode($this->input->post('seo_title'));
			$array['seo_description'] = Encode($this->input->post('seo_description'));
			$array['seo_url'] = Encode($this->input->post('seo_url'));
			$array['seo_tags'] = Encode($this->input->post('seo_tags'));
			$array['created_at'] = date('Y-m-d H:i:s');

			// call model to insert brand data

			$this->modeladmin->insert($table_name, $array);

			// redirect to brand listing page

			redirect(base_url() . 'admin/brands');
			}
		  else
			{
			redirect(base_url() . 'admin/add_brand');
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

		// set table name

		$table_name = TABLE_GENERAL_SETTINGS;

		// get url parameter

		$id = $this->uri->segment(3);

		// call to delete model

		$data['row'] = $this->modeladmin->delete($table_name, $id);

		// redirect to brand listing page

		redirect(base_url() . 'admin/brands');
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

		// set table name

		$table_name = TABLE_GENERAL_SETTINGS;

		// get url parameter

		$id = $this->uri->segment(3);

		// get brand record of the given id

		$data['row'] = $this->modeladmin->getRecord($table_name, $id);
		if ($data['row'])
			{

			// load brand edit view

			$this->load->view('backend/brand_edit', $data);
			}
		  else
			{
			redirect(base_url() . 'admin/brands');
			}
		}

	// --------------------------------------------------------------------

	/**
	 * Update
	 *
	 * This function get values from edit form and update existing data with new one.
	 *
	 *
	 * @access	public
	 * @return	void
	 */
	public function update()
		{

		// check if the form submited

		if ($this->input->post('submit'))
			{
			$imagesCounts = 0;
			$imageToSave = array();
			$id = Encode($this->input->post('id'));

			// check if the file size exist or file has been uploaded

			if ($_FILES['myfile']['size'])
				{

				// loop through the file size array

				foreach($_FILES['myfile']['size'] as $key)
					{

					// check if any file size is greater than 1 mb

					if ($key > 1048576)
						{

						// if yes then set session for error message

						$this->session->set_flashdata('file_size_error', 'The file size exceeded the limit allowed and cannot be saved.');

						// redirect back to edit brand page and show error message.

						redirect(base_url() . 'admin/edit_brand/' . $id);
						}
					}

				// loop through the REQUEST/POST images array and upload multiple images..

				foreach($_REQUEST as $key => $value)
					{

					// convert images to base64 and concatinate pic_ with each image name.

					if (strpos($key, 'pic_') !== false && strpos($value, 'data:') !== false)
						{

						// define upload directory path

						$upload_dir = IMAGES_BRAND_DIR;

						// assign image name to variable image

						$image = $value;
						if (strpos($value, 'data:image/jpeg') !== false)
							{
							$image = str_replace('data:image/jpeg;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".jpeg";
							}

						if (strpos($value, 'data:image/jpg') !== false)
							{
							$image = str_replace('data:image/jpg;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".jpg";
							}

						if (strpos($value, 'data:image/jpg') !== false)
							{
							$image = str_replace('data:image/jpg;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".JPG";
							}

						if (strpos($value, 'data:image/png') !== false)
							{
							$image = str_replace('data:image/png;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".png";
							}

						if (strpos($value, 'data:image/png') !== false)
							{
							$image = str_replace('data:image/png;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".PNG";
							}

						if (strpos($value, 'data:image/gif') !== false)
							{
							$image = str_replace('data:image/gif;base64,', '', $image);
							$file = $upload_dir . $key . mktime() . ".gif";
							}

						$image = str_replace(' ', '+', $image);
						$data = base64_decode($image);
						$success = file_put_contents($file, $data);
						$imageToSave[$imagesCounts] = $file;
						$imagesCounts++;
						}
					  else
					if (strpos($key, 'pic_') !== false && strpos($value, 'data:') === false)
						{
						$imageToSave[$imagesCounts] = $value;
						$imagesCounts++;
						}
					}
				}

			// json decode image array

			$array['images'] = json_encode($imageToSave);

			// get posted data from form

			$array['title'] = Encode($this->input->post('title'));
			$array['description'] = Encode($this->input->post('description'));
			$array['type'] = Encode($this->input->post('type'));
			$array['status'] = Encode($this->input->post('status'));
			$array['seo_title'] = Encode($this->input->post('seo_title'));
			$array['seo_description'] = Encode($this->input->post('seo_description'));
			$array['seo_url'] = Encode($this->input->post('seo_url'));
			$array['seo_tags'] = Encode($this->input->post('seo_tags'));
			$array['updated_at'] = date('Y-m-d H:i:s');
			$table_name = TABLE_GENERAL_SETTINGS;

			// call model to insert brand data

			$this->modeladmin->update($table_name, $array, $id);

			// redirect to brand listing page

			redirect(base_url() . 'admin/brands');
			}
		  else
			{
			redirect(base_url() . 'admin/brands');
			}
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

		$table_name = TABLE_GENERAL_SETTINGS;

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

		// redirect to brand listing page

		redirect(base_url() . 'admin/brands');
		}
	}

// --------------------------------------------------------------------

/* End of file brand.php */
/* Location: ./application/controllers/backend/brand.php */
?>