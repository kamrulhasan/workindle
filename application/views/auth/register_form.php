

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>



<link href="<?php echo base_url();?>assets/css/auth.css" media="all" rel="stylesheet" type="text/css"/>



<link href="<?php echo base_url();?>assets/css/font-awesome.css" media="all" rel="stylesheet" type="text/css"/>







<div id="wrapper">



	<div class="slim container">



		<div class="row">



			<div class="box01">



				<div class="login-window">



					<div id="header">



						<h1>Register</h1>



					</div>







					<div class="left10">







						<form action="<?php echo site_url(); ?>auth/register" method="post" enctype="multipart/form-data" id="add_form">

							 <div class="form-group">

							 		<?php

										if($this->session->flashdata('success_message'))

										{

										?>

											<div class="alert alert-success"> 

											  <a class="close" data-dismiss="alert">x</a> 

											  <strong>Success!</strong><?php echo $this->session->flashdata('success_message');?>  

											</div> 

										<?php

										}

										?>



							 </div>

							 

							 <div class="form-group error">

								<?php echo validation_errors(); ?>	

							  </div>

							  

							  

							  <div class="form-group">

								<label>Email</label>

								<input type="email" class="form-control required" id="email" name="email" placeholder="Email">

							  </div>

							  

							  <div class="form-group">

								<label>First Name</label>

								<input type="text" class="form-control required" id="first_name " name="first_name" placeholder="First Name">

							  </div>

							  

							  <div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control required" id="last_name " name="last_name" placeholder="Last Name">
							  </div>
							  
							<div class="form-group">
								<label>Company</label>
								<input type="text" class="form-control" id="company" name="company" placeholder="Company Name">
							  </div>
							  

							  <div class="form-group">

								<label for="exampleInputPassword1">Password</label>

								<input type="password" class="form-control required" id="password" name="password" placeholder="Password">

							  </div>


							  

							  <div class="form-group text-center">

							  	<input type="hidden" name="signup" value="signup"  />

							  	<button type="submit" class="btn btn-primary">Submit</button>

							  </div>

						</form>



					</div>



					<div style="clear:both;"></div>



					<div style="margin:0 0 0 -2px;padding:0;">



						 Already have an account? <a href="<?php echo base_url();?>auth/login/">Login</a> 



					</div>







					



				</div>







		    







			</div>



		</div>



	</div>



</div>





<style type="text/css">



	label

	{

		margin-bottom:2px;

	}

	.error

	{

		color:#FF0000 !important;

	}



</style>





<script language="javascript">



	jQuery(document).ready(function () {

		jQuery('#add_form').validate();

	}); // end document.ready



</script>

