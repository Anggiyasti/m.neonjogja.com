<script src="http://macyjs.com/assets/js/macy.min.js"></script>

<!-- Page Content -->
      <div id="content" class="page" style="min-height: 420px;">

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
            <li class="tab col s6 red lighten-1"><a class="active" href="javascript:void(0);" onclick="semua()" style="color: white;"> <input type="radio" name="options"  autocomplete="off" checked="true" title="Tampilkan Semua Jenis Video">All</a></li>
              <li class="tab col s6 red lighten-1"><a class="active" href="javascript:void(0);" onclick="justscreen()" style="color: white;"><input type="radio" name="options" autocomplete="off"><input type="radio" name="options" autocomplete="off"> Screen</a></li>
              <li class="tab col s6 red lighten-1"><a href="javascript:void(0);" onclick="justroom()" style="color: white;">Room</a></li>
            </ul>
          </div>
         
        
        <!-- Article Content -->
        <div class="row">
              <div class="col s12">
            <!-- With Left Icon -->
          <div class="title title-video">Video Materi - <?=$judul_header ?></div>
          <ul class="faq collapsible animated fadeinright delay-" data-collapsible="accordion">
          <?php $ke=0; ?>
          <?php $cekjudulbab=null; ?>
          <?php foreach ($bab_video as $bab_video_items) : ?>
            <!-- <?php $mp=$pel['nama_mapel']; ?> -->
            <?php $judulbab=$bab_video_items->judulBab;
                  $subbab=$bab_video_items->judulSubBab; ?>

            <?php if ($ke==0): ?>
            <!-- Header Info -->
            <li>
              <div class="collapsible-header"><?=$judulbab ?></div>
            
            <!-- /Header Info -->
            <?php $ke=1; ?>
            <?php elseif($judulbab!=$oldjudul): ?>
            <!-- Footer info -->
            </li>
            <!-- Footer Info -->
            <!-- Header Info -->            
            <li>
              <div class="collapsible-header"></i><?=$judulbab ?></div>
               <!-- /Header Info -->
              <?php endif ?>
              <!-- Body Info -->
              <!-- <div class="collapsible-body"><p><?=$pel['judul_bab']?></p></div> -->
              <?php if ($bab_video_items->jenis_video == 1): ?>
              <div class="collection collapsible-body room" >
              <a href="<?=base_url('video/videosub/')?><?=$bab_video_items->subbabID?>" class=" collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?php echo $bab_video_items->judulVideo ;?>(S)</a>
            </div>
              <?php else: ?>
              <div class="collection collapsible-body screen">
              <a href="<?=base_url('video/videosub/')?><?=$bab_video_items->subbabID?>" class="collection-item collapsible-body" style="border-bottom: 1px solid #ddd"><?php echo $bab_video_items->judulVideo ;?>(R)</a>
              </div>
              
               <?php endif ?>
              <!-- /Body info -->
              <?php $oldjudul=$judulbab; ?>
             <?php endforeach ?>
              <!-- Footer info -->

            </li>
             <!-- Footer Info --> 
          </ul>          
          </div>
          </div>
          </div>
          </div>
          <!-- </div> -->

          
    <script type="text/javascript">
      function direct(){
        var tingkat = $("input[name='tingkat']").val();
        var aliasMapel = $("input[name='pelajaran']").val();
        window.location = base_url+"video/daftarvideo/"+<?=$this->uri->segment(3) ?>;
      }

      function justroom(){
        $('.screen').hide("slow");
        $('.room').show("slow");
      }

      function justscreen(){
        $('.screen').show("slow");
        $('.room').hide("slow");
      }

      function semua(){
        $('.screen').show("slow");
        $('.room').show("slow");
      }

      $(document).ready(function(){
        Macy.init({
          container: '#macy-container',
          trueOrder: false,
          waitForImages: false,
          margin: 24,
          columns: 3,
          breakAt: {
            1200: 5,
            940: 3,
            520: 2,
            400: 1
          }
        });
      });
    </script>
