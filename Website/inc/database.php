<?php  
/*
$servername = "orbatakcom.ipagemysql.com";
$username = "kuom";
$adminPassword = "Xamputertrix1";
$dbname = "audio_tracks";  
*/

$servername = "localhost";
$username = "root";
$adminPassword = "";
$dbname = "audio_tracks";  


require_once("config.php");

// Includes SoundCloud functions to query
// SoundClouds database for track list
require_once(ROOT_PATH . "inc/soundcloudManager.php");

$soundCloudUsers = array("orbatak", "dirtytactix", "lnix", "phantom-hertz-recordings", "snatchy-trax", "really-good-recordings", );

//Populates Data from SoundCloud into MySQL database
//@param - $users  	array() of SoundCloud usernames from end of url ~ eg soundcloud.com/username 

function populateDatabase($users,$serverName,$databaseName,$userName,$password){
	
	// Empty array to be filled with tracks, and entered to database
	$tracks=array();
	
	try {
	
		$db = new PDO("mysql:host=$serverName;dbname=$databaseName", $userName, $password);
		// set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// begin the transaction
		$db->beginTransaction();
		$db->exec("DELETE FROM tracks");
	   
		// Gets a list of music from various artists filtered by key words
		foreach ($users as $user) {
			// Filters track list by key words and returs array of filtered tracks
			$trackList = getTrackList($user,getClientID());
			$filteredList = getFilteredTracks($trackList, 100, array("Orbatak", "L Nix", "Dirty Tactix"));
			//Loads single track objects into main $tracks array
			foreach ($filteredList as $trackLi) {
				$tracks[] = $trackLi;
			}
		}
			
			$newTracks = removeDuplicates($tracks);
			
			// Iterates through tracks and Inserts into database
			foreach($newTracks as $track) {
			
			/*
			echo '<pre>';
			echo var_dump($track->title);
			echo '</pre>';
			*/
			
				$sql = "INSERT INTO tracks(`title`, `id`, `artwork_url`, 
						`description`, `tag_list`,`last_modified`) VALUES ('
						".addslashes($track->title)."',
						'".$track->id."', '".$track->artwork_url."',
						'".addslashes($track->description)."',
						'".addslashes($track->tag_list)."',
						'".strtotime($track->last_modified)."')";
				$db->exec($sql);
			}
	
		//commit the transaction
		$db->commit();
		echo "New records created successfully";
		}
	catch(PDOException $e)
		{
		echo "Error: " . $e->getMessage();
		// roll back the transaction if something failed
		$db->rollback();
		
	}
	
	$db = null;
}	

//populateDatabase($soundCloudUsers, $servername, $dbname, $username,$adminPassword);	   
	
	
	
function getTracksFromDB ($serverName,$databaseName,$userName,$password, $order="DESC") {
	try {

		$db = new PDO("mysql:host=$serverName;dbname=$databaseName", $userName, $password);

		// set the PDO error mode to exception
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Set the order as either 'ASC' or 'DESC' for ascending or descending
		if ($order!="") { $order = " ORDER BY last_modified ".$order; }
		$stmt = $db->prepare("SELECT title, id, artwork_url, description FROM tracks".$order); 
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
   
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
	$db = null;
	
	return $result	;
}
		   

	