<div class="container"> 
	<form class="form-horizontal" action="<?php echo site_url();?>auth/forgot_password" method="post" role="form" id="forgot_form">
		
		<h3>Forgot Password</h3>
		<hr />
		
		
				
		<div class="form-group">
			<label for="username" class="col-sm-3 control-label"></label>
			<div class="col-sm-5">
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
				
	
				<?php 
					if(!empty($msg))
					{
						?>
						<div class="alert alert-danger">  
						  <a class="close" data-dismiss="alert">x</a>  
						  <strong>Warning! </strong> <?php echo $msg;?>  
						</div>
						<?php 
					}
				?>
	
			</div>
		  </div>
		  
		
		  <div class="form-group">
			<label for="username" class="col-sm-3 control-label">Email</label>
			<div class="col-sm-4">
			  <input type="email" name="email" id="email" class="form-control required"  placeholder="Email">
			</div>
		  </div>
		  
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-10">
			  <button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div>
	
		
	
		<input type="hidden" name="forgot_password" id="forgot_password" value="forgot_password" />
	
	</form>
</div>

<script language="javascript">
	$(document).ready(function() {
		$("#forgot_form").validate();
 	});

</script>