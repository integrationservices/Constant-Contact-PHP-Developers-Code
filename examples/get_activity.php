<?php // $Id$
/**
 * Get an individual activity
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - get_activity()</title>
</head>
<body>
<h3>Example Script - get_activity()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// returns an associative array containing the activity data
	$activity_id = (isset($_GET['id'])) ? $_GET['id'] : '';
	$activity = $cc->get_activity($activity_id);
	
	
	if($activity):
	
		// if you are exporting stuff, use this function to download the exported file:
		if($activity['Status'] == 'COMPLETE' && $activity['FileName'] != ''):
			$export = $cc->download_activity_file($activity['FileName']);
			// $export will contain the file constant contact provide
		endif;
	?>
		
		<table cellspacing="5" cellpadding="5" border="0">
			<tr>
				<td>id</td><td><?php echo $activity['id']; ?></td>
			</tr>
			<tr>
				<td>Type</td><td><?php echo $activity['Type']; ?></td>
			</tr>
			<tr>
				<td>Status</td><td><?php echo $activity['Status']; ?></td>
			</tr>
			<tr>
				<td>Transaction Count</td><td><?php echo $activity['TransactionCount']; ?></td>
			</tr>
			<tr>
				<td>Errors</td><td><?php echo $activity['Errors']; ?></td>
			</tr>
			<tr>
				<td>FileName</td><td><?php echo $activity['FileName']; ?></td>
			</tr>
		</table>
	<?php
	else:
		echo "<p>Activity '$activity_id' not found</p>";
	endif;
?>

</body>
</html>