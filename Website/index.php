<?php 

// Adds the configuration file that points to the root directory of the site.
require_once("inc/config.php");

// Adds the SoundCloud API Module
require_once(ROOT_PATH."inc/soundcloudManager.php");
require_once(ROOT_PATH."inc/soundcloudPlayer.html.php");
require_once(ROOT_PATH."inc/database.php");


$tracks= getTracksFromDB($servername, $dbname, $username,$adminPassword);
 
/*
 echo '<pre> ';
 echo var_dump($tracks[0]);
 echo strtotime('2014/11/15 01:32:18 +0000');
 echo '</pre>';
*/
 
$pageTitle = "Orbatak Official";
$section = "home";


include(ROOT_PATH."inc/header.php");

?>
	<div class="wrapper">	
<?php 


getSoundcloudAudioPlayer($tracks[0]['id'], false, false, 450);

echo '<h2>More Fresh Music</h2>';
echo '<div class="trackIconContainer">';
$index=0;
$limit=5;

foreach($tracks as $track) {
	if ($index < $limit){
		getSoundcloudTrackIcon($track);
	}
	$index++;
}
	
?>
		</div>
		<div class="push"></div>

	</div>

<?php include(ROOT_PATH."inc/footer.php"); ?>