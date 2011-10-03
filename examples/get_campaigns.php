<?php // $Id$
/**
 * Get list of campaigns
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - get_campaigns()</title>
</head>
<body>
<h3>Example Script - get_campaigns()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// returns an associative array of campaigns
	// this does not return full campaign data, use the get_campaign() method for that
	$campaigns = $cc->get_campaigns();
	
	
	if($campaigns):
	?>
		<table cellspacing="5" cellpadding="5" border="0">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Date</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
		<?php
			foreach($campaigns as $k => $v):
		?>
			<tr>
				<td><?php echo $v['id']; ?></td>
				<td><?php echo $v['Name']; ?></td>
				<td><?php echo date('jS F Y', $cc->convert_timestamp($v['Date'])); ?></td>
				<td><?php echo $v['Status']; ?></td>
				<td><a href="get_campaign.php?id=<?php echo $v['id']; ?>">View Campaign</a></td>
			</tr>
		<?php
			endforeach;
		?>
	
		</table>
	<?php
	else:
		echo '<p>You have no campaigns</p>';
	endif;
?>

</body>
</html>