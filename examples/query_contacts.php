<?php // $Id$
/**
 * This will return the contact with the specified email address
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - query_contacts()</title>
</head>
<body>
<h3>Example Script - query_contacts()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// We can find a contact by email address using this method
	$email = 'nobody@example.com';
	$contact = $cc->query_contacts($email);
	
	if($contact):
		echo $contact['Name'] . ' - ' . $contact['EmailAddress'];
	else:
		echo 'Could NOT find contact: ' . $email;
	endif;
	
	
	// We can also find multiple contacts by last updated date and contact list
	// The date has to be in UTC format specified by the Atom spec 
	$updatedsince = '2008-07-23T14:21:06.407Z';  // (e.g. 2008-07-23T14:21:06.407Z)
	$listtype = 'active'; // active, removed or do-not-mail
	$contacts = $cc->get_contacts('contacts?updatedsince=$updatedsince&listtype=$listtype');
	
	if($contacts):
		foreach($contacts as $k => $v){
			echo "<p>ID {$v['id']}: {$v['EmailAddress']}</p>";
		}
	else:
		echo 'Could NOT find any contacts';
	endif;
?>

</body>
</html>