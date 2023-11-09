
<div class="container">	
	<div class="row">
        <div class="col-md-6 m-auto mb-md-4 mb-2">
            <form action="<?= site_url();?>profile/edit" method="POST" enctype="multipart/form-data" id="registration">

            	<div class="form-group pt-3">
            		<h1>Edit Profile </h1>
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
                    <input type="text" name="name" class="form-control" id="yourName" required value="<?php echo $man_info->name; ?>">
                </div>

                <!-- Your Name -->
                <div class="form-group">
                    <label for="yourName">Your Email </label>
                    <input readonly="readonly" type="text" name="" class="form-control" id="email" required value="<?php echo $man_info->email; ?>">
                </div>

                <!-- Your age -->
                <div class="form-group">
                    <label for="password"> <span class='error'>New Password</span></label>
                    <input type="password" name="pasword" class="form-control" id="pasword" value="">
                </div>

                <!-- Your age -->
                <div class="form-group">
                    <label for="yourAge"> Your Age </label>
                    <input type="number" name="age" class="form-control" id="yourAge" required value="<?php echo $man_info->age; ?>">
                </div>

                <!-- Nationality -->
                <div class="form-group">
                    <label for="yourNationality"> Nationality </label>
                    <input type="text" name="nationality" class="form-control" id="yourNationality" required value="<?php echo $man_info->nationality; ?>">
                </div>

                <!-- School -->
                <div class="form-group">
                    <label for="yourSchool"> School </label>
                    <input type="text" name="school" class="form-control" id="yourSchool" required value="<?php echo $man_info->school; ?>">
                </div>



                <!-- Experience -->

                <div class="form-group">
                    <?php 
                        $experienceArr = explode(",", $man_info->experience);
                        $experienceArr = array_map('trim', $experienceArr); 
                    ?>
                    <label for="yourExperience"> Experience</label>
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name='experience[]' 
                            value="Agriculture" 
                            id="agriculture" 
                            required
                            <?php
                                if(in_array('Agriculture', $experienceArr)) echo 'checked';
                            ?> 
                        >

                        <label class="form-check-label" for="agriculture"> Agriculture </label>
                    </div>

                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name='experience[]' 
                            value="Live Stock" 
                            id="LiveStockEx" 
                            <?php
                                if(in_array('Live Stock', $experienceArr)) echo 'checked';
                            ?>
                        >

                        <label class="form-check-label" for="LiveStockEx"> Live stock </label>

                    </div>

                </div>



                <!-- English -->
                <div class="form-group">
                    <label for="yourEnglish"> English </label>
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name='english' 
                            value="yes" 
                            id="yes"
                            <?php
                                if($man_info->english == 'yes') echo 'checked';
                            ?>
                            
                        >
                        <label class="form-check-label" for="yes"> Yes </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name='english' 
                            value="no" 
                            id="no"
                            <?php
                                if($man_info->english == 'no') echo 'checked';
                            ?>
                        >
                        <label class="form-check-label" for="no"> No </label>
                    </div>
                </div>



                <!-- English -->

                <div class="form-group">
                    <label for="yourEnglish"> Gender </label>
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name='gender' 
                            value="male" 
                            id="male" 
                            required
                            <?php
                                if($man_info->gender == 'male') echo 'checked';
                            ?>
                        >
                        <label class="form-check-label" for="male"> Male </label>
                    </div>


                    <div class="form-check form-check">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name='gender' 
                            value="female" 
                            id="female" 
                            <?php
                                if($man_info->gender == 'female') echo 'checked';
                            ?>
                        >
                        <label class="form-check-label" for="female"> Female </label>
                    </div>



                    <div class="form-check form-check-inline">
                        <input 
                            class="form-check-input" 
                            type="radio" 
                            name='gender' 
                            value="third" 
                            id="third"
                            <?php
                                if($man_info->gender == 'third') echo 'checked';
                            ?>
                        >
                        <label class="form-check-label" for="third"> Third </label>
                    </div>
                </div>





                <!-- Candidate to -->

                <div class="form-group">
                    <?php 
                        $candidateArr = explode(",", $man_info->candidate_to);
                        $candidateArr = array_map('trim', $candidateArr); 
                    ?>
                    <label for="yourEnglish"> Candidate To </label>
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name='candidate_to[]' 
                            value="Agriculture" 
                            id="agriculture" 
                            required
                            <?php
                                if(in_array('Agriculture', $candidateArr)) echo 'checked';
                            ?>
                        >

                        <label class="form-check-label" for="agriculture"> Agriculture </label>
                    </div>


                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name='candidate_to[]'  
                            value="liveStock" 
                            id="LiveStock"
                            <?php
                                if(in_array('liveStock', $candidateArr)) echo 'checked';
                            ?>
                        >

                        <label class="form-check-label" for="LiveStock"> Live stock </label>
                    </div>


                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name='candidate_to[]'  
                            value="tourism" 
                            id="tourism"
                            <?php
                                if(in_array('tourism', $candidateArr)) echo 'checked';
                            ?>
                        >

                        <label class="form-check-label" for="tourism"> Tourism </label>
                    </div>



                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name='candidate_to[]'  
                            value="restaurant" 
                            id="restaurant"
                            <?php
                                if(in_array('restaurant', $candidateArr)) echo 'checked';
                            ?>
                        >

                        <label class="form-check-label" for="restaurant"> Restaurant </label>
                    </div>



                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name='candidate_to[]'  
                            value="cleaner" 
                            id="cleaner"
                            <?php
                                if(in_array('cleaner', $candidateArr)) echo 'checked';
                            ?>
                        >

                        <label class="form-check-label" for="cleaner"> Cleaner </label>
                    </div>



                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name='candidate_to[]' 
                            value="other" 
                            id="other"
                            <?php
                                if(in_array('other', $candidateArr)) echo 'checked';
                            ?>
                        >

                        <label class="form-check-label" for="other"> Other </label>
                    </div>
                </div>





                <!-- School -->

                <div class="form-group">
                    <label for="yourDescription"> Description </label>
                    <textarea class="form-control" id="yourDescription" name="description" rows="4" cols="50"><?php echo $man_info->description; ?></textarea>
                </div>

                <!-- Upload Your Photos -->

                <div class="form-group">
                    <label for="uploadYourPhotos"> Upload Your Photos (Five Photos) </label>
                    <input type="file" name='photo' class="form-control-file" id="uploadYourPhotos">
                    <img class="mt-1" height="100px" src="<?= base_url(); ?><?= $man_info->photo?>">
                    <input type="hidden" name="pre_photo" value="<?= $man_info->photo ?>">
                </div>

                <?php $photoNum = 1; ?>

                <?php if($man_info->photo2): $photoNum = $photoNum +1; ?>
                    <div class="form-group">
                        <input type="file" name='photo2' class="form-control-file" id="">
                        <img class="mt-1" height="100px" src="<?= base_url(); ?><?= $man_info->photo2?>">
                        <input type="hidden" name="pre_photo2" value="<?= $man_info->photo2 ?>">
                    </div>
                <?php endif; ?>

                <?php if($man_info->photo3): $photoNum = $photoNum +1; ?>
                    <div class="form-group">
                        <input type="file" name='photo3' class="form-control-file" id="">
                        <img class="mt-1" height="100px" src="<?= base_url(); ?><?= $man_info->photo3?>">
                        <input type="hidden" name="pre_photo3" value="<?= $man_info->photo3 ?>">
                    </div>
                <?php endif; ?>

                <?php if($man_info->photo4): $photoNum = $photoNum +1; ?>
                    <div class="form-group">
                        <input type="file" name='photo2' class="form-control-file" id="">
                        <img class="mt-1" height="100px" src="<?= base_url(); ?><?= $man_info->photo4?>">
                        <input type="hidden" name="pre_photo4" value="<?= $man_info->photo4 ?>">
                    </div>
                <?php endif; ?>

                <?php if($man_info->photo5): $photoNum = $photoNum +1; ?>
                    <div class="form-group">
                        <input type="file" name='photo5' class="form-control-file" id="">
                        <img class="mt-1" height="100px" src="<?= base_url(); ?><?= $man_info->photo5?>">
                        <input type="hidden" name="pre_photo5" value="<?= $man_info->photo5 ?>">
                    </div>
                <?php endif; ?>

                <div id="morePhotoArea">
                	
                </div>

                <div class="form-group">
                    <button type="button" name="morePhoto" class="btn btn-success morePhoto"> More Photo </button>
                </div>

                <input type="hidden" class="photoNum" name="photoNum" value="<?=$photoNum?>">
                <input type="hidden" class="manPowerId" name="manPowerId" value="<?=$man_info->id?>">
                <input type="hidden" class="email" name="email" value="<?=$man_info->email?>">
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