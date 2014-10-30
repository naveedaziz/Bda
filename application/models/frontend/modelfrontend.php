<?php
   /**
    * @Filename: modelfrontend.php
    * Location: ./application/models/frontend/modelfrontend.php
    * Function: modelFrontend class handles all the queries of front end.
    * It also contains the functions of get all data and post enquiry data.
    * @Author: Anum Ishtiaq
    * @Creator: Bramerz.pk
    *
    */
   
   // --------------------------------------------------------------------
   
   /**
    * This modelFrontend class extends CI_Model
    * @see main_class
    */
   
   // --------------------------------------------------------------------
   
   class ModelFrontend extends CI_Model
   
   	{
   	/**
   	 * Constructor
   	 *
   	 */
   
   	// --------------------------------------------------------------------
   
   	public function __construct()
   		{
   		parent::__construct();
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Get all data
   	 *
   	 * This function takes table name and filter for
   	 * custom query and get all records from that table.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function getAllData($table_name, $filter)
   		{
   		$results = '';
   
   		// query executes according to the filter and table name
   
   		if ($table_name == TABLE_GENERAL_SETTINGS)
   			{
   			if ($filter == 'category')
   				{
   				$sql = "SELECT * FROM `" . $table_name . "` where type = '" . $filter . "' and title != 'Vending Solutions' and status = '1' order by id desc";
   				}
   			  else
   				{
   				$sql = "SELECT * FROM `" . $table_name . "` where type = '" . $filter . "' and status = '1' order by id desc";
   				}
   			}
   		  else
   			{
   			$sql = "SELECT * FROM `" . $table_name . "` where status = '1' order by id desc";
   			}
   
   		$results = $this->db->query($sql);
   		return $results;
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * getSearchRecord
   	 *
   	 * This function takes filter as param and search tile or description from table np_products.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function getSearchRecord($filter)
   		{
   		$results = '';
   		if ($filter)
   			{
   			$sql = "SELECT * FROM `np_products` where (title LIKE '%" . $filter . "%' or  description LIKE '%" . $filter . "%') and status = '1'";
   			}
   		  else
   			{
   			$sql = "SELECT * FROM `np_products` where status = '1'";
   			}
   
   		$results = $this->db->query($sql);
   		return $results;
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * getSeoData
   	 *
   	 * This function takes param of table name and get seo data.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function getSeoData($table_name)
   		{
   		$results = '';
   		$sql = "SELECT * FROM `" . $table_name . "";
   		$results = $this->db->query($sql);
   		return $results->row();
   		}
      // --------------------------------------------------------------------
   
   	/**
   	 * getNotificationEmails
   	 *
   	 * This function takes param of table name and get Notification to send email data.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */	
      public function getNotificationEmails($table_name){
   		$results = '';
   		$sql = "SELECT * FROM `" . $table_name . "` where status = '1'";
   		$results = $this->db->query($sql);
   		return $results;
      }
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Get all products
   	 *
   	 * This function takes table name and filter for
   	 * custom query and get all records from np_products.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function getAllProducts($table_name, $filter)
   		{
   
   		// query executes according to the filter and table name
   
   		$sql = "SELECT * FROM `" . $table_name . "` where category LIKE '%" . $filter . "%' and status = '1' order by id desc";
   		return $this->db->query($sql);
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Get all products
   	 *
   	 * This function takes table name and filter for
   	 * custom query and get all records from np_products.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function getProductCount($table_name, $filter)
   		{
   
   		// query executes according to the filter and table name
   
   		$sql = "SELECT * FROM `" . $table_name . "` where category LIKE '%" . $filter . "%' and status = '1'";
   		return $this->db->query($sql);
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * getRecord
   	 *
   	 * This function take table name and id to get a single record from that table.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function getRecord($table_name, $id)
   		{
   		if ($id == 'category')
   			{
   			$sql = "SELECT * FROM `" . $table_name . "` where type = '" . $id . "' and title = 'Vending Solutions' and status = '1' order by id desc";
   			}
   		  else
   			{
   			$sql = "SELECT * FROM `" . $table_name . "` where seo_url = '" . $id . "'";
   			}
   
   		$result = $this->db->query($sql);
   		$row = $result->row();
   		if (!empty($row))
   			{
   			return $row;
   			}
   		  else
   			{
   			return false;
   			}
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Add pages data
   	 * getPageRecord
   	 *
   	 * This function takes table name and page slug to get page data from database.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function getPageRecord($table_name, $slug)
   		{
   		$sql = "SELECT * FROM `" . $table_name . "` where seo_url = '" . $slug . "' and type = 'page'";
   		$result = $this->db->query($sql);
   		$row = $result->row();
   		if (!empty($row))
   			{
   			return $row;
   			}
   		  else
   			{
   			return false;
   			}
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * getRecord
   	 *
   	 * This function take table name and id to get a single record from that table.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function getBrands($table_name, $id)
   		{
   		$sql = "SELECT * FROM `" . $table_name . "` where brand = '" . $id . "'";
   		$result = $this->db->query($sql);
   		$row = $result->row();
   		if (!empty($row))
   			{
   			return $row;
   			}
   		  else
   			{
   			return false;
   			}
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Add data
   	 *
   	 * This function takes table name and array to insert record into the table.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function insert($table_name, $fields)
   		{
   		$this->db->insert($table_name, $fields);
   		}
   	}
   
   // --------------------------------------------------------------------
   
   /* End of file modelfrontend.php */
   /* Location: ./application/models/frontend/modelfrontend.php */
   ?>