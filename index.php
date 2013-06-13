<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */


session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$content = '<button><a href = "/clearsessions.php">Log Out</a></button>';
include('html.inc');
$response = $connection->get('statuses/user_timeline');
echo '<pre >';  if (!is_string($response)) {

foreach($response as $t) {
    
    // grabs the tweets
   echo '<p>'.$t->text.'</p>';
}
  }
  else{
 

  echo $response.'is strring';

}



