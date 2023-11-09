

<div class="container">
    <div class="form-group pt-3">
        <h1>Profile</h1>
        <div class="text-right">
            <a class="btn btn-primary" href="<?=site_url()?>profile/edit">Edit profile</a>
        </div>
    </div>

    <div class="row mb-md-4 mb-2">
        <?php  include(APPPATH . "views/get/slider_part.php") ?>

        <div class="col-md-6">

            <ul>

                <li class="border-bottom border-secondary pb-2 mb-2"> ID : <?= $man_info->id;?> </li>

                <li class="border-bottom border-secondary pb-2 mb-2"> Name : <?= $man_info->name;?> </li>

                <li class="border-bottom border-secondary pb-2 mb-2"> Nationality : <?= $man_info->nationality;?> </li>

                <li class="border-bottom border-secondary pb-2 mb-2"> School : <?= $man_info->school;?> </li>


                <ul class="workList d-flex flex-wrap mb-0 border-bottom border-secondary pb-2 mb-2">

                    <?php

                        $candidates = explode(",",$man_info->candidate_to);

                        foreach($candidates as $candidate){

                        ?>

                        <li> 

                            <a href="?experience=<?= trim($candidate)?>"> <?= $candidate?> </a> 

                        </li>

                        <?php

                        }

                        

                    ?>

                </ul>



                <li class="border-bottom border-secondary pb-2 mb-2"> English : Yes </li>



                <li class="pb-2 mb-2"> Candidates </li>

                <ul class="workList d-flex flex-wrap mb-0 border-bottom border-secondary pb-2 mb-2">

                    <?php

                        $candidates = explode(",",$man_info->candidate_to);

                        foreach($candidates as $candidate){

                        ?>

                        <li> 

                            <a href="?experience=<?= trim($candidate)?>"> <?= $candidate?> </a> 

                        </li>

                        <?php

                        }

                        

                    ?>

                </ul>





            </ul>

        </div>

    </div>



    <div class="row mb-4 border-bottom border-secondary pb-3">

        <div class="col-md-6">

            <h3> Live in the Country site : Yes </h3>

        </div>

        <div class="col-md-6">

            <h3> RANGKIGNS </h3>
            <div class="stars">
                <?php $ratting = $man_info->ratting; ?>
                <span 
                    class="fa fa-star <?php if($ratting >=1) echo 'checked'; ?>"
                ></span>

                <span 
                    class="fa fa-star <?php if($ratting >=2) echo 'checked'; ?>"
                ></span>

                <span 
                    class="fa fa-star <?php if($ratting >=3) echo 'checked'; ?>"
                ></span>
                <span 
                    class="fa fa-star <?php if($ratting >=4) echo 'checked'; ?>"
                ></span>

                <span 
                    class="fa fa-star <?php if($ratting >=5) echo 'checked'; ?>"
                    
                ></span>
            </div>           

        </div>

    </div>





    <div class="row">

        <div class="col-md-12 pl-0">

            <h3> Discription </h3>

            <p class="border border-secondary p-2">

            <?= $man_info->description;?>

            </p>

        </div>

    </div>

</div>

<script language="javascript">
    jQuery(document).ready(function () {
        jQuery('#contactForm').validate({
            rules: {
                    email: {
                      required: true,
                      email: true
                    }
                }
        });

    }); // end document.ready
</script>

<style type="text/css">
    .checked {
  color: orange;
}
</style>