<?php
function sendsms($mobileno, $message){

    $message = urlencode($message);
    $sender = 'SEDEMO'; 
    $apikey = 'YOUR_API_KEY_HERE';
    $baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

    $url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Use file get contents when CURL is not installed on server.
    if(!$response){
        $response = file_get_contents($url);
    } 
}
?>