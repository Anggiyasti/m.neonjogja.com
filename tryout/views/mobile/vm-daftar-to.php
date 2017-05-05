 <link rel="stylesheet" type="text/css" href="<?= base_url('assetsnew/css/pagination.css') ?>">
       <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Tryout</span>
        </div>

        <!-- Hero Header -->
        <div class="h-banner animated fadeindown red lighten-1">
          <div class="parallax bg-profile">
          </div>
            <div class="banner-title">Daftar Tryout</div>
          </div>



         <!-- Profile Content -->
        <div class=" delay-1">
          <div class="card delay-2">
            <h3 class="uppercase">Daftar Tryout</h3>
            <!-- START Row -->
            <div class="activities">
              <?php foreach ($tryout as $tryout_item): ?>
                <ul>
                  <li>Nama Tryout : <?=$tryout_item['nm_tryout'] ?></li>
                  <li>Waktu Mulai : <?=$tryout_item['tgl_mulai']." ".$tryout_item['wkt_mulai'] ?></li>
                  <li>Waktu Selesai : <?=$tryout_item['tgl_berhenti']." ".$tryout_item['wkt_berakhir']?></li>
                  <?php 
                      $date1 = new DateTime($tryout_item['tgl_mulai']);
                      $date2 = new DateTime($tryout_item['tgl_berhenti']);
                      $date3 = $date2->diff($date1);
                      $hariini = new DateTime(date("Y-m-d"));
                      $sisa = new stdClass();
                      if ($hariini>$date2) {
                        $sisa->days = 0;
                      } else {
                        $sisa = $date2->diff($hariini);
                      }
                  ?>

                  <li>Keaktivan : <?=$sisa->days ?> Hari</li>
                  <li><?php if ($sisa->days == 0): ?>
              <a class="btn btn-primary detail-<?=$tryout_item['id_tryout']?>" 
                title="Lihat Paket Soal" 
                data-todo='<?=json_encode($tryout_item) ?>'
                onclick="lihat_detail(<?=$tryout_item['id_tryout'] ?>)"
                >Lihat Paket Soal</a>


              <?php else: ?>
              <a class="btn btn-primary detail-<?=$tryout_item['id_tryout']?>" 
                title="Lihat Paket Soal" 
                data-todo='<?=json_encode($tryout_item) ?>'
                onclick="lihat_detail(<?=$tryout_item['id_tryout'] ?>)"
                >Lihat Paket Soal</a>
              <?php endif ?></li>
                </ul>
              <?php endforeach ?>
            
            <div class="grid-col-row clear-fix">
            <center>
              <div class="page-pagination clear-fix margin-none" style="width: 100%;">
                <?php echo $links; ?>
              </div>
            </center>
          </div>
          </div>
          </div>                      
        </div>

<script type="text/javascript">
function lihat_detail(id_to){
  window.location.href = base_url + "index.php/tryout/create_seassoin_idto/"+id_to;
  var kelas = ".detail-"+id_to;
  var data_to = $(kelas).data('todo');
}

</script>
        
