<?php // $Id$
/**
 * Create a new campaign
 *
 *
 * NOTE: This method allows you to create a custom html campaign.
 * You Still have to visit constantcontact.com to send the campaign.
 * Please ensure you include all options otherwise it may break.
 * If you need to exclude certain options set them to No or a blank string.
 * For an overview of what the options below mean see:
 * @see http://developer.constantcontact.com/doc/manageCampaigns#create_campaign
 *
 */
	
	require_once '../class.cc.php';
	
	// Set your Constant Contact account username and password below
	$cc = new cc('username', 'password');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Script - create_campaign()</title>
</head>
<body>
<h3>Example Script - create_campaign()</h3>
<p><a href="index.php">View all example scripts</a></p>

<?php
	// the title for your campaign
	$title = 'New campaign title';
	
	// ID's of the contact lists to send the campaign to
	$contact_lists = array(6, 7, 8);
	
	// an associative array of options to send
	// keys are the fieldnames as defined by constant contact
	$options = array(
	
		// email address you send the email from, has to be registered and active for this to work
		'EmailAddress' => 'someone@example.com', 
		
		// name associated with the email address your send from , can be anything you like
		'FromName' => 'Your Company Name',
		
		// subject for the new email
		'Subject' => 'Tester Email',
		
		// see the constant contact link above for a description of these fields.
		'ViewAsWebpage' => 'NO',
		'ViewAsWebpageLinkText' => 'NO',
		'ViewAsWebpageText' => 'NO',
		'PermissionReminder' => 'YES',
		'PermissionReminderText' => 'You\'re receiving this email because of your relationship with ctct. 
Please &lt;ConfirmOptin>&lt;a style="color:#0000ff;">confirm&lt;/a>&lt;/ConfirmOptin> 
your continued interest in receiving email from us.',
		'GreetingSalutation' => 'Dear',
		'GreetingName' => 'FirstName',
		'GreetingString' => 'Greetings!',
		'OrganizationName' => 'ctct',
		'OrganizationAddress1' => '123 wsw st',
		'OrganizationAddress2' => 'NO',
		'OrganizationAddress3' => 'NO',
		'OrganizationCity' => 'Ashland',
		'OrganizationState' => 'MA',
		'OrganizationInternationalState' => '',
		'OrganizationCountry' => 'us',
		'OrganizationPostalCode' => '32423',
		'IncludeForwardEmail' => 'NO',
		'ForwardEmailLinkText' => '',
		'IncludeSubscribeLink' => 'NO',
		'SubscribeLinkText' => '',
		'EmailContentFormat' => 'HTML',
		'EmailContent' => '&lt;html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" 
xmlns:cctd="http://www.constantcontact.com/cctd">
&lt;body>&lt;CopyRight>Copyright (c) 1996-2009 Constant Contact. All rights reserved.  Except as permitted under a
separate
written agreement with Constant Contact, neither the Constant Contact software, nor any content that appears on any
Constant Contact site,
including but not limited to, web pages, newsletters, or templates may be reproduced, republished, repurposed, or
distributed without the
prior written permission of Constant Contact.  For inquiries regarding reproduction or distribution of any Constant
Contact material, please
contact joesflowers@example.com.&lt;/CopyRight>
&lt;OpenTracking/>
&lt;!--  Do NOT delete previous line if you want to get statistics on the number of opened emails -->
&lt;CustomBlock name="letter.intro" title="Personalization">
    &lt;Greeting/>
&lt;/CustomBlock>
&lt;/body>
&lt;/html>',
		'EmailTextContent' => '&lt;Text>This is the text version.&lt;/Text>',
		'StyleSheet' => '',
	);
	
	// call the create_campaign() method
	$campaign_id = $cc->create_campaign($title, $contact_lists, $options);
	
	if($campaign_id):
		echo "<p>A new campaign has been created with ID: '$campaign_id'</p>";
	else:
		// if an error occurs we can debug it any various ways
		
		// show a simple error to the user
		echo "Campaign could not be created " . $cc->http_get_response_code_error($cc->http_response_code);
		
		// or output the last http request and response strings, for debugging only
		$cc->show_last_connection();
		
		// usually the http_response_body will contain a more descriptive error to help debug
		if($cc->http_response_body):
			echo '<p>' . $cc->http_response_body . '</p>';
		endif;
	endif;
?>

</body>
</html>