<?php // $Id$
/**
 * Create a new contact
 */
	
	require_once '../class.cc.php';

	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - create_contact()</title>
</head>
<body>
<h3>Example Script - create_contact()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	$email = 'nobody@example.com';
	$contact_list = 0;
	$extra_fields = array(
		'FirstName' => 'Firstname',
		'LastName' => 'Lastname',
	);
	
	// check if the contact exists
	$contact = $cc->query_contacts($email);
	
	// uncomment this line if the user makes the action themselves
	//$cc->set_action_type('contact');  
	
	
	if($contact):
		// update the contact
		$status = $cc->update_contact($contact['id'], $email, $contact_list, $extra_fields);
		
		if($status):
			echo "Contact {$contact['id']} has been updated";
		else:
			// if an error occurs we can debug it any various ways
			
			// show a simple error to the user
			echo "Update Contact Operation failed: " . $cc->http_get_response_code_error($cc->http_response_code);
			
			// or output the last http request and response strings, for debugging only
			$cc->show_last_connection();
			
			// usually the http_response_body will contain a more descriptive error to help debug
			if($cc->http_response_body):
				echo '<p>' . $cc->http_response_body . '</p>';
			endif;
		endif;
	else:
		// create the contact
		$new_id = $cc->create_contact($email, $contact_list, $extra_fields);
		
		if($new_id):
			echo "Contact created with ID $new_id";
		else:
			// if an error occurs we can debug it any various ways
			
			// show a simple error to the user
			echo "Create Contact Operation failed: " . $cc->http_get_response_code_error($cc->http_response_code);
			
			// or output the last http request and response strings, for debugging only
			$cc->show_last_connection();
			
			// usually the http_response_body will contain a more descriptive error to help debug
			if($cc->http_response_body):
				echo '<p>' . $cc->http_response_body . '</p>';
			endif;
		endif;
	endif;
?>

</body>
</html>