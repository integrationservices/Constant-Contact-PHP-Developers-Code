<?php // $Id$
/**
 * Get all contacts
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - get_contacts()</title>
</head>
<body>
<h3>Example Script - get_contacts()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	$page = (isset($_GET['page'])) ? $_GET['page'] : 'contacts';
	
	// supports viewing pages of contacts
	$contacts = $cc->get_contacts($page);
	
	if($contacts){
		foreach($contacts as $k => $v){
			echo "<p>ID {$v['id']}: {$v['EmailAddress']}</p>";
		}
		
		// get the meta data, used for paging the results
		echo '<a href="?page='.$cc->contact_meta_data->first_page.'">First Page</a><br />';
		echo '<a href="?page='.$cc->contact_meta_data->current_page.'">Current Page</a><br />';
		echo '<a href="?page='.$cc->contact_meta_data->next_page.'">Next Page</a><br />';
	}
?>

</body>
</html>