<?php
require_once APPPATH.'third_party/aws/aws-autoloader.php';
//error_reporting(E_ALL);
//ini_set("display_errors",1);

class MY_Model extends CI_Model
{
public function SendAwsSms(){
	$params = array(
	'credentials'=> array(
	'key'=>'AKIA3YQHXJPSPYIJNVHQ',
	'secret'=>'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',
	),
	'region'=>'ap-south-1',
	'version'=>'latest'
	);

	$sns = new \Aws\Sns\SnsClient($params);

	$args = array(
	"MessageAttributes"=>[
	  // You can put your sender id here but first you to verify the sender id by the customer support of aws then you can use your senderid
	  // If you dont have senderID then you can comment senderID
	  
	  //AWS.SNS.SMS.SenderID =>[
		 //'DataType'=>'String',
		 //'StringValue'=>''
	  //],
	  
	  'AWS.SNS.SMS.SMSType' =>[
		 'DataType'=>'String',
		 'StringValue'=>'Transactional'
	  ],
	],
	"Message"=>"Hello ! This is a test message",
	"PhoneNumber"=>"+919650767440",
	);

	$result = $sns->publish($args);
	
	print_r($result); die;
	
}
}

?>