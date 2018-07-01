<?php
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "iam_davido";
$notweets = 30;
$consumerkey = "zi7fyufvTE7qguE8iUWbtnQep";
$consumersecret = "RegZIMzvMN5LWtB2omIsE0bs4xAb8onnkUTsMAcOzTTvZ66U9W";
$accesstoken = "38137876-cqE2YqXlusAUtU610UbRpIxLCWUWrePgTqlsROp05";
$accesstokensecret = "TlmXNRafrf3Rva2pGB0atnlPYIAQf9SfrDuo6kKkUcBoY";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>