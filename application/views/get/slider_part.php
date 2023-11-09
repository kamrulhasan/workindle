<div class="col-md-6">
    
    <div id="slider" class="flexslider">

        <ul class="slides">
            <?php if($man_info->photo): ?>
                <li>
                    <img src="<?= site_url(); ?><?=$man_info->photo?>" alt="<?=$man_info->name?>">
                </li>
            <?php endif;?>

            <?php if($man_info->photo2): ?>
                <li>
                    <img src="<?= site_url(); ?><?=$man_info->photo2?>" alt="<?=$man_info->name?>">
                </li>
            <?php endif;?>

            <?php if($man_info->photo3): ?>
                <li>
                    <img src="<?= site_url(); ?><?=$man_info->photo3?>" alt="<?=$man_info->name?>">
                </li>
            <?php endif;?>

            <?php if($man_info->photo4): ?>
                <li>
                    <img src="<?= site_url(); ?><?=$man_info->photo4?>" alt="<?=$man_info->name?>">
                </li>
            <?php endif;?>

            <?php if($man_info->photo5): ?>
                <li>
                    <img src="<?= site_url(); ?><?=$man_info->photo5?>" alt="<?=$man_info->name?>">
                </li>
            <?php endif;?>
            <!-- items mirrored twice, total of 12 -->

        </ul>

    </div>

    <?php if($man_info->photo2 || $man_info->photo3 || $man_info->photo4): ?>
        <div id="carousel" class="flexslider">

            <ul class="slides">

                <?php if($man_info->photo): ?>
                    <li>
                        <img src="<?= site_url(); ?><?=$man_info->photo?>" alt="<?=$man_info->name?>">
                    </li>
                <?php endif;?>

                <?php if($man_info->photo2): ?>
                    <li>
                        <img src="<?= site_url(); ?><?=$man_info->photo2?>" alt="<?=$man_info->name?>">
                    </li>
                <?php endif;?>

                <?php if($man_info->photo3): ?>
                    <li>
                        <img src="<?= site_url(); ?><?=$man_info->photo3?>" alt="<?=$man_info->name?>">
                    </li>
                <?php endif;?>

                <?php if($man_info->photo4): ?>
                    <li>
                        <img src="<?= site_url(); ?><?=$man_info->photo4?>" alt="<?=$man_info->name?>">
                    </li>
                <?php endif;?>

                <?php if($man_info->photo5): ?>
                    <li>
                        <img src="<?= site_url(); ?><?=$man_info->photo5?>" alt="<?=$man_info->name?>">
                    </li>
                <?php endif;?>
                <!-- items mirrored twice, total of 12 -->
            </ul>

        </div>
    <?php endif;?>
</div>


<script type="text/javascript">
    // Can also be used with $(document).ready()
$(window).load(function(){
  $('#slider').flexslider({
    animation: "slide",
    rtl: true,
    controlNav: false,
    start: function(slider){
      $('body').removeClass('loading');
    }
  });
 $('#carousel').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 210,
    itemMargin: 5,
    pausePlay: true,
    mousewheel: true,
    rtl: true,
    asNavFor:'.flexslider',
    controlNav: false,
  });
});
</script>