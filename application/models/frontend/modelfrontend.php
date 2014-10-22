<?php
class modelFrontend extends CI_Model {

    public function __construct() {
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
   
   		if ($table_name == 'np_general_settings')
   			{
				if($filter == 'category'){
				 $sql = "SELECT * FROM `" . $table_name . "` where type = '" . $filter . "' and title != 'Vending Solutions' and status = '1' order by id desc";
				}
				else
				{
				 $sql = "SELECT * FROM `" . $table_name . "` where type = '" . $filter . "' and status = '1' order by id desc";
				}
			}else
   			{
   			$sql = "SELECT * FROM `" . $table_name . "` where status = '1' order by id desc";
   			}
   
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
   	public function getProductCount( $table_name, $filter )
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
   	public function getRecord($table_name, $id )
   	{
		if($id == 'category'){
		 $sql = "SELECT * FROM `" . $table_name . "` where type = '" . $id . "' and title = 'Vending Solutions' and status = '1' order by id desc";
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
	function itemList($per_page,$offset = 0,$table_name, $filter)
	{
		$offset	= intval($offset);
		if ($table_name == 'np_general_settings')
   		{
		$sql= "SELECT * FROM `" . $table_name . "` where type = '" . $filter . "' and status = '1' order by id desc
			   LIMIT ".Encode($offset).",".Encode($per_page).""; 
		}else{
		$sql= "SELECT * FROM `" . $table_name . "` where status = '1' order by id desc
			   LIMIT ".Encode($offset).",".Encode($per_page)."";	
		}
		return $this->db->query($sql);
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
?>