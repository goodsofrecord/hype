<?php/*///////////////////////////////////////////////////////////////////////Part of the code from the book Building Findable Websites: Web Standards, SEO, and Beyondby Aarron Walter (aarron@buildingfindablewebsites.com)http://buildingfindablewebsites.comDistrbuted under Creative Commons licensehttp://creativecommons.org/licenses/by-sa/3.0/us////////////////////////////////////////////////////////////////////////*/function storeAddress(){		// Validation	if(!$_GET['email']){ return "No email address provided"; } 	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_GET['email'])) {		return "Email address is invalid"; 	}	require_once('MCAPI.class.php');	// grab an API Key from http://admin.mailchimp.com/account/api/	$api = new MCAPI('0d9d7745671c89d03efc4eba20ff736a-us8');		// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/	// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 	$list_id = "6765eb0793";	if($api->listSubscribe($list_id, $_GET['email'], '') === true) {		// It worked!			return 'Success! Check your email to confirm sign up  just kidding.';	}else{		// An error ocurred, return error message			return 'Error: ' . $api->errorMessage;	}	}// If being called via ajax, autorun the functionif($_GET['ajax']){ echo storeAddress(); }?>