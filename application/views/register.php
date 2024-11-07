<div class="signupBody">
	<div class="signup">
		<div id="banner-signup">
			<img id="signupPic" src= "<?php echo base_url(); ?>/application/image/signupPic.png" alt="Food waste cycling">
			<h5>Get ready to thrive <br> your garden?</h5>
		</div>
		
		<div id="formDiv-signup">
		
			<?php echo form_open(base_url().'register/do_register'); ?>
			
				<h1 class="text-center">Sign up</h1>       
					
				<input type="text" class="" placeholder="Username" required="required" name="username">
				
				<input type="text" class="" placeholder="Email" required="required" name="email">

				<input type="password" class="" placeholder="Password" required="required" name="password">
				
				<button type="submit" class="" style="margin-bottom:1.5vh;">Sign up</button>
						
			<?php echo form_close(); ?>
			<?php echo $message ?>

			<hr>

			<div id="haveAccount">
				<p>Already have an account?</p>
				<button onclick="location.href='<?php echo base_url(); ?>login'" id="btn2login">Log In Here</button>
				<a id="testBtn" href="<?php echo base_url(); ?>choosebg/test">Test</a>
			</div>

			

		</div>
	</div>
</div>

