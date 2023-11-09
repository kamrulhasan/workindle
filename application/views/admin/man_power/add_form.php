<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5-stable/tinymce.min.js"></script>

<form class="form-horizontal" id="add_form" action="<?php echo site_url();?>admin/testimonials/add" method="post" enctype="multipart/form-data">
		
		<div class="form-group">
			<label for="inputInfo" class="col-xs-12 col-sm-3  control-label no-padding-right"></label>
			<div class="col-xs-12 col-sm-5">
				<span class="block input-icon input-icon-right" style="color:#FF0000;">
					<?php echo validation_errors(); ?>
				</span>
			</div>
		</div> 

		<h2 class="pt-5 pb-2">Add Form</h2>
		<div class="mb-3 row">
			<label for="name" class="col-sm-2 col-form-label text-end">Name</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" name="name" id="name" value="">
			</div>
		</div>


		<div class="mb-3 row">
			<label for="testimonial" class="col-sm-2 col-form-label text-end">Testimonial</label>
			<div class="col-sm-6">
			  <textarea class="form-control" name="testimonial" id="testimonial" rows="4"></textarea> 
			</div>
		</div>

		<div class="mb-3 row">
			<label for="ratting" class="col-sm-2 col-form-label text-end">Ratting</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" name="ratting" id="ratting" value="">
			</div>
		</div>

		<div class="mb-3 row">
			<label for="country" class="col-sm-2 col-form-label text-end">Country</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" name="country" id="country" value="">
			</div>
		</div>


		<div class="mb-3 row">
			<label for="" class="col-sm-2 col-form-label text-end"></label>
			<div class="col-sm-6">
			  <input type="hidden" name="add" value="add" />
				<button type="submit" class="btn btn-primary">Save </button> 
				<button class="btn btn-danger" onclick="history.back()" type="button">Cancel</button>
			</div>
		</div>
		
          

		  
		<div style="clear:both; height:15px;"></div>
    



</form>  
<script type="text/javascript">
	tinymce.init({
	  selector: '#description',
	  height: 300,
	  menubar: false,
	  plugins: [
	    'advlist autolink lists link image charmap print preview anchor',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime media table paste code help wordcount'
	  ],
	  toolbar: 'undo redo | formatselect | ' +
	  'bold italic backcolor | alignleft aligncenter ' +
	  'alignright alignjustify | bullist numlist outdent indent | ' +
	  'removeformat | help',
	  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
	});
</script>