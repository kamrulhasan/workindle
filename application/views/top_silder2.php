
<!-- Place somewhere in the <body> of your page -->
<div class="flexslider carousel">
  <ul class="slides">
    <li>
      <img src="<?php base_url(); ?>assets/img/home/top_slider/1.jpg" class="" alt="Top Slide">
    </li>
    <li>
      <img src="<?php base_url(); ?>assets/img/home/top_slider/2.jpg" class="" alt="Top Slide">
    </li>
    <li>
      <img src="<?php base_url(); ?>assets/img/home/top_slider/3.jpg" class="" alt="Top Slide">
    </li>
    <li>
      <img src="<?php base_url(); ?>assets/img/home/top_slider/4.jpg" class="" alt="Top Slide">
    </li>
    <!-- items mirrored twice, total of 12 -->
  </ul>
</div>

<script type="text/javascript">
  // Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
</script>