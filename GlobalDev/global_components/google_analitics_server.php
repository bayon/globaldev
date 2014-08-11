 

// index.php
 (strippped out the  tags)
   Google Cloud Messaging (GCM) Server in PHP 
    f o r m    method="post" action="gcm.php/?push=1">                                      
                                     
        textarea rows="2" name="message" cols="23" placeholder="Message to transmit via GCM"       textarea 
       
       input type="submit"  value="Send Push Notification via GCM"  
    f o r m
    <?php echo $pushStatus; ?>      
 

// gcm.php

<?php

/*
 * Project ID: axial-camp-538
Project Number:  382927379955
Server API Key: AIzaSyCD-5JCBrJ8zpO0cw9XCCo5fgdpR_pKGA8
Browser API Key: AIzaSyDJtNVZ6FrQHfxH9mwAWuqovZ0utp5v6o
 */


  //generic php function to send GCM push notification
   function sendPushNotificationToGCM($registatoin_ids, $message) {
   	echo("sendPushNotificationToGCM:".$registatoin_ids." : ".$message);
	echo("<pre>");print_r($registatoin_ids); echo('</pre>'); 
	echo("<pre>");print_r($message); echo('</pre>'); 
    //Google cloud messaging GCM-API url
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
    // Google Cloud Messaging GCM API Key
    define("GOOGLE_API_KEY", "AIzaSyCD-5JCBrJ8zpO0cw9XCCo5fgdpR_pKGA8");    
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);   
		echo("<br><br>RESULT:".$result);    
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
?>
<?php
   echo("</br>".__FILE__);
  //this block is to post message to GCM on-click
  $pushStatus = ""; 
  if(!empty($_GET["push"])) {
  	echo("<br>spot 1"); 
    $gcmRegID  = file_get_contents("GCMRegId.txt");
    $pushMessage = $_POST["message"]; 
    if (isset($gcmRegID) && isset($pushMessage)) {
    	echo("<br>spot 2");     
      $gcmRegIds = array($gcmRegID);
      $message = array("messageKey" => $pushMessage); 
      $pushStatus = sendPushNotificationToGCM($gcmRegIds, $message);
    }   
  }
   
  //this block is to receive the GCM regId from external (mobile apps)
  if(!empty($_GET["shareRegId"])) {
  	echo("<br>spot 3"); 
    $gcmRegID  = $_POST["regId"]; 
    file_put_contents("GCMRegId.txt",$gcmRegID);
    echo "Ok!";
    exit;
  } 
  
  /*
   * Checklist – Things that may go wrong:

Check if you have created the ‘Server Key’ there are different types of keys available in Google credentials.
Check if you are using your public-IP address instead of local-ip, in the ‘Edit Allowed IPs’ in Google credentials.
Check if you are using the local-ip address instead of ‘localhost’ in connecting with the custom web application in the Android App.
Check if you have given the right Google project id in the Android app.
Check if you have added permission for Internet in Android manifest file.
Check if you have added/logged in using your Google account in AVD settings.
Google-play-service-Lib project may not be added in the Android app project dependency.
If the GCM registration_id is wrong, following is the response sent from Google cloud messaging server to our web application. 
{"multicast_id":7048577678678825845,"success":0,"failure":1,"canonical_ids":0,"results":[{"error":"InvalidRegistration"}]}
Connection to GCM server is ok and the server has responded. If the Google API key is wrong or the IP address of the server machine is not white listed at Google GCM server. Then we will get, 
Unauthorized Error 401
In this example, passed data must be a JSON array, check if the arguments are being sent in the expected format. We may get error, 
Field "data" must be a JSON array:
   */
?>




// GCMRegId.txt   ( A FILE TO STORE REGISTRATION ID IN )

example id:  APA91bEJma4fvE3v7jCfzN083-47n6KNii-REZfbQUDJue2l4Gs9birZ3GjnxabJSWZIIwWDReqox1cnCo7LzjRtaMB2BM7ZDXyBIprilRcAV9kZYv9qd6MuNyJdyvd2pYE_OIvXu_o748zEDh7zIM_Kn4Jc521G0PhVLHrJ1PuTEy-MpT0EjbY
