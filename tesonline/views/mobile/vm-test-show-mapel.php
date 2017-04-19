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
        <div class="row">
              <div class="col s12">
            <!-- With Left Icon -->

            
          <h4 class="uppercase" align="center">Mata Pelajaran</h4>
          <ul class="faq collapsible animated fadeinright delay-3" data-collapsible="accordion">
          <?php $no = 1 ?>

          <?php foreach ($mapel as $mapelitem): ?>
            <li>
            <input type="hiden" value="<?= $mapelitem['tingpelID'] ?>" class="hide" name="id">
              <div class="collapsible-header"><i class="ion-android-options"></i><a href="<?= base_url() ?>index.php/tesonline/next/<?=$mapelitem['tingpelID']?>"><?= $mapelitem['namaMataPelajaran'] ?></a></div>
              <div class="collapsible-body"></div>
            </li>
            <?php $no++; ?>
            <?php endforeach ?>
              <!-- Footer info -->

          </ul>          
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->
