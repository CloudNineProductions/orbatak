<?php 
require_once("../inc/config.php");

$pageTitle = "About Orbatak";
$section = "about";

include(ROOT_PATH."inc/header.php");
?>


<div class="wrapper">
		<h2><?php echo $pageTitle; ?></h2>
		<?php include(ROOT_PATH."inc/aboutBio.html.php"); ?>
			
		<div class="push"></div>	
	</div>

<?php include(ROOT_PATH."inc/footer.php"); ?>