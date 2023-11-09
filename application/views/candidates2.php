<div class="container talents">
    <div class="row justify-content-center"> 

    <?php
    if($categories){
        foreach($categories as $category){
            ?>
                <!--per item-->
                
                    <div class="imageTitle">
                        <a href="<?=site_url();?>/candidates?cate_id=<?=$category->id?>">
                            <div class="wiImage"> 
                                <a href="<?=site_url();?>/candidates?cate_id=<?=$category->id?>">
                            <img src="<?php echo site_url();?>/assets/img/caretaker.jpg">    
                            </div>
                            <div class="wiTitle">
                                <p> <?=$category->name?> </p>
                            </div>
                        </a>
                    </div>
                
            <?php
        }
    }
    ?> 
    </div>
</div>


<div class="container">	
    <div class="form-group pt-3">
    </div>
	<div class="row">
     <?php
        $experience = $this->session->userdata('experience');
        $age = $this->session->userdata('age');
     ?>
            
        <div class="col-md-12">
            <?php
                $sessionRatting = $this->session->userdata('ratting');
            ?>
            
            <?php 

                if($results) {
                    foreach($results as $row){
                        $videoId = get_video_id($row->video_link);
                        
                ?>
                    <div class="container">
                        <div class="row border border-secondary px-3 pt-3 pb-1 mb-3">
                            <div class="col-md-5 px-0 pb-2 wow slideInLeft">                            
                            <?php if($videoId) {
                                 ?>
                                <blockquote class="tiktok-embed" cite="<?=$row->video_link;?>" data-video-id="<?=$videoId?>" data-embed-from="embed_page" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@emirabdulgani" href="https://www.tiktok.com/@emirabdulgani?refer=embed">@emirabdulgani</a> <p>Les</p> <a target="_blank" title="♬ sonido original - Emir Abdul Gani" href="https://www.tiktok.com/music/sonido-original-7281303192802216709?refer=embed">♬ sonido original - Emir Abdul Gani</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>
                            <?php } else { ?>
                                <img class="img img-fluid" src="<?=base_url()?><?=$row->photo?>" alt="">
                            <?php } ?>
                            
                            </div>
                            <div class="col-md-7 wow slideInRight">
                                <h5>Id: <?=$row->reg_id;?></h5>
                                <h4> 
                                    <a href="<?= site_url(); ?>candidates/candidate/<?= $row->id; ?>" class="text-dark font-weight-bold"> <?= $row->name; ?> </a> 
                                </h4>
                                <h5>
                                    <div class="stars">
                                        <?php $ratting = $row->ratting; ?>
                                        Rank :
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
                                </h5>
                                <h5> <?= $row->nationality; ?> </h5>
                                <h5> Category: <?= $row->cateName; ?> </h5>
                                
                            </div>
                        </div>
                    </div>
                <?php
                    }
                }
            ?>

            <div class=" d-flex justify-content-center">
                <div class="pagination"><?php echo $pagination; ?></div>
            </div>


        </div>
    </div>
</div>

<script type="text/javascript">
   $('.rankFilter').change(function(){
        $('#rattingFilter').submit();
   })
        
    
</script>