<form class="form-horizontal" id="add_form" action="<?php echo site_url();?>admin/testimonials/edit/<?php echo $testimonial->id; ?>" method="post" enctype="multipart/form-data">  

		<h2 class="pt-5 pb-2">Edit Form</h2>
		
		<div class="mb-3 row">
			<label for="name" class="col-sm-2 col-form-label text-end">Name</label>
			<div class="col-sm-5">
			  <input type="text" class="form-control" name="name" id="name" value="<?php echo $testimonial->name; ?>">
			</div>
		</div>


		<div class="mb-3 row">
			<label for="testimonial" class="col-sm-2 col-form-label text-end">Testimonial</label>
			<div class="col-sm-5">
			  <textarea class="form-control" name="testimonial" id="testimonial" rows="4"><?php echo $testimonial->testimonial; ?></textarea>
			</div>
		</div> 

		<div class="mb-3 row">
			<label for="ratting" class="col-sm-2 col-form-label text-end">Ratting</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" name="ratting" id="ratting" value="<?php echo $testimonial->ratting; ?>">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="country" class="col-sm-2 col-form-label text-end">Country</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" name="country" id="country" value="<?php echo $testimonial->country; ?>">
			</div>
		</div>
		



		<div class="mb-3 row">
			<label for="" class="col-sm-2 col-form-label text-end"></label>
			<div class="col-sm-5">
			  <input type="hidden" name="edit" value="edit" />
				<button type="submit" class="btn btn-primary">Update</button> 
				<button class="btn btn-danger" onclick="history.back()" type="button">Cancel</button>
			</div>
		</div>
		
          

		  
		<div style="clear:both; height:15px;"></div>
    



</form>  


