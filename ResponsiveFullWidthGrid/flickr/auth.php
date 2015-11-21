<?php
/* Last updated with phpFlickr 3.1
 *
 * Edit these variables to reflect the values you need. $default_redirect 
 * and $permissions are only important if you are linking here instead of
 * using phpFlickr::auth() from another page or if you set the remember_uri
 * argument to false.
 */
// Include configuration file
require 'config.php';
// Include phpFlickr class
require 'phpFlickr.php';
$default_redirect   = "/";
$permissions        = "read";
ob_start();
// Clear the token if it is set
if( isset($_SESSION['phpFlickr_auth_token']) ) unset($_SESSION['phpFlickr_auth_token']);
// Grab the authentication redirect if it is set
if( isset($_SESSION['phpFlickr_auth_redirect']) && !empty($_SESSION['phpFlickr_auth_redirect']) ) {
    $redirect = $_SESSION['phpFlickr_auth_redirect'];
    unset($_SESSION['phpFlickr_auth_redirect']);
}
$f = new phpFlickr(FLICKR_API_KEY, FLICKR_API_SECRET, true);
if( empty($_GET['frob']) )
    $f->auth($permissions, false);
else
    $f->auth_getToken($_GET['frob']);
if( empty($redirect) )
    header("Location: " . $default_redirect);
else
    header("Location: " . $redirect);
exit();