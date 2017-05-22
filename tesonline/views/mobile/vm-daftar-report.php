 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="<?= base_url('assetsnew/css/pagination.css') ?>">
      <!-- Page Content -->
      <div id="content" class="page" style="min-height: 425px;">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Latihan</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        <!-- Article Content -->
         <div class=" delay-1">
          <div class="card delay-2">
        <div class="row">
              <div class="col s12">
                <h3 class="uppercase">Report Latihan</h3>
            <div class="activities">
                <?php if ($report == array()): ?>
                  <h4 class="p-20">Tidak ada Report Latihan.</h4>
                <?php else: ?> 
               <?php foreach ($report as $reportitem): ?>
                <?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
                <?php else: ?>
                  <?php $id = $reportitem['tingkatID'] ?> 
                <?php endif ?>
                

                 
                
                     
                    <ul>
                        <li><h4><?= $reportitem['nm_latihan'] ?></h4></li>
                        <li>Time&nbsp&nbsp&nbsp:&nbsp<?= $reportitem['tgl_pengerjaan'] ?></li>
                        <li>Level&nbsp&nbsp&nbsp:&nbsp <?=$reportitem['tingkatKesulitan']?> </li>
                        
                        <li>Score&nbsp&nbsp: <?= $reportitem['skore'] ?></li>
                        <li> <a href="<?=base_url()?>index.php/tesonline/detailreport/<?=$reportitem['id_latihan'] ?>" class="waves-effect waves-light btn primary-color"></i>Detail</a> <a href="<?=base_url()?>index.php/latihan/create_session_id_pembahasan/<?=$reportitem['id_latihan'] ?>" class="waves-effect waves-light btn primary-color">Pembahasan</a></li>
                    </ul>


                    
        
                <?php endforeach ?>
                <?php endif ?> 
                </div>
            </div>

          </div>
          <div class="grid-col-row clear-fix">
                  <center>
                    <div class="page-pagination clear-fix margin-none" style="width: 100%;">
                      <?php echo $links; ?>
                    </div>
                  </center>
                </div>
          <!-- <b><?=$jumlah_postingan;?></b> -->
          <div class="floating-button page-fab animated bouncein delay-3" >
          <?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
          <?php else: ?>
          
          <a href="<?=base_url()?>tesonline/pilihmapel/<?=$ti?>" class="btn-floating btn-large accent-color btn z-depth-1 " style="position: relative;">
            <i class="ion-android-add"></i>
          </a>
          <?php endif ?>
        </div>


      
         
      </div> <!-- End of Page Content -->
       </div>
        </div>
        </div>