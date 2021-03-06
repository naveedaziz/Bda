<?php
   /**
    * @Filename: modeladmin.php
    * Location: ./application/models/backend/modeladmin.php
    * Function: modelAdmin class handles all the queries of admin.
    * It also contains the functions of get all data, insert, update and delete records.
    * @Author: Anum Ishtiaq
    * @Creator: Bramerz.pk
    *
    */
   
   // --------------------------------------------------------------------
   
   /**
    * This modelAdmin class extends CI_Model
    * @see main_class
    */
   
   // --------------------------------------------------------------------
   
   class ModelAdmin extends CI_Model
   
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
   	 * Admin Login Authentication
   	 *
   	 * This function takes inputs, username and password
   	 * and authenticate the record for admin login.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function adminLogin($email, $password)
   		{
   		$query = "SELECT * FROM np_admin_users WHERE email = '" . $email . "' and password = '" . $password . "'";
   		$record = $this->db->query($query);
   		if ($record->num_rows() == 1)
   			{
   			return $record->row();
   			}
   		  else
   			{
   			return false;
   			}
   		}
   // --------------------------------------------------------------------
   
   	/**
   	 * randomPasswordGenerator
   	 *
   	 * This function get a param of length ad generate random password
   	 * and return password reset key.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function randomPasswordGenerator($length)
   		{
   		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
   		$pass = "";
   		for ($i = 0; $i < $length; $i++)
   			{
   			$index = rand(0, 61);
   			$pass.= substr($chars, $index, 1);
   			}
   
   		return $pass;
   		}
   
   // --------------------------------------------------------------------
   
   	/**
   	 * linkValidationPasswordReset
   	 *
   	 * This function validates the reset password key link from database.
   	 * 
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function linkValidationPasswordReset($key)
   		{
   		$query = "SELECT * FROM np_admin_users WHERE update_password_key = '" . $key . "'";
   		$record = $this->db->query($query);
   		if ($record->num_rows() == 1)
   			{
   			return $record;
   			}
   		  else
   			{
   			return false;
   			}
   		}
   
   // --------------------------------------------------------------------
   
   	/**
   	 * checkForgotPassword
   	 *
   	 * This function validates the reset password key link from database and update it with new key.
   	 * 
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function checkForgotPassword($email)
   		{
   		$query = "SELECT * FROM np_admin_users WHERE email = '" . $email . "'";
   		$record = $this->db->query($query);
   		if ($record->num_rows() == 1)
   			{
   
   // generate random password of length 20
   	
   			$key = $this->randomPasswordGenerator(20);
   			$query = "UPDATE np_admin_users  SET update_request = NOW(), update_password_key = '" . $key . "' WHERE email = '" . $email . "'";
   			$this->db->query($query);
   			$returnData['key'] = $key;
   			$returnData['userName'] = $record->row()->first_name . ' ' . $record->row()->first_name;
   			return $returnData;
   			}
   		  else
   			{
   			return false;
   			}
   		}
   
   // --------------------------------------------------------------------
   
   	/**
   	 * updateUserPassword
   	 *
   	 * This function update user passworda and password reset key.
   	 * 
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */  
   	public function updateUserPassword($password, $key)
   		{
   		$query = "UPDATE np_admin_users  SET password = '" . $password . "'  where update_password_key = '" . $key . "'";
   		$this->db->query($query);
   		return true;
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
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Update data
   	 *
   	 * This function takes table name, array of fields and id
   	 * to update the record against that id.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function update($table_name, $data, $id)
   		{
   		if ($id)
   			{
   			$this->db->where('id', $id);
   			$this->db->update($table_name, $data);
   			return true;
   			}
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
   			$sql = "SELECT * FROM `" . $table_name . "` where type = '" . $filter . "' order by id desc";
   			}
   		  else
   		if ((!empty($filter)) && $table_name == TABLE_ADMIN_USERS)
   			{
   			$sql = "SELECT * FROM `" . $table_name . "` where id = '" . $filter . "' order by id desc";
   			}
   		  else
   		if ($table_name == TABLE_QUERY)
   			{
   			$sql = "SELECT q.* , s.title as brandName, s.id as brandID, p.id as productID, p.title as productTitle,p.brand as productBrand FROM `np_query` as q left join np_products as p on p.id = q.product_id left join np_general_settings as s on s.id = p.brand order by q.id desc";
   			}
   		  else
   			{
   			$sql = "SELECT * FROM `" . $table_name . "` order by id desc";
   			}
   
   		$results = $this->db->query($sql);
   		return $results;
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * Delete
   	 *
   	 * This function take table name and id and delete that record from table..
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function delete($table_name, $id)
   		{
   		$results = '';
   		$sql = "DELETE from `" . $table_name . "` where id = '" . $id . "'";
   		$results = $this->db->query($sql);
   		return $results;
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * updateOwner
   	 *
   	 * This function update admin ownership.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function updateAdminOwner($table_name, $data, $filter)
   		{
   		if ($filter)
   			{
   			$this->db->where('super_access', $filter);
   			$this->db->update($table_name, $data);
   			return true;
   			}
   		}
   
   	// --------------------------------------------------------------------
   
   	/**
   	 * updateSiteSittings
   	 *
   	 * This function update theme settings.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function updateSiteSittings($table_name, $data)
   		{
   		$this->db->update($table_name, $data);
   		return true;
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
   		if ($table_name == TABLE_QUERY)
   			{
   			$sql = "SELECT q.* , s.title as brandName, s.id as brandID, p.id as productID, p.title as productTitle,p.brand as productBrand FROM `np_query` as q left join np_products as p on p.id = q.product_id left join np_general_settings as s on s.id = p.brand where q.id = '" . $id . "'";
   			}
   		  else
   			{
   			$sql = "SELECT * FROM `" . $table_name . "` where id = '" . $id . "'";
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
   	 * checkUserEmail
   	 *
   	 * This function takes table name and filter to check
   	 * if the email already exists in that table.
   	 *
   	 * @access	public
   	 * @param	array
   	 * @param	int
   	 * @return	void
   	 */
   	public function checkUserEmail($table_name, $filter)
   		{
   		$sql = "SELECT * FROM `" . $table_name . "` where email = '" . $filter . "'";
   		$results = $this->db->query($sql);
   		return $results;
   		}
   	}
   
   // --------------------------------------------------------------------
   
   /* End of file modeladmin.php */
   /* Location: ./application/models/backend/modeladmin.php */
   ?>