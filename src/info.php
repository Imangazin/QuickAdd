<?php
//Cookie location
$cookie_location = '';

//You need to set the LTI Key and LTI Secret
$lti_auth = array('key' => '', 'secret' => '');

//Support Email shown to users in the tool
$supportEmail = "";

$config = array(
    'libpath'    => 'lib',

    'host'       => '',
    'port'       => 443,
    'scheme'     => 'https',

    'appId'      => '',
    'appKey'     => '',
    'userId'     => '',
    'userKey'    => '',

    'LP_Version' => '1.42');

$roles = array();

$successMessage = "";
$inactiveUserMessage ="";
?>