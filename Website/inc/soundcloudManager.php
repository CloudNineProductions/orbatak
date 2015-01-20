<?php 
// Adds the configuration file that points to the root directory of the site.
require_once("config.php");



// Adds the SoundCloud API
require(ROOT_PATH."Soundcloud.php");

// Creates new SoundCloud Client
// Needs sound cloud User ID, 
/* Optional - User Secret, and a live website URL for 
	Authorization and more advanced operations <eg. Post comment, upload> */
	
	$orbatakUserID = 1458585;  //  unused variable

	$soundcloud = new Services_Soundcloud(getClientID(), getClientSecret());
	
	// __ Betamorph Recordings, DIRTY TACTIX,Snatchy Trax ,L Nix, Really Good Recordings


function getTrackList ($artist, $clientID) {

	
	// Gets track list from specific SoundCloud user

	// build our API URL 
	$url = "http://api.soundcloud.com/resolve.json?"
	 . "url=http://soundcloud.com/"
	 . $artist
	 . "&client_id=".$clientID;
	 
	// Grab the contents of the URL
	$user_json = file_get_contents($url);
	 
	// Decode the JSON to a PHP Object
	$user = json_decode($user_json);
	 
	$targetUserID =	$user->id; // Artist ID number						
	 
	$soundcloud_url = "http://api.soundcloud.com/users/{$targetUserID}/tracks.json?client_id={$clientID}";
	 
	$tracks_json = file_get_contents($soundcloud_url);
	$tracks = json_decode($tracks_json);


	return $tracks;
}

function getClientID (){
	$clientID = "17b4145ac352fee132b229174b5796de"; // CloudE API Client ID
	
	return $clientID;
}

function getClientSecret (){
	$clientSecret = "'71e77b54447954f203aad1b6e78a7db7'"; // CloudE  API Client Secret

	return $clientSecret;
}

?>