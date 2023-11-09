<form class="form-horizontal" id="add_form" action="<?php echo site_url();?>admin/site_configs/article_config/" method="post" enctype="multipart/form-data">  

		<h2 class="pt-5 pb-2">Article Edit Form</h2>

		
		<div class="mb-3 row">
			<label for="about_company" class="col-sm-2 col-form-label text-end">About Company</label>
			<div class="col-sm-7">
			  <textarea class="form-control" name="about_company" rows="4"><?php echo $site_config->about_company; ?></textarea>
			</div>
		</div>

		

		<div class="mb-3 row">
			<label for="address" class="col-sm-2 col-form-label text-end">Address</label>
			<div class="col-sm-7">
			  <textarea class="form-control" name="address" id="address" rows="4"><?php echo $site_config->address; ?></textarea>
			</div>
		</div>
		
		



		<div class="mb-3 row">
			<label for="" class="col-sm-2 col-form-label text-end"></label>
			<div class="col-sm-5">
			  	<input type="hidden" name="article_edit" value="article_edit" />
			  	<input type="hidden" name="id" value="<?php echo $site_config->id; ?>" />
				<button type="submit" class="btn btn-primary">Update</button> 
				<button class="btn btn-danger" onclick="history.back()" type="button">Cancel</button>
			</div>
		</div>
		
          

		  
		<div style="clear:both; height:15px;"></div>
    



</form>  


