<?php // $Id$
/**
 * Get contact lists for a specific account
 * Supports paging of the results eg. $cc->get_lists('lists?next=6');
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - get_lists()</title>
</head>
<body>
<h3>Example Script - get_lists()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	$page = (isset($_GET['page'])) ? $_GET['page'] : 'lists';
	
	$lists = $cc->get_lists($page);
	
	if($lists){
		foreach($lists as $k => $v){
			echo "<p>List {$v['id']}: {$v['Name']}</p>";
		}
		
		// get the meta data, used for paging the results
		echo '<a href="get_lists.php?page='.$cc->list_meta_data->first_page.'">First Page</a><br />';
		echo '<a href="get_lists.php?page='.$cc->list_meta_data->current_page.'">Current Page</a><br />';
		echo '<a href="get_lists.php?page='.$cc->list_meta_data->next_page.'&prev='.$cc->list_meta_data->current_page.'">Next Page</a><br />';
	}
?>

</body>
</html>