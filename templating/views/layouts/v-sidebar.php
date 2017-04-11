<div class="m-scene" id="main">
<!-- Sidebars -->
      <!-- Left Sidebar -->
      <ul id="slide-out-left" class="side-nav collapsible">
        <li>
          <div class="sidenav-header primary-color">
            <div class="nav-social">
              <i class="ion-social-facebook"></i>
              <i class="ion-social-twitter"></i>
              <i class="ion-social-tumblr"></i>
            </div>
            <div class="nav-avatar">
              <img class="circle avatar" src="http://placehold.it/70x70" alt="">
              <div class="avatar-body">
                <h3>Halo</h3>
                <p style="font-size:15px"><?= $this->session->userdata['NAMASISWA']?></p>
              </div>
            </div>
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