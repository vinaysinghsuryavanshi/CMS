<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

   function __construct()
   {
	 parent::__construct();
	 $this->load->library('form_validation');
	 $this->load->library('session');
	 $this->load->helper('general');
	 $this->load->helper('config');
	 $this->load->helper('form');
	 $this->load->model('general_model','general_model');
	 $this->load->model('login_model','login_model');
	 
	 if($this->session->userdata('admin_logged_in'))
	 {
	    redirect('Home/','refresh');
	 }
   
   }
   
	
	public function index()
	{
		 
		$data['template'] = template_variable();
		$this->load->view('template/login_template_scripts',$data);
        $this->load->view('pages/login',$data);
		$this->load->view('template/template_end',$data);
		
	}
	
/********************************* User Login Function ***************************************/	
	public function user_login()
	{
		 if($this->session->userdata('admin_logged_in'))
		 {
			redirect('Home/','refresh');
		 }
	 
	  $postdata = $this->input->post();
	  
	  
	  if(!empty($this->input->post()))
	  {
		  $this->load->library('form_validation');
		  $this->form_validation->set_error_delimiters('<div class="error" style="color:red">,</div>');
		  $this->form_validation->set_rules('login-phone','User ID','required');
		  $this->form_validation->set_rules('login-otp','OTP','required');
		  
		  if($this->form_validation->run() == true)
		  {
			  $mobile_no = $this->input->post('login-phone');
			  $otp    = $this->input->post('login-otp');
			  
			 $checkLoginOTP =  $this->login_model->check_login_otp($otp,$mobile_no);
			
             	
             if($checkLoginOTP)
			 {			 
			 $user = $this->login_model->get_user_login($mobile_no);
			  
			  if(!empty($user))
			  {
				$this->session->set_userdata('admin_logged_in',$user);
				$this->session->set_flashdata('message','<div class="alert alert-success"> Login Successfully </div>');
				
				redirect('Home/');
			  }else{
				  $this->session->set_flashdata('message','<div class="alert alert-danger"> Login Crediantial does not match! </div>');
				  redirect('Login');
			  }
			 }else{
				 
				  $con = array('mobile_no'=>$mobile_no);
				  $this->general_model->delete_row_data('tbl_otp',$con);
				   	
				  $this->session->set_flashdata('message','<div class="alert alert-danger">Please enter valid otp </div>');
		          redirect('Login');
			 }
		  }else{
			  
			  $this->session->set_flashdata('message','<div class="alert alert-danger">There is error in form filling! </div>');
		      redirect('Login');
		  }
		  
	  }else{
		  
		  $this->session->set_flashdata('messgae','You are not reconniged user');
	  }
     	 
	}
	/*************************************** Send OTP *********************************/
	

	   
		
     
}
?>