<form class="form-horizontal" id="add_form" action="<?php echo site_url();?>admin/auth/edit_profile/" method="post" enctype="multipart/form-data">  
			
		 <div class="form-group">	
		 	<label class="col-xs-12 col-sm-3">&nbsp;</label>
			<div class="col-xs-12 col-sm-5">
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
		 </div>
			
		  <div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3  control-label no-padding-right">First Name</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">
					<input type="text" class="form-control required" id="first_name" name="first_name" value="<?php echo $profile_info->first_name;?>">					
				</span>
			</div>				

		</div>

		

		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3  control-label no-padding-right">Last Name</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">
					<input type="text" class="form-control required" id="last_name" name="last_name" value="<?php echo $profile_info->last_name;?>">				
				</span>
			</div>			
		</div>
		


		
		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Username</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">					
					<input type="text" class="form-control required" id="email" name="email" value="<?php echo $profile_info->email; ?>">			
				</span>
			</div>			
		</div>

		

		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3 control-label no-padding-right">Password</label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right">				
					<input type="password" class="form-control" id="password" name="password" value="">				
				</span>
			</div>				
		</div>
		

		
		
		

		

          <div class="col-md-offset-3 col-sm-offset-3">
				<input type="hidden" name="edit_profile" value="edit_profile" />
				<button type="submit" class="btn btn-primary">Update</button> 
				<button class="btn btn-danger" onclick="history.back()" type="button">Cancel</button>  
          </div> 		



</form>  




<script language="javascript">
jQuery(document).ready(function () {
	jQuery('#add_form').validate();
}); // end document.ready

</script>