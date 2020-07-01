<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('97752219586-1k23j8hbc5fq9vu9rfvbot3su2cptpd5.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('Yx2SUpIsM_dDnfQrBsEaO6os');

//Set the OAuth 2.0 Redirect URI
//$google_client->setRedirectUri('http://localhost/fsre/rnwa/vjezba9a/index.php');
$google_client->setRedirectUri('http://localhost/BIRTandAJAX/index2.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>