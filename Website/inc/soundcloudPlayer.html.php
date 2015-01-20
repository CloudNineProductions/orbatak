
<?php

function getSoundcloudAudioPlayer ($trackID, $description, $autoPlay, $visual=false, $height=200) {

	echo '<div class="audioPlayer">';
	echo '<iframe width="100%" height="'.$height.'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=//api.soundcloud.com/tracks/'.$trackID.'&amp;auto_play='.$autoPlay.'&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual='.$visual.'&amp;theme_color=2F4F4F"></iframe>';
	echo '<p>'.$description.'</p></div>';
}

function getSoundcloudTrackIcon($track) {
	$trackArt="";
	if ($track['artwork_url'] == "") {
		$trackArt = BASE_URL."img/backupIcon.jpg";
	}
	else {

		$trackArt = $track['artwork_url'];
	}
	
	// Echos out the html structure of the track icon
	echo '<div onclick="location.href=\''.BASE_URL.'music/?id='.$track['id'].'\'" class="trackIcon">';
	echo '<a href="'.BASE_URL.'music/?id='.$track['id'].'" class="trackIconTitle">'.$track['title'].'</a>';
	echo '<img src="'.$trackArt.'" alt="'.$track['description'].'"></img>';
	echo '</div></a>';

}


