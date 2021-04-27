<?php
	function mymessage($message)
	{
		echo '
		<div class="alert alert-info">
			<button data-dismiss="alert" class="close" type="button">×</button> '.$message.'
		</div>
		';
	}

	function crypto( $string, $action) {
        $secret_key = 'wuxP1C0jzR7kgrAkeMkccWMlFlVBey0M';
        $secret_iv = 'E586rrtY85souucV3eEDF';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }

        return $output;
    }

 
	function get_services()
	{
		$CI =& get_instance();
		$CI->load->model('General_model', 'general_model');
		$service = $CI->general_model->get_table('*', 'services');
		return $service;
	}


	function get_services_by_id($id)
	{
		$CI =& get_instance();
		$CI->load->model('General_model', 'general_model');
		$service = $CI->general_model->get_allservices_by_id($id);
		return $service;
	}	 
		
	function push_notification($token = '', $body = '')
	{ 
		if($token != '' && $body != ''){
		    $token = $token;
		    
		   
		    
		    $token_keys = 	explode(",",$token);
		    
		     
		    
		    foreach($token_keys as $token_new)
		    {
    			$ch = curl_init("https://fcm.googleapis.com/fcm/send");
    		
    			//Title of the Notification.
    			$title = 'vistaBAC'; 
    		
    	
    			//Creating the notification array.
    			$notification = array('title' =>$title , 'text' => $body, 'click_action'=>'OPEN_ACTIVITY_1');
    			
    			
    
    			//This array contains, the token and the notification. The 'to' attribute stores the token.
    			$arrayToSend = array('to' => $token_new, 'notification' => $notification,'priority'=>'high');
    			
    				print_r($arrayToSend); die;
    
    			//Generating JSON encoded string form the above array.
    			$json = json_encode($arrayToSend);
    			//Setup headers:
    			$headers = array();
    			$headers[] = 'Content-Type: application/json';
    			$headers[] = 'Authorization: key=AAAAvRrLZDI:APA91bFcdV7oMTdZ1VtetBy_fv3MCoBDDfm58lPRihenKWH2m1fjPbvQa0_Fr0cSCd96Tis4pfznv1f1_MFOe1ao6xB07XGAOQ2u6q8dDPJgz3FvPdhckw6eHzP1C5Bwylp1AkYTF6hq'; // key here
    
    			//Setup curl, add headers and post parameters.
    			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    			curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);       
    			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    			//Send the request
    			
    			$response = curl_exec($ch);
    			
    			print_r($response); die;
    
    			//Close request
    			curl_close($ch);
			
		    }
		
			return $response;
		}else{
			return false;
		}
	}

?>