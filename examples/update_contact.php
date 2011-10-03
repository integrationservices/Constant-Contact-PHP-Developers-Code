<?php // $Id$
/**
 * Update a contact
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - update_contact()</title>
</head>
<body>
<h3>Example Script - update_contact()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	$email = 'nobody@example.com';
	
	// find the contact
	$contact = $cc->query_contacts($email);
	
	// exit if we could not find the contact, or issue some sort of error
	if(!$contact):
		exit("Contact email ($email) not found");
	endif;
	
	// set their ID obtained from the above call
	$id = $contact['id'];
	
	// set your contact list ID's
	$contact_list_id = array(1, 2, 3);
	
	// set any extra fields or you can skip this argument altogether
	$extra_fields = array(
		'FirstName' => 'Firstname',
		'LastName' => 'Lastname',
	);
	
	// uncomment this if the user makes the action themselves
	//$cc->set_action_type('contact');  
	$status = $cc->update_contact($id, $email, $contact_list_id, $extra_fields);
	
	if($status):
		echo "Contact updated";
	else:
		// if an error occurs we can debug it any various ways
		
		// show a simple error to the user
		echo "Operation failed: " . $cc->http_get_response_code_error($cc->http_response_code);
		
		// or output the last http request and response strings, for debugging only
		$cc->show_last_connection();
		
		// usually the http_response_body will contain a more descriptive error to help debug
		if($cc->http_response_body):
			echo '<p>' . $cc->http_response_body . '</p>';
		endif;
	endif;
?>

</body>
</html>