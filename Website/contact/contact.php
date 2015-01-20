<?php 

	// Includes the Configuration file with  Constants  ROOT_PATH and BASE_URL 
	// which point to the servers root path and the website root directory, 
	require_once("../inc/config.php");

	$pageTitle = "Contact Orbatak";
	$section = "contact";
	include(ROOT_PATH . "inc/mailer.html.php");
	include(ROOT_PATH . "inc/header.php");
	
?>
	<h2  class="branding-title" align="center"> <?php echo $pageTitle; ?> </h2>
			<div class = "wrapper">
				<div class="emailForm">
				<?php if (isset($_GET["status"]) AND $_GET["status"]=="thanks"){ ?>
				
					<p align ="center">Thanks for the email, I'll be in touch promptly</p>
				
				<?php } else { ?>
					
					<?php 
					if (isset($errorMsg)){ 
						echo '<p class="error-message">'.$errorMsg.'</p>';
					}
					else {
						echo '<h3>We&rsquo;d love to hear from you!</h3>';
					}
					?>
					<form method ="post" action="<?php echo BASE_URL.'contact/'; ?>">
						
						<table>
							<tr>
								<th>
									<label for="name">Name</label>
								</th>
								<td>
									<input type="text" name="name" id="name" value=
										<?php if(isset($name)) {echo htmlspecialchars($name);} ?> >
								</td>
							</tr>
							<tr>
								<th>
									<label for="email">Email</label>
								</th>
								<td>
									<input type="text" name="email" id="email" value=
										<?php if(isset($email)) {echo htmlspecialchars($email);} ?>>
								</td>
							</tr>
							<tr>
								<th>
									<label for="message">Message</label>
								</th>
								<td>
									<textarea name="message" id="message" rows=3 
										><?php if(isset($message)) {echo htmlspecialchars($message);} ?></textarea> 
										
								</td>
							</tr>
							<tr style="display: none">
								<th>
									<label for="address">Address</label>
								</th>
								<td>
									<textarea name="address" id="address" rows=3 ></textarea>
									<p>Humans, please don't fill out this form, spam bots, please sign up here</p>
								</td>
							</tr>
						</table>
						
						<input type="submit" value="Send">
					</form>
				
				<?php } ?>
				</div>
			</div>

<?php
	include(ROOT_PATH."inc/footer.php"); 
	
?>