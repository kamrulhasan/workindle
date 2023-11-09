
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

<link href="<?php echo base_url();?>assets/css/auth.css" media="all" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url();?>assets/css/font-awesome.css" media="all" rel="stylesheet" type="text/css"/>



<div id="wrapper">

	<div class="container">

		<div class="row">

			<div class="col-md-4 offset-md-4">

				<div class="login-window login-form bg-light my-5 p-4 ">

					<div id="header">

						<h1>Login</h1>

					</div>

					

					

					<div class="form-group">
							 		<?php
										if($this->session->flashdata('error_message'))
										{
										?>
											<div class="alert alert-danger"> 
											  <a class="close" data-dismiss="alert">x</a> 
											  <strong>Warning!</strong><?php echo $this->session->flashdata('error_message');?>  
											</div> 
										<?php
										}
										?>

							 </div>



					<div class="left10">



						

							

							<form action="<?php echo site_url(); ?>auth/login" method="post" enctype="multipart/form-data" id="add_form">
							 
							 <div class="form-group error">
								<?php echo validation_errors(); ?>	
							  </div>
							  
							  
							  <div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control required" id="email" name="email" placeholder="Email">
							  </div>
							  
							  
							  <div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control required" id="password" name="password" placeholder="Password">
							  </div>

							<!--div class=logbtn>
								<a href="<?php //echo base_url();?>auth/forgot_password/" class="forgot">Forgot your password?</a>
							</div -->

							<div class="logbtn logbtn_margin">
								<input type="hidden" name="user_login" value="user_login"  />
								<button type="submit" id="loginBtn" class="btn btn-primary">Login</button>
							</div>

						</form>

					</div>

					

					<!-- > Button -->

					<div style="clear:both;"></div>

					<div style="margin:0 0 0 -2px;padding:0;">

						 Don't have an account? <a href="<?php echo base_url();?>registration/">Register</a> for free!

					</div>

				</div>



		    



			</div>

		</div>

	</div>

</div>

