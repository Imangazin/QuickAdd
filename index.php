<?php
require_once("info.php");

// Load up the LTI Support code
require_once 'ims-blti/blti.php';

//Initialize, all secrets as 'secret', do not set session, and do not redirect
$context = new BLTI($lti_auth['secret'], false, false);

session_start();
$_SESSION['toolKey'] = $context->info['oauth_consumer_key'];
$_SESSION['OrgUnitId'] = $context->info['context_id'];
session_write_close();


//Check the key is correct
if($lti_auth['key'] == $context->info['oauth_consumer_key']){
        //bring quickAdd HTML page
        readfile("adduser.html");
}
else{
        echo 'LTI credentials not valid. Please refresh the page and try again. If you continue to receive this message please contact <a href="mailto:'.$supportEmail.'?Subject=Campus Store in Sakai" target="_top">'.$supportEmail.'</a>';
}

?>
