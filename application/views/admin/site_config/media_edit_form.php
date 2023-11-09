<form class="form-horizontal" id="add_form" action="<?php echo site_url();?>admin/site_configs/media/" method="post" enctype="multipart/form-data">  

		<h2 class="pt-5 pb-2">Media Edit Form</h2>

		
		<div class="mb-3 row">
			<label for="facebook" class="col-sm-2 col-form-label text-end">Facebook</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $site_config->facebook; ?>">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="twitter" class="col-sm-2 col-form-label text-end">Twitter</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $site_config->twitter; ?>">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="linkedin" class="col-sm-2 col-form-label text-end">Linkedin</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?php echo $site_config->linkedin; ?>">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="pinterest" class="col-sm-2 col-form-label text-end">Pinterest</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="pinterest" id="pinterest" value="<?php echo $site_config->pinterest; ?>">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="phone" class="col-sm-2 col-form-label text-end">Phone</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $site_config->phone; ?>">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="email" class="col-sm-2 col-form-label text-end">Email</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="email" id="email" value="<?php echo $site_config->email; ?>">
			</div>
		</div>
		

		<div class="mb-3 row">
			<label for="skype" class="col-sm-2 col-form-label text-end">skype</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="skype" id="skype" value="<?php echo $site_config->skype; ?>">
			</div>
		</div>
		

		
		



		<div class="mb-3 row">
			<label for="" class="col-sm-2 col-form-label text-end"></label>
			<div class="col-sm-5">
			  	<input type="hidden" name="media_edit" value="media_edit" />
			  	<input type="hidden" name="id" value="<?php echo $site_config->id; ?>" />
				<button type="submit" class="btn btn-primary">Update</button> 
				<button class="btn btn-danger" onclick="history.back()" type="button">Cancel</button>
			</div>
		</div>
		
          

		  
		<div style="clear:both; height:15px;"></div>
    



</form>  


