<?php // $Id$
/**
 * Get list of campaigns
 * This is a more complex script
 * We provide a drop down selection so they can browse the different statuses
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - query_campaigns()</title>
</head>
<body>
<h3>Example Script - query_campaigns()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	$valid_statuses = array('DRAFT', 'RUNNING', 'SENT', 'SCHEDULED');
	
	$status = 'SENT'
	if(isset($_GET['status']) && in_array($_GET['status'], $valid_statuses)):
		$status = $_GET['status'];
	endif;
	
	$campaigns = $cc->query_campaigns($status);
?>

	<form action="" method="get">
	<select name="status" onchange="this.form.submit();">
	<?php
	foreach($valid_statuses as $_status):
		if($status == $_status):
			echo '<option selected value="'.$_status.'">'.$_status.'</option>';
		else:
			echo '<option value="'.$_status.'">'.$_status.'</option>';
		endif;
	endforeach;
	?>
	</select>
	</form>

<?php
	
	/*
	 * SENT  	    All campaigns that have been sent and not currently scheduled for resend
	 * SCHEDULED 	All campaigns that are currently scheduled to be sent some time in the future
	 * DRAFT 	    All campaigns that have not yet been scheduled for delivery
	 * RUNNING 	    All campaigns that are currently being processed and delivered
	 */
	
	if($campaigns):
	?>
		<h1><?=$status?> Campaigns</h1>
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
		echo "<p>No $status campaigns found</p>";
	endif;
?>

</body>
</html>