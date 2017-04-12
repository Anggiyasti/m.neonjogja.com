<!-- Page Content -->
      <div id="content" class="page" style="min-height: 320px">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Video Pembelajaran</span>
        </div>
        <div>
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s6 red lighten-1"><a class="active" href="#test1" style="color: white;">Screen</a></li>
              <li class="tab col s6 red lighten-1"><a href="#test2" style="color: white;">Room</a></li>
            </ul>
          </div>
          
          <div id="test1" class="col s12 grey lighten-4" style="min-height: 220px">
          <div class="title title-video">Video Materi - <?=$judul_header ?></div>
            <ul class="faq collapsible animated fadeinright delay-1" data-collapsible="accordion">
                <li>
                <?php $i=0;   $cekjudulbab=null;?>
                  <?php foreach ($bab_video as $bab_video_items) {
                  $judulbab=$bab_video_items->judulBab;
                  $subbab=$bab_video_items->judulSubBab;

                  if ($cekjudulbab != $judulbab) { 
                    if($i=='1'){
                      // END div demo
                      ?>
                      <?php
                    } ?> 
                     
                  <div class="collapsible-header"><i class="ion-android-arrow-dropdown right"></i><?=$judulbab ?></div>

                  <div class="collection collapsible-body">

                    <?php if ($bab_video_items->jenis_video == 1): ?>
                       <div class="collection-item collapsible-body"><h6><a href="<?=base_url('video/videosub/');?><?=$bab_video_items->subbabID;?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?php echo $bab_video_items->judulVideo ;?>(S)</a></h6></div>
                    <?php endif ?>

                    <?php }else{ ?>
                    <?php if ($bab_video_items->jenis_video == 1): ?>
                    <div class="collection-item collapsible-body"><h6><a href="<?=base_url('video/videosub/')?><?=$bab_video_items->subbabID?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?php echo $bab_video_items->judulVideo ;?>(S)</a></h6></div>
                    <?php endif ?>

                    <?php } ?>
                    
                    <?php   $cekjudulbab=$judulbab;
                    $i='1'; ?>
                    <?php } ?>
                  </div>
                </li>
              </ul>
          </div>
          <div id="test2" class="col s12 grey lighten-4" style="min-height: 220px">
          <div class="title title-video">Video Materi - <?=$judul_header ?></div>
            <ul class="faq collapsible animated fadeinright delay-1" data-collapsible="accordion">
                <li>
                  <?php $i=0;   $cekjudulbab=null;?>
                  <?php foreach ($bab_video as $bab_video_items) {
                  $judulbab=$bab_video_items->judulBab;
                  $subbab=$bab_video_items->judulSubBab;

                  if ($cekjudulbab != $judulbab) { 
                    if($i=='1'){
                      // END div demo
                      ?>
                      <?php
                    } ?>    
                  <div class="collapsible-header"><i class="ion-android-arrow-dropdown right"></i><?=$judulbab ?></div>

                  <div class="collection collapsible-body">
                    <?php if ($bab_video_items->jenis_video != 1): ?>
                       <div class="collection-item collapsible-body"><h6><a href="<?=base_url('video/videosub/');?><?=$bab_video_items->subbabID;?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?php echo $bab_video_items->judulVideo ;?>(R)</a></h6></div>
                    <?php endif ?>

                    <?php }else{ ?>
                    <?php if ($bab_video_items->jenis_video != 1): ?>
                    <div class="collection-item collapsible-body"><h6><a href="<?=base_url('video/videosub/')?><?=$bab_video_items->subbabID?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?php echo $bab_video_items->judulVideo ;?>(R)</a></h6></div>
                    <?php endif ?>
                    <?php } ?>
                    <?php   $cekjudulbab=$judulbab;
                    $i='1'; ?>
                    <?php } ?>
                  </div>
                </li>
              </ul>
          </div>
        </div>
        
        
        

          

        
        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->

    </div> <!-- End of Page Container -->