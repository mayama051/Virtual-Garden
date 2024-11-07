<div class="loginBody">

	<div class="login">
		<div id="banner-login">
			<img id="loginPic" src= "<?php echo base_url(); ?>/application/image/loginPic.png" alt="A woman planting a tree">
			<h5>Welcome back to <br> your garden</h5>
		</div>
		
		<div id="formDiv">
			<?php echo form_open(base_url().'Login/check_login'); ?>
				<h1 class="">Log in</h1>       
				
				<input type="text" placeholder="Username" required="required" name="username">
				
				<input type="password" placeholder="Password" required="required" name="password">
				
				<button type="submit" class="sub">Login</button>
						
			<?php echo form_close(); ?>
			<?php echo $message ?>

			<hr>

			<div id="accountCreate">
				<p>Do not have an account?</p>
				<button onclick="location.href='<?php echo base_url(); ?>register'" class="btn2Rigister">Create an account</button>
			</div>

		</div>
	</div>		
</div>
