<form class="form-horizontal" id="add_form" action="<?php echo site_url();?>admin/site_configs/edit/" method="post" enctype="multipart/form-data">  

		<h2 class="pt-5 pb-2">Edit Form</h2>

		
		<div class="mb-3 row">
			<label for="site_name" class="col-sm-2 col-form-label text-end">Site Name</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="site_name" id="site_name" value="<?php echo $site_config->site_name; ?>">
			</div>
		</div>
		
		<div class="mb-3 row">
			<label for="site_title" class="col-sm-2 col-form-label text-end">Site Title</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="site_title" id="site_title" value="<?php echo $site_config->site_title; ?>">
			</div>
		</div> 

		<div class="mb-3 row">
			<label for="speach" class="col-sm-2 col-form-label text-end">Home Tiktok Url</label>
			<div class="col-sm-7">
			  <input type="text" class="form-control" name="speach" id="speach" value="<?php echo $site_config->speach; ?>">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="meta_key" class="col-sm-2 col-form-label text-end">Meta Key</label>
			<div class="col-sm-7">
			  <textarea class="form-control" name="meta_key" id="meta_key" rows="4"><?php echo $site_config->meta_key; ?></textarea>
			</div>
		</div>

		<div class="mb-3 row">
			<label for="meta_des" class="col-sm-2 col-form-label text-end">Meta Description</label>
			<div class="col-sm-7">
			  <textarea class="form-control" name="meta_des" id="meta_des" rows="4"><?php echo $site_config->meta_des; ?></textarea>
			</div>
		</div>

			

		<div class="mb-3 row">
			<label for="logo" class="col-sm-2 col-form-label text-end">Logo</label>
			<div class="col-sm-7">
			  <input type="file" name="logo" class="logo">
			  <?php if($site_config->logo) { ?>	
					<img src="<?php echo base_url(); ?>assets/img/logo/<?php echo $site_config->logo; ?>" style="height:100px;" />	
					<input type="hidden" name="pre_logo_path" value="assets/img/logo/<?php echo $site_config->logo; ?>" />
				<?php } ?>
			</div>
		</div>

		<div class="mb-3 row">
			<label for="favicon" class="col-sm-2 col-form-label text-end">Favicon</label>
			<div class="col-sm-7">
			  <input type="file" name="favicon" class="favicon">
			  <?php if($site_config->favicon) { ?>	
					<img src="<?php echo base_url(); ?>assets/img/logo/<?php echo $site_config->favicon; ?>" style="height:100px;" />	
					<input type="hidden" name="pre_favicon_path" value="assets/img/logo/<?php echo $site_config->favicon; ?>" />
				<?php } ?>
			</div>
		</div>

		
		



		<div class="mb-3 row">
			<label for="" class="col-sm-2 col-form-label text-end"></label>
			<div class="col-sm-5">
			  	<input type="hidden" name="edit" value="edit" />
			  	<input type="hidden" name="id" value="<?php echo $site_config->id; ?>" />
				<button type="submit" class="btn btn-primary">Update</button> 
				<button class="btn btn-danger" onclick="history.back()" type="button">Cancel</button>
			</div>
		</div>
		
          

		  
		<div style="clear:both; height:15px;"></div>
    



</form>  


