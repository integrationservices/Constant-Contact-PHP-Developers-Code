<?php // $Id$
/**
 * Get an individual campaign
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - get_campaign()</title>
</head>
<body>
<h3>Example Script - get_campaign()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// returns an array containing the campaign data
	$campaign_id = (isset($_GET['id'])) ? $_GET['id'] : '';
	$campaign = $cc->get_campaign($campaign_id);
	
	if($campaign):
	?>
		<p>Below only shows a limited amount of data, you can obtain full campaign data from this method.</p>
		
		<table cellspacing="5" cellpadding="5" border="0">
			<tr>
				<td>id</td><td><?php echo $campaign['id']; ?></td>
			</tr>
			<tr>
				<td>Name</td><td><?php echo $campaign['Name']; ?></td>
			</tr>
			<tr>
				<td>Subject</td><td><?php echo $campaign['Subject']; ?></td>
			</tr>
			<tr>
				<td>From Name</td><td><?php echo $campaign['FromName']; ?></td>
			</tr>
			<tr>
				<td>From Email</td><td><?php echo $campaign['FromEmail']['EmailAddress']; ?></td>
			</tr>
			<tr>
				<td>Campaign Type</td><td><?php echo $campaign['CampaignType']; ?></td>
			</tr>
			<tr>
				<td>View as Webpage</td><td><?php echo $campaign['ViewAsWebpage']; ?></td>
			</tr>
			<tr>
				<td>View as Webpage Link Text</td><td><?php echo $campaign['ViewAsWebpageLinkText']; ?></td>
			</tr>
			<tr>
				<td>View as Webpage Text</td><td><?php echo $campaign['ViewAsWebpageText']; ?></td>
			</tr>
			<tr>
				<td>Permission Reminder</td><td><?php echo $campaign['PermissionReminder']; ?></td>
			</tr>
			<tr>
				<td>Permission ReminderText</td><td><?php echo $campaign['PermissionReminderText']; ?></td>
			</tr>
			<tr>
				<td>Status</td><td><?php echo $campaign['Status']; ?></td>
			</tr>
			<tr>
				<td>Date</td><td><?php echo date('jS F Y', $cc->convert_timestamp($campaign['Date'])); ?></td>
			</tr>
			<tr>
				<td>Sent</td><td><?php echo $campaign['Sent']; ?></td>
			</tr>
			<tr>
				<td>Opens</td><td><?php echo $campaign['Opens']; ?></td>
			</tr>
			<tr>
				<td>Clicks</td><td><?php echo $campaign['Clicks']; ?></td>
			</tr>
			<tr>
				<td>Bounces</td><td><?php echo $campaign['Bounces']; ?></td>
			</tr>
			<tr>
				<td>Forwards</td><td><?php echo $campaign['Forwards']; ?></td>
			</tr>
			<tr>
				<td>OptOuts</td><td><?php echo $campaign['OptOuts']; ?></td>
			</tr>
			<tr>
				<td>Spam Reports</td><td><?php echo $campaign['SpamReports']; ?></td>
			</tr>
			<tr>
				<td colspan="2">
					<br />
					<a href="delete_campaign.php?id=<?php echo $campaign['id']; ?>">Delete this campaign</a>
				</td>
			</tr>
		</table>
	<?php
	else:
		echo "<p>Campaign '$campaign_id' not found</p>";
	endif;
?>

</body>
</html>