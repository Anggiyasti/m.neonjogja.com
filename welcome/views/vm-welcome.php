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

          <!-- Video -->
          <h4 class="p-20">Video Belajar</h4>
          <ul class="faq collapsible animated fadeinright delay-1" data-collapsible="accordion">
            <li>           
              <div class="collapsible-header"><i class="ion-android-arrow-dropdown right"></i>Sekolah Dasar</div>
              <div class="collection collapsible-body">
                <?php foreach ($pelajaran_sd as $pelajaran_items): ?>
                <a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?= $pelajaran_items->namaMataPelajaran ?></a>
                <?php endforeach ?>
                <?php if ($pelajaran_sd == array()): ?>
                    <a href="#" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd; color:orange;">Belum Tersedia Video Pembelajaran!</a>
                <?php endif ?>
              </div>
            </li>
            <li>           
              <div class="collapsible-header"><i class="ion-android-arrow-dropdown right"></i>SMP</div>
              <div class="collection collapsible-body">
                <?php foreach ($pelajaran_smp as $pelajaran_items): ?>
                <a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?= $pelajaran_items->namaMataPelajaran ?></a>
                <?php endforeach ?>
                <?php if ($pelajaran_smp == array()): ?>
                    <a href="#" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd; color:orange;">Belum Tersedia Video Pembelajaran!</a>
                <?php endif ?>
              </div>
            </li>
            <li>           
              <div class="collapsible-header"><i class="ion-android-arrow-dropdown right"></i>SMA</div>
              <div class="collection collapsible-body">
                <?php foreach ($pelajaran_sma as $pelajaran_items): ?>
                <a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?= $pelajaran_items->namaMataPelajaran ?></a>
                <?php endforeach ?>
                <?php if ($pelajaran_sma == array()): ?>
                    <a href="#" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd; color:orange;">Belum Tersedia Video Pembelajaran!</a>
                <?php endif ?>
              </div>
            </li>
            <li>           
              <div class="collapsible-header"><i class="ion-android-arrow-dropdown right"></i>SMA IPA</div>
              <div class="collection collapsible-body">
                <?php foreach ($pelajaran_sma_ipa as $pelajaran_items): ?>
                <a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?= $pelajaran_items->namaMataPelajaran ?></a>
                <?php endforeach ?>
                <?php if ($pelajaran_sma_ipa == array()): ?>
                    <a href="#" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd; color:orange;">Belum Tersedia Video Pembelajaran!</a>
                <?php endif ?>
              </div>
            </li>
            <li>           
              <div class="collapsible-header"><i class="ion-android-arrow-dropdown right"></i>SMA IPS</div>
              <div class="collection collapsible-body">
                <?php foreach ($pelajaran_sma_ips as $pelajaran_items): ?>
                <a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?= $pelajaran_items->namaMataPelajaran ?></a>
                <?php endforeach ?>
                <?php if ($pelajaran_sma_ips == array()): ?>
                    <a href="#" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd; color:orange;">Belum Tersedia Video Pembelajaran!</a>
                <?php endif ?>
              </div>
            </li>
          </ul>

        
        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->

    </div> <!-- End of Page Container -->