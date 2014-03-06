<?php
/**
 * Instagram PHP API example usage.
 * This is the entry point of your application, it will detect whether
 * the user is already authenticated and will present her the login
 * window in case she is not.
 *
 * If the authentication token is already stored (as a cookie in this case),
 * the user will be redirected to callback.php which is basically the same
 * URI callback that you must set up with Instagram as the return address
 * for your application on their developers section:
 * http://instagr.am/developer/
 *
 *
 * If you have any question, check http://mauriciocuenca.com/ for the
 * latest updates
 */
require_once 'src/Instagram.php';

/**
 * Configuration params, make sure to write exactly the ones
 * instagram provide you at http://instagr.am/developer/
 */


/**
 * This is how a wrong response looks like
 * array(1) { ["InstagramOAuthToken"]=> string(89) "{"code": 400, "error_type": "OAuthException", "error_message": "No matching code found."}" }
 */
session_start();
if (isset($_SESSION['InstagramAccessToken']) && !empty($_SESSION['InstagramAccessToken'])) {
    header('Location: index.php');
    die();
}

// Instantiate the API handler object
$instagram->openAuthorizationUrl();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Oh yes Instagram</title>
</head>

<body>
	<p><a href="https://instagram.com/accounts/login/#" target="_blank">Authorize now!</a></p>
</body>
</html>
