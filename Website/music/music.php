<?php 

require_once("../inc/config.php");

$pageTitle = "Music - Orbatak";
$section = "music";
include(ROOT_PATH."inc/header.php");
?>

<div class="wrapper">


<?php 

// Adds the SoundCloud API Module
require_once(ROOT_PATH."inc/soundcloudManager.php");
require_once(ROOT_PATH."inc/soundcloudPlayer.html.php");

$userNames = array("orbatak", "dirtytactix", "lnix", "phantom-hertz-recordings", "snatchy-trax", "really-good-recordings", );

$ID=getClientID();
$tracks= getTrackList("orbatak", $ID);

if (isset($_GET['id'])) {
	getSoundcloudAudioPlayer($_GET['id'], true, true);
}
else {
	getSoundcloudAudioPlayer($tracks[0]->id, false, true);
}
?>

<h2>Most Recent SoundCloud Music Uploads</h2>

<div class="trackIconContainer">
<?php  
foreach ($userNames as $userName) {
	$trackArray= getTrackList($userName, $ID);
	getMultipleTracks($trackArray, 100, array("Orbatak", "L Nix", "Dirty Tactix"));
}
?>
 </div>


	<div class="push"></div>
</div>


<?php include(ROOT_PATH."inc/footer.php"); ?>