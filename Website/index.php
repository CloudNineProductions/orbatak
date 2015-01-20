<?php 

// Adds the configuration file that points to the root directory of the site.
require_once("inc/config.php");

// Adds the SoundCloud API Module
require(ROOT_PATH."inc/soundcloudManager.php");
require(ROOT_PATH."inc/soundcloudPlayer.html.php");


$tracks= getTrackList("orbatak", "17b4145ac352fee132b229174b5796de");
 
$pageTitle = "Orbatak Official";
$section = "home";


include(ROOT_PATH."inc/header.php");

?>
	<div class="wrapper">	
<?php 

getSoundcloudAudioPlayer($tracks[0]->id, false, true, 450);

echo '<h2>More Fresh Music</h2>';
echo '<div class="trackIconContainer">';
getMultipleTracks($tracks, 5, array("Orbatak", "L Nix", "Dirty Tactix"), 1);
?>
		</div>
		<div class="push"></div>

	</div>

<?php include(ROOT_PATH."inc/footer.php"); ?>