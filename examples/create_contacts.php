<?php // $Id$
/**
 * Create 25 or more contacts
 * This uses the bulk API
 * NOTE: If you use this method to add less than 25 contacts you breach the API terms and conditions!
 * Use multiple calls to create_contact() for adding less than 25 contacts
 */

	require_once '../class.cc.php';

	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - create_contacts()</title>
</head>
<body>
<h3>Example Script - create_contacts()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// Associative array of contacts, for fieldnames see fieldnames.html
	// each contact should have the exact same fields, leave values blank if you need to
	//  if you need to exclude values for contacts set them to NULL
	$contacts = array(
		array(
			'Email Address' => 'nobody1@example.com',
			'First Name' => 'Firstname 1',
			'Last Name' => 'Lastname 1',
		),
		array(
			'Email Address' => 'nobody2@example.com',
			'First Name' => 'Firstname 2',
			'Last Name' => 'Lastname 2',
		),
		array(
			'Email Address' => 'nobody3@example.com',
			'First Name' => 'Firstname 3',
			'Last Name' => 'Lastname 3',
		),
		array(
			'Email Address' => 'nobody4@example.com',
			'First Name' => 'Firstname 4',
			'Last Name' => 'Lastname 4',
		),
		array(
			'Email Address' => 'nobody5@example.com',
			'First Name' => NULL, /*  if you need to exclude values set them to NULL */
			'Last Name' => NULL,
		),
	);

	// alternatively you can pass the path to a local or remote CSV or TXT file
	//$contents = 'http://www.example.com/path_to_import_file.csv';

	// you only need to give the list ID's in this array
	$lists = array(
		0
	);

	// this method will return the activity ID which you can use to check on the status, if you like
	$activity_id = $cc->create_contacts($contacts, $lists);

	if($activity_id):
		echo "New Activity ID is $activity_id";
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