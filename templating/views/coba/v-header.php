<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Halo - Mobile Template</title>
    <meta content="IE=edge" http-equiv="x-ua-compatible">
    <meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <!-- Icons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" media="all" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="<?php echo base_url('assetsnew/css/keyframes.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assetsnew/css/materialize.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assetsnew/css/swiper.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assetsnew/css/swipebox.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assetsnew/css/style.css')?>" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?= base_url('assetsnew/css/sweetalert-dev.js');?>"></script>
    <link rel="stylesheet" href="<?= base_url('assetsnew/js/sweetalert.css');?>">
    <script type="text/javascript" src="<?= base_url('assetsnew/js/preview.js') ?>"></script>

    </script>
   
  </head>


  <body>
    <div class="m-scene" id="main"> <!-- Main Container -->
    <!-- Right Sidebar -->
     <ul id="slide-out-left" class="side-nav collapsible">
        <li>
          <div class="sidenav-header primary-color">
              <?php foreach ($siswa as $s): ?> 
            <div class="nav-social">
              <i class="ion-social-facebook"></i>
              <i class="ion-social-twitter"></i>
              <i class="ion-social-tumblr"></i>
            </div>
            <div class="nav-avatar">

              <img class="circle avatar" src="<?= base_url('./assetsnew/img/profile/'. $s->photo) ?>" >
              <div class="avatar-body">
                <h3>Halo</h3>
                <p style="font-size:15px"><?= $this->session->userdata['NAMASISWA']?></p>
              </div>
            </div>
            <?php endforeach ?>
           
          </div>
        </li>
         <li><a href="<?=base_url('index.php/welcome')?>" class="no-child"><i class="ion-android-home"></i>Home</a></li>
        <li>
          <div class="collapsible-header">
            <i class="ion-android-person"></i> Profile
          </div>
          <div class="collapsible-body">
            <ul class="collapsible">
              <li>
                <a href="<?=base_url('siswa/profilesetting') ?>">Profile</a>
                <a href="<?= base_url("siswa/photosetting")?>">Photo</a>
                <a href="<?= base_url("siswa/emailsetting")?>">Email</a>
                <a href="<?= base_url("siswa/passwordsetting")?>">Password</a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <div class="collapsible-header">
            <i class="ion-ios-list-outline"></i> Video Pembelajaran
          </div>
          <div class="collapsible-body">
            <ul class="collapsible">
              <li>
                <a href="<?= base_url("video/videosd")?>">SD</a>
                <a href="<?= base_url("video/videosmp")?>">SMP</a>
                <a href="<?= base_url("video/videosma")?>">SMA</a>
                <a href="<?= base_url("video/videosmaipa")?>">SMA IPA</a>
                <a href="<?= base_url("video/videosmaips")?>">SMA IPS</a>
              </li>
            </ul>
          </div>
        </li>
         <li><a href="<?=base_url('index.php/welcome')?>" class="no-child"><i class="ion-ios-compose-outline"></i>Try Out</a></li>
        <li>
          <div class="collapsible-header">
            <i class="ion-ios-list-outline"></i> Latihan
          </div>
          <div class="collapsible-body">
            <ul class="collapsible">
              <li>
                <a href="material.html">SD</a>
                <a href="left-sidebar.html">SMP</a>
                <a href="right-sidebar.html">SMA</a>
              </li>
            </ul>
          </div>  
        </li>
         <li>
          <div class="collapsible-header">
            <i class="ion-android-folder-open"></i> Edu Drive
          </div>
          <div class="collapsible-body">
            <ul class="collapsible">
              <li>
                <a href="<?= base_url("modulonline/modulsd")?>">SD</a>
                <a href="<?= base_url("modulonline/modulsmp")?>">SMP</a>
                <a href="<?= base_url("modulonline/modulsma")?>">SMA</a>
                <a href="<?= base_url("modulonline/modulsmaipa")?>">SMA - IPA</a>
                <a href="<?= base_url("modulonline/modulsmaips")?>">SMA - IPS</a>
              </li>
            </ul>
          </div>  
        </li>
        <li><a href="<?= base_url("konsultasi")?>" class="no-child"><i class="ion-chatbubbles"></i> Konsultasi</a></li>
        <li><a href="<?php echo base_url('index.php/logout')?>" class="no-child"><i class="ion-android-exit"></i> Logout</a></li>

      </ul>
      <!-- End of Sidebars -->