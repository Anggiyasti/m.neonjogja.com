 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="<?= base_url('assetsnew/css/pagination.css') ?>">
     <script src="<?= base_url('assetsnew/js/jquery-2.1.0.min.js') ?>"></script>
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
                <h3 class="uppercase">Report Pesan</h3>
                <!-- <div class="col-sm-7">
            <select class="browser-default m-b-30" name="jenis">
              <option value="all">Semua Jenis</option>
              <option value="nilai">Nilai</option>
              <option value="absen">Absen</option>
              <option value="umum">Umum</option>
            </select>
          </div> -->
            <div class="activities">
                <?php if ($pesan == array()): ?>
                  <h4 class="p-20">Tidak ada Report Latihan.</h4>
                <?php else: ?> 
                  <?php $no=1; ?>
               <?php foreach ($pesan as $row): ?>
                     
                    <ul class="coba">
                        
                        <li><h5>Jenis&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp<?= $row['jenis'] ?></h5></li>
                        <li><h5>Pesan&nbsp&nbsp&nbsp:&nbsp <?php $c = $row['isi']; echo substr($c, 0, 50)?> </h5></li>
                        <li> <a href="<?=base_url()?>index.php/ortuback/detail/<?=$row['id'] ?>" class="waves-effect waves-light btn primary-color"></i>Detail</a> </li>
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
        </div>

         
      </div> <!-- End of Page Content -->
  </div>
</div>
</div>

<script type="text/javascript">



// JENIS KETIKA DI CHANGE
$('select[name=jenis]').change(function(){

  jenis = $('select[name=jenis]').val();

 $.ajax({
  type: "POST",
  url: "<?php echo base_url() ?>ortuback/get_jenis/"+jenis,
  success: function(data){
   $('ul[class=coba]').html('<li></li>');
   $.each(data, function(i, data){
      var  id_pesan = data.id;
      var c = data.isi;
      // substring dulu isi nya dari 0 sampe 10
      var isi_sub = c.substring(0,50);
    $('ul[class=coba]').append('<li><h5>Jenis&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp'+data.jenis+'</h5></li><li><h5>Pesan&nbsp&nbsp&nbsp:&nbsp'+isi_sub+'</h5></li><li> <a href="<?=base_url()?>index.php/ortuback/detail/'+id_pesan+'" class="waves-effect waves-light btn primary-color"></i>Detail</a> </li> ');

  });
 }

});
  
});



function reload(){
  dataTableReport.ajax.reload(null,false); 
}

</script>