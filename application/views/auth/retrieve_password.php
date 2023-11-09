<div class="container"> 
	<h3>Change Password</h3>
	<hr />
	<form class="form-horizontal" action="<?php echo site_url();?>auth/retrieve_password/<?php echo $user_info->user_id; ?>/<?php echo $user_info->token; ?>" method="post" role="form" id="change_password">
		
		
		<div class="form-group">
			<label for="username" class="col-sm-3 control-label">&nbsp;</label>
			<div class="col-sm-4">
				<?php 	if($this->session->flashdata('success_message')){	?>
					<div class="alert alert-success">  
					  <a class="close" data-dismiss="alert">x</a>  
					  <strong>Success!</strong><?php echo $this->session->flashdata('success_message');?>  
					</div> 
				<?php } ?>
				
				<?php echo validation_errors('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button>', '</div>'); ?>
			</div>
		</div>
		  
		
		<div class="form-group">
			<label for="username" class="col-sm-3 control-label">Password</label>
			<div class="col-sm-4">
			  <input type="password" name="password" id="password" class="form-control required"  placeholder="Password">
			</div>
		  </div>
		  
		  
		<div class="form-group">
			<label for="password" class="col-sm-3 control-label">Confirm Password</label>
			<div class="col-sm-4">
			  <input type="password" name="confirm_password" id="confirm_password" class="form-control required"  placeholder="Confirm Password">
			</div>
		  </div>
	
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-10">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div>
		<input type="hidden" name="update" id="update" value="update" />
	
	</form>
</div>

<script language="javascript">
	$(document).ready(function() {
		$("#change_password").validate(
			{
				rules: {
					password: {
						required: true,
					},
					confirm_password: {
						required: true,
						equalTo: "#password"
					}
				}
			}
		);
 	});

</script>