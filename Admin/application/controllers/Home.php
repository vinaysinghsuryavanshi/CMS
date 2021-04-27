<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	private $login_info;
	function __construct()
	{
		parent::__construct();
		//$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('general');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('general_model','general_model');
		$this->load->model('login_model','login_model');
		
		  //if($this->session->userdata('logged_in')!="" &&  $this->session->userdata('logged_in')['active_app']=='2')
		  
		  if($this->session->userdata('admin_logged_in')!="")
		  {
		     //$login_info	    = $this->session->userdata('admin_logged_in');
			 
		  }else{
			redirect('login','refresh');
		  }
	}
	
	
	public function index()
	{   
	    $login_info	    = $this->session->userdata('admin_logged_in');
		
	    $data['template'] = template_variable();
	    $data['primary_nav'] = primary_nav();
		$data['page']	  = 'page_all_request';
		
	    $userID = $login_info['userID'];
		
		$data['datas'] = $this->general_model->get_table_data('registration','');
		
	//	print_r($data['all_complementry']); die;
		
	  	$this->load->view('template/template_start',$data); 
		$this->load->view('template/page_head', $data);
		$this->load->view('pages/page_all_request', $data);
		$this->load->view('template/page_footer',$data);
		$this->load->view('template/template_scripts',$data);
		//$this->load->view('template/page_script',$data);
		$this->load->view('template/template_end', $data);
		
		
	}
	
	
			
	
}// end of class



