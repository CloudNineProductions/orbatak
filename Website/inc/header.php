<!DOCTYPE html>

<?php require_once("config.php"); ?>

<html>
	<head>
		<title> <?php echo $pageTitle ?></title>
	
		<meta property="og:image" content="http://orbatak.com/img/art3.jpg" >
		<meta property="og:description" content="Canadian dubstep duo, Orbatak, consists of long time Jungle and D&B DJ/Producers, Dirty Tactix and L-Nix." >
		<meta name="viewport" content="width=device-width">
		<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/style1.css">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/style_media_query.css">
	</head>

	<body>
		<div id="container">
			<div class="header" > 
				<a href="<?php echo BASE_URL; ?>">
					<image class="banner-img" src="<?php echo BASE_URL; ?>
						img/banner-logo.png" alt="Metalic letters spelling Orbatak"></image>
				</a>
				<div class="nav">
					<a class="music<?php if ($section == "music"){echo "On";} ?>" href="<?php echo BASE_URL; ?>music/">Music</a>
					<a class="about<?php if ($section == "about"){echo "On";} ?>" href="<?php echo BASE_URL; ?>about/">About</a>
					<a class="contact<?php if ($section == "contact"){echo "On";} ?>" href="<?php echo BASE_URL; ?>contact/">Contact</a>
					<p></p>
				</div>
			</div>
				
			<div id="content">