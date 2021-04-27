<?php
Class General_model extends CI_Model
{
	
	
	/* function __construct(){
       parent::__construct();
       //load our second db and put in $this->db2
       $this->db2 = $this->load->database('database2', TRUE);
			
    }
	 */
	
	function general()
	{
		parent::Model();
		$this->load->database();
	}
	
	
	
	   public function get_row_data($table, $con) 
	   {
		   
		
			$data=array();	
			
			$query = $this->db->select('*')->from($table)->where($con)->get();
		
		//echo $this->db->last_query(); die;
			
			if($query->num_rows()>0 ) {
				$data = $query->row_array();
			   return $data;
			} else {
				return $data;
			}				
	
	}
	  public function get_table_data($table, $con, $limit='', $page=0) {
	    $data=array();
	  //   $query = $this->db->select('*')->from($table)->where($con)->get();
		//	echo $this->db->last_query(); die;
			$this->db->select('*');
			$this->db->from($table);
			if(!empty($con)){
			$this->db->where($con);
			}
			
			/*
			   $start=0;
				if($page > 0)
				{
				$start = $page*$limit;
				 $this->db->limit($limit,$start);	
				}else{
					if($limit > 0)
				$this->db->limit($limit);
			else
				$this->db->limit(10);
				}
				*/
			$query  = $this->db->get();
			//	echo $this->db->last_query(); die;
			if($query->num_rows()>0 ) {
				$data = $query->result_array();
			   return $data;
			} else {
				return $data;
	       }
	  }

	 

	
	
	
} // end here