-------------------------------------------------------
Constant Contact PHP Code Library - integrationservic.es
-------------------------------------------------------

-------------------------------------------------------
REQUIREMENTS:
-------------------------------------------------------
PHP 4.3.0 or higher
XML extension installed and enabled
curl extension with SSL support

Constant Contact account username and password.

IMPORTANT:
This code has an API key hardcoded.
If you include this code within an application such as a plugin, module or some other form of component that bolts onto another system please create your own API key and set it within your application using the set_api_key() method.

If all you are doing is integrating this code into a website for a signup form or into a website backend to provide administration functions you do not need to create an additional API key.

If unsure please get in touch with myself or Constant Contact.

	
-------------------------------------------------------
LICENSE:
-------------------------------------------------------
Use of the code is subject to the license agreement.
The license can be found within LICENSE.txt
	
-------------------------------------------------------
INSTALLATION:
-------------------------------------------------------
Unzip the file.
Upload class.cc.php to your webserver.
In your script initiate the Constant Contact class like so:

require_once 'class.cc.php';
$cc = new cc('your_username', 'your_password');

-------------------------------------------------------
UPGRADING:
-------------------------------------------------------
To upgrade simply overwrite the class.cc.php file

-------------------------------------------------------
USAGE:
-------------------------------------------------------
Check the example PHP scripts within /examples/

/examples/index.php contains some useful info to get you started.

It is best not to edit the class.cc.php file directly or upgrading will be harder.
Instead create your own class and extend the cc class.
If your not familar with how to extend a class you can read up on it here:
http://php.net/language.oop5.basic.extends
	
-------------------------------------------------------
DOCUMENTATION:
-------------------------------------------------------
API Docs for the PHP code can be found within /docs/
We provide both HTML and PDF formats
The docs were generated from inline comments using PHPDoc (phpdoc.org)
Other documentation can be found within the /examples/ sub-folder.
You should also be familar with the Constant Contact API Docs:
http://developer.constantcontact.com/doc/reference

-------------------------------------------------------
FURTHER HELP:
-------------------------------------------------------
If you need help please see http://integrationservic.es/
I can't guarantee you a reply but if you've found a bug I'd be happy to investigate (please email your bug report to info@ the above domain).
Before you get in touch please make sure you have downloaded the latest code incase a newer version has been released.

