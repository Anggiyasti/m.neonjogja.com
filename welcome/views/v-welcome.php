 <div class="m-scene" id="main"> <!-- Main Container -->

      <!-- Sidebars -->
      <!-- Left Sidebar -->
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
            <h2 class="uppercase">A single stroke </h2>
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
         
        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->

    </div> <!-- End of Page Container -->