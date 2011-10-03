<?php // $Id$
/**
 * Get all contact lists for a specific account ordered according to the SortOrder field
 * This methid should be used instead of the get_lists method if you want all lists in one array
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - get_all_lists()</title>
</head>
<body>
<h3>Example Script - get_all_lists()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// if you do not want to view the special lists such as do-not-mail set the second parameter to 3
	$lists = $cc->get_all_lists('lists', 0);
	
	if($lists){
		foreach($lists as $k => $v){
			echo "<p>List {$v['id']}: {$v['Name']}</p>";
		}
	}
?>

</body>
</html>