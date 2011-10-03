<?php // $Id$
/**
 * Export contacts activity
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - export_contacts()</title>
</head>
<body>
<h3>Example Script - export_contacts()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// you only need to give the list ID, only 1 list supported at a time
	// you can also use the following special lists, removed, do-not-mail, active
	$list_id = 'do-not-mail';
	$export_type = 'CSV'; /* CSV or TXT */
	
	/* 
		see fieldnames.html for a list of fieldnames you can export
		some fields are always included such as added timestamp
	*/
	$columns = array(
		'FIRST NAME', 
		'MIDDLE NAME', 
		'LAST NAME', 
		'JOB TITLE', 
		'COMPANY NAME', 
	);
	
	// returns the activity ID which you can use to check on the status, if you like
	$activity_id = $cc->export_contacts($list_id, $export_type, $columns);
	
	if($activity_id):
		echo "New Activity ID is: $activity_id.";
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