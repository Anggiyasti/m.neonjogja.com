<!DOCTYPE html>
<html class="backend">
<!-- START Head -->
<head>
  <!-- START META SECTION -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{judul_halaman}</title>
  <meta name="author" content="pampersdry.info">
  <meta name="description" content="Adminre is a clean and flat backend and frontend theme build with twitter bootstrap 3.1.1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/image/touch/apple-touch-icon-144x144-precomposed.png') ?>">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/image/touch/apple-touch-icon-114x114-precomposed.png') ?>">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/image/touch/apple-touch-icon-72x72-precomposed.png') ?>">
  <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/image/touch/apple-touch-icon-57x57-precomposed.png') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/image/favicon.ico') ?>">
  <script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery.min.js') ?>"></script>
  <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
  <script src="<?= base_url('assets/sal/sweetalert-dev.js');?>"></script>
  <link rel="stylesheet" href="<?= base_url('assets/sal/sweetalert.css');?>">
 <script>var base_url = '<?php echo base_url() ?>'</script>
  <!--/ END META SECTION -->

  <!-- START STYLESHEETS -->
  <!-- Plugins stylesheet : optional -->


  <!--/ Plugins stylesheet -->
<!-- css aoutocomplate -->
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>

<!-- <link href='<?php echo base_url();?>assets/css/jquery.autocomplete.css' rel='stylesheet' />
JS aoutocomplate
<script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script> -->
  <!-- Application stylesheet : mandatory -->
  <link rel="stylesheet" href="<?= base_url('assets/library/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/stylesheet/layout.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/stylesheet/uielement.min.css') ?>">
  <!--/ Application stylesheet -->
  <!-- END STYLESHEETS -->

  <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
  <script src="<?= base_url('assets//library/modernizr/js/modernizr.min.js') ?>"></script>
  <!--/ END JAVASCRIPT SECTION -->

</head>
<!--/ END Head -->
<!-- START Body -->
<body>

<!-- sound notification -->
  <audio id="notif_audio"><source src="<?php echo base_url('sounds/notify.ogg');?>" type="audio/ogg"><source src="<?php echo base_url('sounds/notify.mp3');?>" type="audio/mpeg"><source src="<?php echo base_url('sounds/notify.wav');?>" type="audio/wav"></audio>
  <!-- /sound notification -->
  




<!-- START Template Main -->
<section id="main" role="main">
  <!-- START Template Container -->
  <div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header page-header-block">
      <div class="page-header-section">
        <h4 class="title semibold">{judul_halaman}</h4>
      </div>
      <div class="page-header-section">
      </div>
    </div>

    <?php
    foreach ($files as $file) {
      include $file;
    }
    ?>

    <!-- Page Header -->
  </div>
  <!--/ END Template Container -->

  <!-- START To Top Scroller -->
  <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
  <!--/ END To Top Scroller -->

</section>
<!--/ END Template Main -->


<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery-migrate.min.j') ?>s"></script>
<script type="text/javascript" src="<?= base_url('assets/library/bootstrap/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/library/core/js/core.min.js') ?>"></script>
<!--/ Library script -->

<!-- App and page level script -->
<script type="text/javascript" src="<?= base_url('assets/plugins/sparkline/js/jquery.sparkline.min.js') ?>"></script><!-- will be use globaly as a summary on sidebar menu -->
<script type="text/javascript" src="<?= base_url('assets/javascript/app.min.js') ?>"></script>

<!--datatable-->
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/js/jquery.datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/tabletools/js/tabletools.min.js') ?>"></script>
<!--<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/tabletools/js/zeroclipboard.js') ?>"></script>-->
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/js/jquery.datatables-custom.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/javascript/tables/datatable.js') ?>"></script>
  <script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script>

   <script type="text/javascript">

  jQuery(document).ready(function () {
    var socket = io.connect( 'http://'+window.location.hostname+':3000' );
    var new_count_komen = 0;
    var mapelID=8;
    var obMapel ='';
    var ortuID = ('<?=$this->session->userdata['id']?>');
    var url = "<?= base_url() ?>index.php/ortuback/ajax_ortuID";
    console.log(ortuID);

    socket.on( 'pesan_baru', function( data ) {
      var id_ortu = data.id_ortu;
      var jenis_lapor = data.jenis_lapor;
      var isi = data.isi; 
          //ajax untuk get data mapelid guru
           // $('#notif_audio')[0].play();
          $.ajax({
            url:url,
            success:function(mapel){
          //     $('#notif_audio')[0].play();
              // ubah type data mapel id guru dari json ke objek
              obj =JSON.parse(mapel);
              // for (i = 0; i < obMapel.length; i++) { 
                // mapelIdGuru=obMapel[i].mapelID;
                //cek data koemn jika data komen bukan milik dia dan mapel id sesuai dengan mapel id guru 
                // if (idPengguna!=userID && mapelID==mapelIdGuru) {
                if (ortuID==4807) {
                  //jika true 
                  // var old_count_komen = parseInt($('[name=count_komen]').val());
                  // new_count_komen = old_count_komen + 1;
                  // $('[name=count_komen]').val(new_count_komen);
                  // $( "#new_count_komen" ).html( new_count_komen+'<i class="ico-bell"></i>');  
                  // play sound notification
                  $('#notif_audio')[0].play();
                  //add komen baru ke data notif id message-tbody
                  $( "#message-tbody" ).prepend(' <a href="'+base_url+'komenback/seevideo/'+data.isi+'/'+data.isi+'" class="media border-dotted read"><span class="pull-left"><img src="'+isi+'" class="media-object img-circle" alt=""></span><span class="media-body"><span class="media-heading">'+data.isi+'</span><span class="media-text ellipsis nm">'+data.isi+'</span><!-- meta icon --><span class="media-meta pull-right">'+data.isi+'</span><!--/ meta icon --></span></a>');
                  console.log('bunyi');
                  console.log(id_ortu);
                  console.log('beda',obj);
                } else {
                  console.log('kosong');
                  console.log(id_ortu);
                }
              // }
            },              
          });
          
        });

    

  
  });


</script>

<!--/ END JAVASCRIPT SECTION -->
</body>
<!--/ END Body -->
</html>