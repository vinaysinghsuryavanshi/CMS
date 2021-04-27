<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Login_model extends CI_Model
{
	
	 public function __construct()
    {
        parent::__construct();
    }
	
	
	private $tbl_login = 'tbl_login'; // user table name 
	function Login()
	{
		parent::Model();
		$this->load->database();
	}

	
	//---------------------- For Agent/Director Login ---------------------//
	
	function get_user_login($loginPhoneNo){
		$res = array();
		$this->db->select('tl.userID,tl.loginPhoneNo,tl.loginType');
		$this->db->from('tbl_login tl');
		$this->db->where('tl.loginPhoneNo',$loginPhoneNo);
		//$this->db->where('tl.userID',$userID);
		$this->db->where('tl.otp_verified','1');
		$this->db->where('tl.isEnable','1');
		$this->db->where('tl.loginType','1');
		$this->db->where('tl.approved_by_admin','1');
		//$this->db->where('tl.isDeleted','0');
	    $query = $this->db->get();
		
		//echo $this->db->last_query(); die;
		
		if($query->num_rows()>0){
			$this->db->where('loginPhoneNo', $loginPhoneNo);
			$this->db->update($this->tbl_login, array(
				'is_logged_in' => '1'
			));
			
		    $res = $query->row_array();
			return  $res;
		} else {
			return 0;
		}
	}
	
	
	function user_logout()
	{ 
		$this->db->trans_start();
		$session_data = $this->session->userdata('sales_person_logged_in'); 
		$this->db->where('userID', $session_data['userID']);
	    $this->db->update('tbl_login',array('is_logged_in'=>'0')); 
		$this->session->unset_userdata('sales_person_logged_in'); 
		$this->session->sess_destroy(); 
	    $this->db->trans_complete(); 
	    return $this->db->trans_status();

	}
	
	//Forgot Password 
	
	function temp_reset_password($code,$email)
	{
		$this->db->where('loginEmail', $email);
	    $this->db->set('loginPassword',md5($code));
	    if($this->db->update($this->tbl_user))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	// Admin Change Password
	
	function savenewpass($id , $password)
	{
		if (isset($id) && $id != '')
		{
		 $this -> db ->where('loginID', $id);
		 $this -> db ->set('loginPassword', md5($password));
		 $query = $this -> db -> update($this->tbl_user);
		 
		 if ($query) 
			return true;
		 else
			return false;
		}
	 }
	 
	function check_mail($mail)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('semail', $mail);
		$query = $this->db->get();
		$res = $query->row_array(); 
		if($res) {
			return  $res;
		} else {
			return  0;
		}
	} 
	
	function update_password($table_name, $array, $id)
	{
		$this->db->where('id', $id);
		if($this->db->update($table_name, $array))
			return true;
		else
			return false;
	}
	

   function check_login_otp($otp,$mobile_no){
	   
		$res = array();
		$this->db->select('*');
		$this->db->from('tbl_otp');
		$this->db->where('mobile_no',$mobile_no);
		$this->db->where('otp',$otp);
		//$this->db->where('s.isDeleted','0');
	    $query = $this->db->get();
		
		//echo $this->db->last_query(); die;
		
		if($query->num_rows()>0){
			 return 1;
		} else {
			return 0;
		}
	}
	
	
	 
}