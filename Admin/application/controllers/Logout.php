<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Logout extends CI_Controller {

	function __construct() 
	{ 
		parent::__construct(); 
		$this->load->model('login_model'); 
	}


	public function index()

	{  
		$data['title'] = 'Logout';

		$status = $this->login_model->user_logout();

		 redirect(base_url().'Login','refresh');
	}
	
}



