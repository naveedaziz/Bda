<?php
   /**
    * @Filename: common_helper.php
    * Location: \application\helpers
    * Function: common helper file contains generic functions which are called in every controller.
    * @Author:  Anum Ishtiaq
    * @Creator: Bramerz.pk
    *
    */
   
   // --------------------------------------------------------------------
   
   /**
    * Index
    *
    * This function is used to encode str with mysql_real_escape_string.
    *
    * @access	public
    * @return	encoded string
    */
   
   function Encode($str)
   	{
   	return mysql_real_escape_string( ( ($str) ) );
   	} 
	// --------------------------------------------------------------------
   
	 /**
    * password validation
    *
    * This function is used to validate password with reg expression.
    *
    * @access	public
    * @return	Password string
    */
   
   function validatePassword($str)
   	{
		if (!preg_match_all('(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}', $str)){
        return FALSE;
		}else{
    	return TRUE;
		}
   	}
   
   // --------------------------------------------------------------------
   
   /**
    * Encrypt
    *
    * This function is used to encrypt password and return.
    *
    * @access	public
    * @return	Encrypt password
    */
   
   function Encrypt($password)
   	{
   
   	// return md5($password);
   
   	return crypt(md5($password) , md5($password));
   	}
   
   // --------------------------------------------------------------------
   
   /**
    * isAdminLogin
    *
    * This function check admin authentication.
    *
    * @access	public
    * @return	true or false
    */
   
   function isAdminLogin()
   	{
   	$CI = & get_instance();
   	$admin_id = $CI->session->userdata('admin_id');
   	if (isset($admin_id))
   		{
   		return true;
   		}
   	  else
   		{
   		redirect(base_url() . 'admin');
   		}
   	}
   
   // --------------------------------------------------------------------
   
   /**
    * isAdminHasAccess
    *
    * This function check admin access to pages.
    *
    * @access	public
    * @return	true or false
    */
   
   function isAdminHasAccess($page)
   	{
   	$CI = & get_instance();
   	$access_list = $CI->session->userdata('limited_access');
   	if ($access_list)
   		{
   		if (in_array($page, $access_list))
   			{
   			return true;
   			}
   		  else
   			{
   			redirect(base_url() . 'admin/unauthorized');
   			}
   		}
   	}
   
   ?>