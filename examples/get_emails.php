<?php // $Id$
/**
 * Get account email addresses
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - get_emails()</title>
</head>
<body>
<h3>Example Script - get_emails()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// get all the emails registered for this constant contact account
	// this method if used for the create_campaign() method
	$emails = $cc->get_emails();
	
	if($emails):
	?>
		<table cellspacing="5" cellpadding="5" border="0">
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Status</th>
			<th>Verified Time</th>
			<th>&nbsp;</th>
		</tr>
		<?php
			foreach($emails as $k => $v):
		?>
			<tr>
				<td><?php echo $v['id']; ?></td>
				<td><?php echo $v['EmailAddress']; ?></td>
				<td><?php echo $v['Status']; ?></td>
				<td><?php echo date('jS F Y', $cc->convert_timestamp($v['VerifiedTime'])); ?></td>
			</tr>
		<?php
			endforeach;
		?>
	
		</table>
	<?php
	else:
		echo "<p>No email addresses exist or failed to get emails</p>";
	endif;
?>

</body>
</html>