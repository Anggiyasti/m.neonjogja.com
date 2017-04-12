<!-- Page Content -->
      <div id="content" class="page" style="min-height: 425px;">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Video Pembelajaran</span>
        </div>

        <!-- Video -->
          <h4 class="p-20">Video Belajar</h4>
          <ul class="faq collapsible animated fadeinright delay-1" data-collapsible="accordion">
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
          </ul>
        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->

    </div> <!-- End of Page Container -->