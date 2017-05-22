 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <!-- Page Content -->
      <div id="content" class="page" style="min-height: 490px;">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color" >
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Tryout</span>
        </div>

         <!-- Profile Content -->
        <div class=" delay-1">
          <div class="card  delay-2">
            
            <!-- START Row -->
           <div class="row">
            <?php foreach ($pesan as $row): ?>
                <h3 class="uppercase"><?=$row['jenis'] ?></h3>
            
            
            <div>
                <h4><?=$row['isi'] ?></h4>
            </div>
            <?php endforeach ?>
          </div>
          </div>

        </div>
          </div>




<script src="<?= base_url('assetsnew/plugins/canvasjs.min.js') ?>"></script>

