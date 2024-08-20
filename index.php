<?php
require_once("src/info.php");
require_once ("ims-blti/blti.php");


// Session will have partitioned parameter that required for Chrome like browsers
// Other browsers that does not support partitioned cookie, will still work under Samesite=None
// Safari will not keep third party cookies at all, so we will send session id as a hidden element in the form
session_start();
$id = session_id();
header("Set-Cookie: PHPSESSID=$id; Secure; Path=$cookie_location; HttpOnly; SameSite=None; Partitioned;");
//All of the LTI Launch data gets passed through in $_REQUEST
if(isset($_REQUEST['lti_message_type'])) {    //Is this an LTI Request?
    //LTI tool declared with session data
    $context = new BLTI($lti_auth['secret'], true, false);
    if($context->complete) exit(); //True if redirect was done by BLTI class
    if($context->valid) { //True if LTI request was verified
        //main page
        include 'src/home.php';
    }
}
else { 
    echo 'LTI credentials not valid. Please refresh the page and try again. If you continue to receive this message please contact <a href="mailto:'.$support_email.'?Subject=Quick Add Widget Issue" target="_top">'.$support_email.'</a>';
}
?>


