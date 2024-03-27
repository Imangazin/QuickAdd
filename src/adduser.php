<?php
require_once("info.php");
require_once("doValence.php");

// Checks user's browser, returns true if it is Safari
function isSafari() {
    return (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') && !strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'));
}

//triming @ and domain from username
function trimUserName($username){
    if (strpos($username, '@') !== false) {
        $parts = explode('@', $username);
        return $parts[0];
    } else {
        return $username; // If no "@" symbol found, return the username as is
    }
}

function isAllowedToAdd($userId, $orgUnitId){
    global $config, $roles;
    $isAllowed = doValenceRequest('GET','/d2l/api/lp/' . $config['LP_Version'] . '/enrollments/orgUnits/'.$orgUnitId.'/users/'.$userId);
    if (in_array($isAllowed['response']->RoleId, $roles)){
        return true;
    }
    return false;
}

if (isSafari()) session_id($_POST["session_id"]);
session_start();

preg_match('/_(\d+)/', $_SESSION['_basic_lti_context']['user_id'], $matches);
$ltiUserId = (bool) $matches ? $matches[1] : -1;
$orgUnitId = $_SESSION['_basic_lti_context']['context_id'];

//Check the key is correct / wrap everything with LTI credentials
if(($_SESSION['_basic_lti_context']['oauth_consumer_key'] == $lti_auth['key']) && isAllowedToAdd($ltiUserId, $orgUnitId)){
    if (isset($_POST['username']) && isset($_POST['userrole'])) {
        $userName = trimUserName($_POST['username']);
        //getting UserId
        $userData = doValenceRequest('GET', '/d2l/api/lp/' . $config['LP_Version'] . '/users/?userName=' . $userName);
        $userStatus = $userData['response']->Activation->IsActive;
        //enrolling user into course offerring
        if ($userData['Code']==200){
            $userId = $userData['response']->UserId;
            $postOfferingData = array("OrgUnitId"=>(int)$orgUnitId,"UserId"=>$userId,"RoleId"=>(int)$_POST[userrole]);
            $offerringEnroll = doValenceRequest('POST', '/d2l/api/lp/'. $config['LP_Version'] .'/enrollments/', $postOfferingData);
        }
        else{
            echo json_encode(array("success"=> false, "message"=>"No such user"));
            return;
        }
        //getting a list of sections
        if ($offerringEnroll['Code']==200){
            $sections = doValenceRequest('GET','/d2l/api/lp/'. $config['LP_Version'] . '/'. $orgUnitId. '/sections/');
        }
        else{
            echo json_encode(array("success"=> false, "message"=>"Unable to create course offerring enrollment"));
        return;
        }
        // //enrolling user into sections
        // if($sections['Code']==200){
        //     $postSectionData = array("UserId"=>$userId);
        //     foreach($sections['response'] as $s){
        //         $sectionEnroll = doValenceRequest('POST','/d2l/api/lp/'. $config['LP_Version'] .'/'. $orgUnitId. '/sections/'. $s->SectionId. '/enrollments/', $postSectionData);
        //     }
        // }
        // if ($userStatus){
        //     $message = str_replace("OrgUnitId",str($orgUnitId),$successMessage);
        //     echo json_encode(array("success"=> true, "message"=>$message));
        // }
        // else{
        //     echo json_encode(array("success"=> true, "message"=>$inactiveUserMessage));
        // }
    }
}
else {
    echo json_encode(array("success"=> false, "message"=>"User has no permission to add user"));
}
?>