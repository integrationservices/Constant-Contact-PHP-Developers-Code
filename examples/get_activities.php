<?php // $Id$
/**
 * Get list of activities
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - get_activities()</title>
</head>
<body>
<h3>Example Script - get_activities()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// returns an associative array of activities
	$activities = $cc->get_activities();
	
	
	if($activities):
	?>
		<table cellspacing="5" cellpadding="5" border="0">
		<tr>
			<th>ID</th>
			<th>TYPE</th>
			<th>STATUS</th>
			<th>RECORDS</th>
			<th>ERRORS</th>
			<th>&nbsp;</th>
		</tr>
		<?php
			foreach($activities as $k => $v):
		?>
			<tr>
				<td><?php echo $v['id']; ?></td>
				<td><?php echo $v['Type']; ?></td>
				<td><?php echo $v['Status']; ?></td>
				<td><?php echo $v['TransactionCount']; ?></td>
				<td><?php echo $v['Errors']; ?></td>
				<td><a href="get_activity.php?id=<?php echo $v['id']; ?>">View Activity</a></td>
			</tr>
		<?php
			endforeach;
		?>
	
		</table>
	<?php
	else:
		echo '<p>You have no activities</p>';
	endif;
?>

</body>
</html>