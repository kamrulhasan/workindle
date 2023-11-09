

<div class="container">
    <div class="form-group pt-3">
        <h1>Candidate Info</h1>
    </div>

    <div class="row mb-md-4 mb-2">
        <div class="col-md-6">
            <?php
            $videoId = get_video_id($man_info->video_link);
            if($videoId) { ?>
                <blockquote class="tiktok-embed" cite="<?=$man_info->video_link?>" data-video-id="<?=$videoId?>" data-embed-from="embed_page" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@emirabdulgani" href="https://www.tiktok.com/@emirabdulgani?refer=embed">@emirabdulgani</a> <p>Les</p> <a target="_blank" title="♬ sonido original - Emir Abdul Gani" href="https://www.tiktok.com/music/sonido-original-7281303192802216709?refer=embed">♬ sonido original - Emir Abdul Gani</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>
            <?php } ?>        
        </div>

        <div class="col-md-6">
            <ul>
                <li class="border-bottom border-secondary pb-2 mb-2"> ID : <?= $man_info->reg_id;?></li>
                <li class="border-bottom border-secondary pb-2 mb-2"> Name : <?= $man_info->name;?> </li>
                <li class="border-bottom border-secondary pb-2 mb-2"> Nationality : <?= $man_info->nationality;?> </li>
                <li class="border-bottom border-secondary pb-2 mb-2"> English : Yes </li>
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

        <div class="col-md-6 pl-0">

            <h3> Discription </h3>

            <p class="border border-secondary p-2">

            <?= $man_info->description;?>

            </p>

        </div>

        <div class="col-md-6 pr-0">
            <?php if($is_preview != "preview") { ?>
                <h3> Contact </h3>

                <!-- Your Name -->
                <?php
                    if($this->session->flashdata('success_message'))
                    {
                    ?>
                        <div class="alert alert-success" role="alert">  
                          <strong>Success!</strong><?php echo $this->session->flashdata('success_message');?> 
                        </div> 
                    <?php
                    }
                ?>  

            
                <div class="form-group">

                    <form action="<?= site_url();?>candidates/saveCompany" method="POST" id="contactForm">

                        <input type="text" name="company_name" class="form-control mb-3" id="companyName" placeholder="Company Name" required>

                        <input type="text" name="telephone" class="form-control mb-3" id="telephoneNumber" placeholder="Telephone Number" required>

                        <input type="email" name="email" class="form-control mb-3" id="emailId" placeholder="Email Address" required>

                        <input type="text" name="requestId" class="form-control mb-3" id="requestId" placeholder="Request" required>

                        <input type="hidden" name="manpower_id" value="<?=$man_info->id;?>">

                        <div>
                            <input type="submit" name="manPowerContact" value="Submit" class="btn btn-primary">
                        </div>
                        

                    </form>

                </div>
            <?php } else { ?>
                <form action="<?= site_url();?>admin/manpowers/addRating" method="POST" id="ratingForm">
                        
                        <div class="form-group">
                            <label for="ratting">Ratting</label>

                            <select name="ratting" class="form-control">
                                <option 
                                    value="1" 
                                    <?php if($man_info->ratting ==1) echo "selected";?>
                                >1</option>

                                <option 
                                    value="2"
                                    <?php if($man_info->ratting ==2) echo "selected";?>
                                >2</option>

                                <option 
                                    value="3"
                                    <?php if($man_info->ratting ==3) echo "selected";?>
                                >3</option>

                                <option 
                                    value="4"
                                    <?php if($man_info->ratting ==4) echo "selected";?>
                                >4</option>
                                <option 
                                    value="5"
                                    <?php if($man_info->ratting ==5) echo "selected";?>
                                >5</option>

                            </select>                            
                        </div>

                        <div class="form-group">
                            <label for="ratting">Is published</label>
                            <select name="is_published" class="form-control">
                                <option 
                                    value="1" 
                                    <?php if($man_info->is_published ==1) echo "selected";?>
                                >
                                    Published
                                </option>

                                <option 
                                    value="2"
                                    <?php if($man_info->is_published ==2) echo "selected";?>
                                >
                                    Unpublished
                                </option>
                            </select>
                        </div>

                        

                        

                        <input type="hidden" name="manpower_id" value="<?=$man_info->id;?>">

                        <div class="pt-3">
                            <input type="submit" name="manPowerContact" value="Submit" class="btn btn-primary">
                        </div>
                </form>
            <?php } ?>

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