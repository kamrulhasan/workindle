

<div class="container">	
	<div class="row">
        <div class="col-md-6 m-auto mb-md-4 mb-2">
            <form action="<?= site_url();?>registration/index" method="POST" enctype="multipart/form-data" id="registration">

            	<div class="form-group pt-3">
            		<h1>REGISTRATION </h1>
            		<?php if ($this->session->flashdata('success_message')) { ?>
						<div class="alert alert-success">
						  <a class="close" data-dismiss="alert">x</a>
						  <strong>Success!</strong><?php echo $this->session->flashdata('success_message');?>
						</div>
					<?php } ?>
            	</div>

                <div class="form-group">
                     <label for="inputInfo" class="col-xs-12 col-sm-3  control-label no-padding-right"></label>
                    <div class="">
                        <span class="block input-icon input-icon-right" style="color:#FF0000;">
                            <?php echo validation_errors(); ?>
                        </span>
                    </div>
                </div> 

                <!-- Your Name -->
                <div class="form-group">
                    <label for="yourName"> Your Name </label>
                    <input type="text" name="name" class="form-control" id="yourName" required>
                </div>

                <!-- Your Name -->
                <div class="form-group">
                    <label for="yourName">Your Email </label>
                    <input type="text" name="email" class="form-control" id="email" required>
                </div>



                <!-- Your age -->
                <div class="form-group">
                    <label for="yourAge"> Your Age </label>
                    <input type="number" name="age" class="form-control" id="yourAge" required>
                </div>

                <!-- Nationality -->
                <div class="form-group">
                    <label for="yourNationality"> Nationality </label>
                    <input type="text" name="nationality" class="form-control" id="yourNationality" required>
                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select Cateory</option>
                        <?php
                        if($categories){
                            foreach($categories as $category){
                                ?>
                                <option value="<?=$category->id;?>"><?=$category->name;?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>                
                </div>

                

                <!-- English -->
                <div class="form-group">
                    <label for="yourEnglish"> English </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name='english' value="yes" id="yes" checked>
                        <label class="form-check-label" for="yes"> Yes </label>
                    </div>



                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name='english' value="no" id="no">
                        <label class="form-check-label" for="no"> No </label>
                    </div>

                </div>



                <!-- English -->

                <div class="form-group">
                    <label for="yourEnglish"> Gender </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name='gender' value="male" id="male" required>
                        <label class="form-check-label" for="male"> Male </label>

                    </div>


                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name='gender' value="female" id="female" required>
                        <label class="form-check-label" for="female"> Female </label>

                    </div>



                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name='gender' value="third" id="third">
                        <label class="form-check-label" for="third"> Third </label>
                    </div>
                </div>





                




                <!-- Description -->

                <div class="form-group">
                    <label for="yourDescription"> Description </label>

                    <textarea class="form-control" id="yourDescription" name="description" rows="4" cols="50"> </textarea>

                </div>

                
                <div class="form-group">
                    <label for="video_link"> Video Link </label>
                    <input type="url" name="video_link" class="form-control" id="video_link" required>
                    <small class="error">From: https://www.tiktok.com/@giobaba_com</small>
                </div>





                <!-- Upload Your Photos -->

                <div class="form-group">

                    <label for="uploadYourPhotos"> Upload Your Photo </label>

                    <input type="file" name='photo' class="form-control-file" id="uploadYourPhotos" required2>
                    <small class="error">Image should be 500x350 px</small>

                </div>                

                <input type="hidden" class="photoNum" name="photoNum" value="1">
                <input type="hidden" name="cate_name" value="">
                <input type="submit" name="regiSubmitBtn" class="btn btn-primary" value="Submit">

        </div>
    </form>

</div>
</div>

<script language="javascript">
	jQuery(document).ready(function () {
		jQuery('#registration').validate({
			rules: {
					email: {
					  required: true,
					  email: true
					}
				}
		});        

		$(".morePhoto").click(function(){
		    photoNum = parseInt($('.photoNum').val());
		    photoNum = photoNum + 1;
		    $('.photoNum').val(photoNum);
		    if(photoNum > 5) {
		    	return false;
		    }

		    photo = '<div class="form-group">';
		    photo += '<input type="file" name="photo'+ photoNum +'" class="form-control-file" >';
		    photo += '</div>';

		    $("#morePhotoArea").append(photo);
		    if(photoNum > 4) {
		    	$(".morePhoto").remove();
		    }
		  });

	}); // end document.ready
</script>

