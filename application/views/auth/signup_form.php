<div class="container help_area"> 
	<form  method="post" action="<?php echo site_url();?>auth/signup/" class="form-horizontal" id="signup_form">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3"></label>
			<div class="col-xs-12 col-sm-5">
				<h2>Signup Form</h2>				
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3"></label>
			<div class="col-xs-12 col-sm-5 error">
				<?php echo validation_errors(); ?>					
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3  control-label no-padding-right">First Name</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">
					<input type="text" class="form-control required" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>">					
				</span>
			</div>				
		</div>
		
		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3  control-label no-padding-right">Last Name</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">
					<input type="text" class="form-control required" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>">					
				</span>
			</div>				
		</div>
		
		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3  control-label no-padding-right">Username</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">
					<input type="text" class="form-control required" id="username" name="username" value="<?php echo set_value('username'); ?>">					
				</span>
			</div>				
		</div>
		
		
		
		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Email</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">
					<input type="text" class="form-control required" id="email" name="email" value="<?php echo set_value('email'); ?>">					
				</span>
			</div>				
		</div>
		
		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3  control-label no-padding-right">Address</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">
					<textarea name="address" class="form-control" rows="5"><?php echo set_value('address'); ?></textarea>					
				</span>
			</div>				
		</div>
		
		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Password</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">				
					<input type="password" class="form-control required" id="password" name="password" value="">				
				</span>
			</div>				
		</div>

		

		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Confirm Password</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">					
					<input type="password" class="form-control required" id="confirm_password" name="confirm_password" value="">				
				</span>
			</div>				
		</div>
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3"></label>
			<div class="col-xs-12 col-sm-5">
				<input type="hidden" name="signup" value="signup"  />
				<input type="submit" name="submit" class="btn btn-primary" value="Signup" />
			</div>
		</div>

	</form>	

</div> <!--End container-->


<script language="javascript">
	jQuery(document).ready(function () {
		jQuery('#signup_form').validate({
				rules: {
					confirm_password: {
					  equalTo: "#password"
					},
					email: {
					  required: true,
					  email: true
					}

				  }
	
		});
	}); // end document.ready
</script>
