 <div class="m-scene" id="main"> <!-- Main Container -->

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
              <img class="circle avatar" src="img/user.jpg" alt="">
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
                <a href="portfolio-filter.html">Profile</a>
                <a href="portfolio-masonry.html">Photo</a>
                <a href="portfolio-card.html">Email</a>
                <a href="portfolio-card.html">Password</a>
              </li>
            </ul>
          </div>
        </li>
        <li><a href="<?=base_url('index.php/welcome')?>" class="no-child"><i class="ion-ios-videocam"></i>Video Pembelajaran</a></li>
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
                <a href="material.html">SD</a>
                <a href="left-sidebar.html">SMP</a>
                <a href="right-sidebar.html">SMA</a>
              </li>
            </ul>
          </div>  
        </li>
        <li><a href="contact.html" class="no-child"><i class="ion-chatbubbles"></i> Konsultasi</a></li>
        

      </ul>
      <!-- End of Sidebars -->

      <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Project</span>
        </div>
        
        <!-- Main Content -->
        <div class="animated fadeinup">
          <!-- Project Image -->
          <div class="project-image z-depth-1 animated fadein delay-1">
            <img src="<?=base_url('assetsnew/img/illustrasi/slide_2.jpg')?>" alt="">
          </div>

          <!-- Project Author -->
          <div class="project-info">
            <h2 class="uppercase">A single stroke</h2>
            <span class="small">Drawing / Illustration / Painting</span>
            <p class="m-t-10 m-b-30">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
          </div>
          <div class="post-author m-20 animated fadeinright delay-2">
            <img src="img/user2.jpg" alt="" class="avatar circle">
            <span>Lora Bell</span>
            <div class="project-social-share">
              <i class="ion-social-facebook blue-text text-darken-4"></i>
              <i class="ion-social-twitter blue-text"></i>
              <i class="ion-social-pinterest red-text"></i>
            </div>
          </div>

          <!-- Comments -->
          <div class="comments project-comments animated fadeinup delay-3">
            <h3 class="uppercase">Video Pembelajaran</h3>
            <div class="grid-col-row clear-fix" style="list-style: none;" >
            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>Sekolah Dasar<hr></strong></h5>
                    
                    <?php foreach ($pelajaran_sd as $pelajaran_items): ?>
                        <li ><a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>" class="text-info""><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>
                     <?php if ($pelajaran_sd == array()): ?>
                        <h6 style="color:orange;">Belum Tersedia Video Pembelajaran !</h6>
                    <?php endif ?>
               
            </div>


            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>SMP<hr></strong></h5>
              
                    <?php foreach ($pelajaran_smp as $pelajaran_items): ?>
                        <li ><a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>
                     <?php if ($pelajaran_smp == array()): ?>
                        <h6 style="color:orange;">Belum Tersedia Video Pembelajaran !</h6>
                    <?php endif ?>
          
            </div>

            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>SMA<hr></strong></h5>
            
                    <?php foreach ($pelajaran_sma as $pelajaran_items): ?>
                       <li ><a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>

                    <?php if ($pelajaran_sma == array()): ?>
                        <h6 style="color:orange;">Belum Tersedia Video Pembelajaran !</h6>
                    <?php endif ?>
               
            </div>

            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>SMA IPA<hr></strong></h5>
             
                    <?php foreach ($pelajaran_sma_ipa as $pelajaran_items): ?>
                       <li> <a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>
                    <?php if ($pelajaran_sma_ipa == array()): ?>
                        <h6 style="color:orange;">Belum Tersedia Video Pembelajaran !</h6>
                    <?php endif ?>
            </div>


            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>SMA IPS<hr></strong></h5>
               
                    <?php foreach ($pelajaran_sma_ips as $pelajaran_items): ?>
                       <li> <a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>
                    <?php if ($pelajaran_sma_ips == array()): ?>
                        <h6 style="color:orange;">Belum Tersedia Video Pembelajaran !</h6>
                    <?php endif ?>
              
            </div>

        </div>
            <ul class="comments-list">
              
            </ul>
          </div>

          <!-- Footer -->
          <footer class="page-footer primary-color">
          <div class="container">
            <div class="row">
              <div class="col s12">
                <p class="center-align grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                <div class="center-align">
                  <i class="ion-social-facebook m-10 white-text"></i>
                  <i class="ion-social-twitter m-10 white-text"></i>
                  <i class="ion-social-pinterest m-10 white-text"></i>
                  <i class="ion-social-dribbble m-10 white-text"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-copyright red darken-1">
            <div class="container">
            2016 Codnauts
            <a class="grey-text text-lighten-4 right" href="#!">Privacy Policy</a>
            </div>
          </div>
        </footer>
        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->

    </div> <!-- End of Page Container -->