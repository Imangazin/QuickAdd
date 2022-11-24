<?php
require_once("info.php");

//Bring in our functions
require_once("functions.php");

// Load up the LTI Support code
require_once 'ims-blti/blti.php';

//Initialize, all secrets as 'secret', do not set session, and do not redirect
$context = new BLTI($lti_auth['secret'], false, false);


//Check the key is correct
if($lti_auth['key'] == $context->info['oauth_consumer_key']){
	// define variables and set to empty values
	$userName = $userRole = "";
	//bring quickAdd HTML page  
	readfile("adduser.html");
}
else{
	echo 'LTI credentials not valid. Please refresh the page and try again. If you continue to receive this message please contact <a href="mailto:'.$supportEmail.'?Subject=Campus Store in Sakai" target="_top">'.$supportEmail.'</a>';
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>