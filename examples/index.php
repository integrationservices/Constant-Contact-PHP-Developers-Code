<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Example Scripts</title>
</head>
<body>
<h3>CC API Example Scripts</h3>
<p>Welcome, below you will find some example scripts showing how to use the API code, to use these scripts please edit each file and add your username, password and API key into them.</p>
<p>
	<h3>Contact List Operations</h3>
	<a href="get_lists.php">Get Lists</a><br />
	<a href="get_all_lists.php">Get All Lists</a><br />
	<a href="get_list.php">Get List</a><br />
	<a href="create_list.php">Create List</a><br />
	<a href="update_list.php">Update List</a><br />
	<a href="delete_list.php">Delete List</a><br />
	<a href="get_list_members.php">Get List Members</a><br />
	
	<h3>Contact Operations - use on 25 or less contacts</h3>
	<a href="create_contact.php">Create Contact</a><br />
	<a href="update_contact.php">Update Contact</a><br />
	<a href="get_contact.php">Get Contact</a><br />
	<a href="delete_contact.php">Delete Contact</a><br />
	<a href="query_contacts.php">Query Contacts</a><br />
	<a href="get_contacts.php">Get Contacts</a><br />
	
	<h3>Activities (bulk) Operations - use on 25 or more contacts</h3>
	<a href="create_contacts.php">Create Contacts</a><br />
	<a href="clear_contacts.php">Clear Contacts</a><br />
	<a href="export_contacts.php">Export Contacts</a><br />
	<a href="get_activities.php">Get Activities</a><br />
	<a href="get_activity.php">Get Activity</a><br />
	
	<h3>Campaigns</h3>
	<a href="get_campaigns.php">Get Campaigns</a><br />
	<a href="get_campaign.php">Get Campaign</a><br />
	<a href="delete_campaign.php">Delete Campaign</a><br />
	<a href="query_campaigns.php">Query Campaigns</a><br />
	<a href="create_campaign.php">Create Campaign</a> (not working)<br />
	
	<h3>Account Settings</h3>
	<a href="get_emails.php">Get Emails</a><br />
</p>

<p>Most of these examples will not work out of the box, "Get Lists" and "Get Contacts" will but others depend on the unique ID of a specific resource, unique ID's can be obtained through the API calls. For example to delete a contact list you first need to know the unique ID, you would usually get this by calling either get_list() or get_lists().</p>
</body>
</html>
