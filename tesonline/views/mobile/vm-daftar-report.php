      <!-- Page Content -->
      <div id="content" class="page" style="min-height: 425px;">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Report Latihan</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        <!-- Article Content -->
        <div class="row">
              <div class="col s12">
            <!-- With Left Icon -->
         <!--    <?php foreach ($bab as $reportitem): ?>
                <h4 class="uppercase" align="center"><?= $reportitem['nama_mapel'] ?></h4>
            <?php endforeach ?> -->

            <div class="activities">
                <?php if ($report == array()): ?>
                  <h4 class="p-20">Tidak ada Report Latihan.</h4>
                <?php else: ?> 
               <?php foreach ($report as $reportitem): ?>
                <?php $id = $reportitem['tingkatID'] ?> 

                 <div class="activity animated fadeinright delay-1">

                
                     
                    <ul>
                        <li><h4><?= $reportitem['nm_latihan'] ?></h4></li>
                        <li>Time&nbsp&nbsp&nbsp:&nbsp<?= $reportitem['tgl_pengerjaan'] ?></li>
                        <li>Level&nbsp&nbsp&nbsp:&nbsp <?=$reportitem['tingkatKesulitan']?> </li>
                        
                        <li>Score&nbsp&nbsp: <?= $reportitem['skore'] ?></li>
                        <li> <a href="<?=base_url()?>index.php/tesonline/detailreport/<?=$reportitem['id_latihan'] ?>" class="waves-effect waves-light btn primary-color"></i>Detail</a> <a href="<?=base_url()?>index.php/latihan/create_session_id_pembahasan/<?=$reportitem['id_latihan'] ?>" class="waves-effect waves-light btn primary-color">Pembahasan</a></li>
                    </ul>


                    
          </div> 
            



                <?php endforeach ?>
                <?php endif ?> 
                </div>
            </div>

          </div>
          <div class="floating-button page-fab animated bouncein delay-3" style="padding-bottom: 510px;">
          
          <a href="<?=base_url()?>tesonline/pilihmapel/<?=$ti?>" class="btn-floating btn-large accent-color btn z-depth-1 " style="position: relative;">
            <i class="ion-android-add"></i>
          </a>
        </div>


      
         
      </div> <!-- End of Page Content -->
       </div>