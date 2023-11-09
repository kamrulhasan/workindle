<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
      $site_config = $this->site_config;
    ?>


    <meta name="description" content="<?php echo $site_config->meta_des; ?>"/>
    <meta name="keywords" content="<?php echo $site_config->meta_key; ?>"/>
    <meta name="author" content="<?php echo $site_config->site_name; ?>"/>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/logo/<?php echo $site_config->favicon; ?>"/>
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    
    <link rel='stylesheet' id='flexslider-css'  href='<?php echo base_url(); ?>assets/css/flexslider.css' type='text/css' media='all' />

    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

 

    
    <script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>    
    <script src="<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <title><?php echo $site_config->site_title; ?></title>
  </head>
  <?php include 'top_social_icon.php'; ?>
  <?php include 'top_menu.php'; ?>

  <body style="">