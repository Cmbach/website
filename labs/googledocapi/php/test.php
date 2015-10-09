<?php
require_once '../src/Google_Client.php';
$client = new Google_Client();

const CLIENT_ID = '955572240075.apps.googleusercontent.com';
const CLIENT_SECRET = 'R00lYsFyIgG_O-aGbf1FBNhi';
const REDIRECT_URI = 'http://md/labs/googledocapi/php/test.php';
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setDeveloperKey('');
session_start();

if (isset($_GET['code'])) {
  $client->authenticate();
  $_SESSION['token'] = $client->getAccessToken();
  
  
  header('Location: http://md/labs/googledocapi/php/read.php');
  
}
 
