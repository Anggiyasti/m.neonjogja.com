<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- sound notification -->
  <audio id="notif_audio"><source src="<?php echo base_url('sounds/notify.ogg');?>" type="audio/ogg"><source src="<?php echo base_url('sounds/notify.mp3');?>" type="audio/mpeg"><source src="<?php echo base_url('sounds/notify.wav');?>" type="audio/wav"></audio>
  <!-- /sound notification -->
      <!-- Sidebars -->
      
      <ul id="slide-out-left" class="side-nav collapsible">
        <li>
        <?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
          <div class="sidenav-header primary-color">
          
            <div class="nav-social">
              <i class="ion-social-facebook"></i>
              <i class="ion-social-twitter"></i>
              <i class="ion-social-tumblr"></i>
            </div>
            <div class="nav-avatar">

              <img class="circle avatar" src="<?=base_url('assets/back/img/logo@2x2.png')?>" height="30px">
              <div class="avatar-body">
                <h3>Halo</h3>
                <p style="font-size:15px"><?= $this->session->userdata['USERNAME']?></p>
              </div>
            </div>           
          </div>
          <?php else: ?>
        
          <div class="sidenav-header primary-color">
              <?php foreach ($siswa as $s): ?> 
            <div class="nav-social">
              <i class="ion-social-facebook"></i>
              <i class="ion-social-twitter"></i>
              <i class="ion-social-tumblr"></i>
            </div>
            <div class="nav-avatar">

              <img class="circle avatar" src="<?= base_url('./assetsnew/img/profile/'. $s->photo) ?>" >
              <div class="avatar-body">
                <h3>Halo</h3>
                <p style="font-size:15px"><?= $this->session->userdata['NAMASISWA']?></p>
              </div>
            </div>
            <?php endforeach ?>
           
          </div>
          <?php endif ?>
        </li>
         <li><a href="<?=base_url('index.php/welcome')?>" class="no-child"><i class="ion-android-home"></i>Home</a></li>
        <li>
        <?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
        <?php else: ?>
          <div class="collapsible-header">
            <i class="ion-android-person"></i> Profile
          </div>
          <div class="collapsible-body">
            <ul class="collapsible">
              <li>
                <a href="<?=base_url('siswa/profilesetting') ?>">Profile</a>
                <a href="<?= base_url("siswa/photosetting")?>">Photo</a>
                <a href="<?= base_url("siswa/emailsetting")?>">Email</a>
                <a href="<?= base_url("siswa/passwordsetting")?>">Password</a>
              </li>
            </ul>
          </div>
           <?php endif ?>
        </li>
        <li>
          <div class="collapsible-header">
            <i class="ion-ios-list-outline"></i> Video Pembelajaran
          </div>
          <div class="collapsible-body">
            <ul class="collapsible">
              <li>
                <a href="<?= base_url("video/videosd")?>">SD</a>
                <a href="<?= base_url("video/videosmp")?>">SMP</a>
                <a href="<?= base_url("video/videosma")?>">SMA</a>
                <a href="<?= base_url("video/videosmaipa")?>">SMA IPA</a>
                <a href="<?= base_url("video/videosmaips")?>">SMA IPS</a>
              </li>
            </ul>
          </div>
        </li>
         <li><a href="<?=base_url('index.php/tryout')?>" class="no-child"><i class="ion-ios-compose-outline"></i>Try Out</a></li>

         <?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
           <li><a href="<?= base_url("tesonline/daftarlatihan")?>" class="no-child"><i class="ion-ios-list-outline"></i>Latihan</a></li>
         <?php else: ?>
         
        <li>

          <div class="collapsible-header">
            <i class="ion-ios-list-outline"></i> Latihan
          </div>

          <div class="collapsible-body">
            <ul class="collapsible">
            
              <li>
              <?php $no=[1,4,5] ;$namaFile=""?>

                <?php $i=0; ?>


                <?php foreach ($tingkat as $tingkatitem): ?>

                <?php $namaFile = strtolower(str_replace(" ", "-", $tingkatitem['aliasTingkat'])) ?>

                <?php $no[$i] ?>
                <?php $id = $tingkatitem['id'] ?>
                <a href="<?=base_url()?>tesonline/daftarreport/<?=$id ?>"><?=$tingkatitem['aliasTingkat'] ?></a>
                <?php $i = $i+1; ?>

                <?php endforeach ?>
              </li>

            </ul>
          </div>  
           
        </li>
        <?php endif ?>

        <li>
          <a href="<?=base_url('ortuback')?>" class="no-child">
            <input type="int" name="count_komen" value="" hidden="true">
            <span class="icon" id="new_count_komen"></span>
             <span class="badge badge-danger jumlah_notifikasi" style="background-color: #f27c66;"></span>
          <i class="ion-ios-compose-outline"></i>Pesan
          </a>
        </li>

         <li>
         <?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
         <?php else: ?>
           
        
          <div class="collapsible-header">
            <i class="ion-android-folder-open"></i> Edu Drive
          </div>
          <div class="collapsible-body">
            <ul class="collapsible">
              <li>
                <a href="<?= base_url("modulonline/modulsd")?>">SD</a>
                <a href="<?= base_url("modulonline/modulsmp")?>">SMP</a>
                <a href="<?= base_url("modulonline/modulsma")?>">SMA</a>
                <a href="<?= base_url("modulonline/modulsmaipa")?>">SMA - IPA</a>
                <a href="<?= base_url("modulonline/modulsmaips")?>">SMA - IPS</a>
              </li>
            </ul>
          </div> 
           <?php endif ?> 
        </li>
        <li>
        <?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
        <?php else: ?>
          
       
        <a href="<?= base_url("konsultasi")?>" class="no-child"><i class="ion-chatbubbles"></i> Konsultasi</a>
         <?php endif ?>

        </li>
        <li><a href="<?php echo base_url('index.php/logout')?>" class="no-child"><i class="ion-android-exit"></i> Logout</a></li>

      </ul>
      <!-- End of Sidebars -->

                <script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script>

       <script type="text/javascript">

  jQuery(document).ready(function () {
    var socket = io.connect( 'http://'+window.location.hostname+':3000' );
    var new_count_komen = 0;
    var mapelID=8;
    var obMapel ='';
    var penggunaID = ('<?=$this->session->userdata['id']?>');
    var url = "<?= base_url() ?>index.php/siswa/ajax_getsiswa";
    var url_ortu = "<?= base_url() ?>index.php/ortuback/ajax_ortuID";

     // SOCKET PESAN SISWA
      socket.on('pesan_baru', function(data){
        console.log('masuk sockcet');

        var id_ortu = data.id_ortu;
        var jenis_lapor = data.jenis_lapor;
        var isi = data.isi;
        var namaPengguna = data.namaPengguna;

        $.ajax({
            url:url,
            success:function(data){
              // ubah type data  dari json ke objek
              obj =JSON.parse(data);
              console.log('obj', obj);
              
               idortu = obj[0].id_ortu;
               // namaPengguna = obj[0].penggunaID;

               for (i = 0; i < obj.length; i++) { 
                // cek pengguna yang dituju bukan?
                if (id_ortu == idortu ) {
                  //jika true 
                  var old_count_komen = parseInt($('[name=count_komen]').val());
                  new_count_komen = old_count_komen + 1;
                  $('[name=count_komen]').val(new_count_komen);
                  $( "#new_count_komen" ).html( new_count_komen+'<i class="ico-bell"></i>');  
                    // play sound notification
                    $('#notif_audio')[0].play();
                    //add komen baru ke data notif id message-tbody
                    $( "#message-tbody" ).prepend(' <a href="'+base_url+'ortuback/pesan/'+data.UUID+'" class="media border-dotted read"><span class="pull-left"><img src="'+namaPengguna+'" class="media-object img-circle" alt=""></span><span class="media-body"><span class="media-heading">'+namaPengguna+'</span><span class="media-text ellipsis nm">'+isi+'</span><!-- meta icon --><span class="media-meta pull-right">'+jenis_lapor+'</span><!--/ meta icon --></span></a>');
                } 
              }



             },              
          });

       
        

      });
      // SOCKET PESAN SISWA


    // SOCKET PESAN ORTU
    socket.on('pesan_baru', function(data){
         $.getJSON( base_url+"ortuback/jumlah_pesan/"+penggunaID, function( datas ) {
          $('.jumlah_notifikasi').text(datas);
        });
      var id_ortu = data.id_ortu;
      var jenis_lapor = data.jenis_lapor;
      var isi = data.isi;
      // substring dulu isi nya dari 0 sampe 10
      var isi_sub = isi.substring(0,10);
      var namaPengguna = data.namaPengguna;

      $.ajax({
            url:url_ortu,
            success:function(data){
              // ubah type data  dari json ke objek
              obj =JSON.parse(data);
              
              // ambil id ortu dari objek 
              ortuID = obj[0].id;


              for (i = 0; i < obj.length; i++) { 
                // cek pengguna yang dituju bukan?
                if (id_ortu == ortuID ) {
                    // play sound notification
                    $('#notif_audio')[0].play();
                    //add laporan baru ke data notif id message-tbody
                    $( "#message-tbody" ).prepend('<li> <a href="'+base_url+'ortuback/pesan/'+data.UUID+'" class="media border-dotted read">'+isi_sub+'</a></li>');
                    // $( "#message-tbody" ).prepend(' <a href="'+base_url+'ortuback/see_message/'+data.UUID+'" class="media border-dotted read">'+isi+'</a>');
                } 
              }


             },              
          });

      
    });
    // SOCKET SOCKET PESAN ORTU
    

 
  });


</script>