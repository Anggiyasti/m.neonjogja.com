<script src="http://code.jquery.com/jquery-3.1.0.slim.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assetsnew/stylesheet/style.css')?>"> 
       <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Project</span>
        </div>
        
        <!-- Main Content -->
        <div class="animated fadeinup">
          <!-- Project Image -->
          <div class="project-image z-depth-1 animated fadein delay-1">
           
          </div>

       

          <!-- Video -->
          <!-- <h4 class="p-20">Video Belajar</h4> -->
<section class="padding-section" style="padding-top: 0;margin-top: 0">
  <div class="grid-row clear-fix" style="padding-bottom: 0;padding-bottom:0">
    <h3 style="text-align: center;">Topik yang baru saja dipelajari..</h3> <p style="text-align: center;">
    Hi, <?=$this->session->userdata('USERNAME') ?> ! Dibawah ini adalah progress learning line kamu, silahkan lanjutkan untuk bisa menyelesaikan topik-topik yang disediakan. Tetap semangat!<br><br></p>
    <a onclick="show_modal_learning()" class="waves-effect waves-light btn primary-color">Selengkapnya</a> <br><br>  

    <div class="skill-area">
                
                <?php if ($topik== array()): ?>
          <h4 align="center">Tidak ada Grafik Workout.</h4>
        <?php else: ?>
   
        <?php foreach ($topik  as $item) : 
        $persentasi = (int)$item['stepDone'] / (int)$item['jumlah_step'] * 100; 
        $p = (int)$persentasi ;
        if ($p == null) { ?>
           

        <?php } else { ?>

        <?php if ($p == 0) { ?>

          <div class="progress" style="height: 20px; background-color: #ffffff ;">
              <div class="lead">
                  <a href="<?=base_url("linetopik/learningline/".$item['babID']) ?>"><?=$item['namaTopik'] ?></a></div>
              <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%;  visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft; height: 20px; background-color: #f5f5f5 ;" data-progress="0" class="progress-bar wow fadeInLeft animated"></div><span>0%</span>
          </div>
                
        <?php } else {?>
          <div class="progress" style="height: 20px; background-color: #ffffff ;">
          <div class="lead">
            <a href="<?=base_url("linetopik/learningline/".$item['babID']) ?>"><?=$item['namaTopik'] ?></a>
          </div>
          <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft; height: 20px; background-color: #19305B;" data-progress="<?=$p?>" class="progress-bar wow fadeInLeft animated"></div><span><?=$p?>%</span> 
          </div>
                <?php } 
                }?>
        <!-- End Skill Bar -->
        <?php endforeach ?>   
    <!-- End Skill Bar -->
    <?php endif ?>
                                                
    </div> 
  </div>
  <hr class="divider-color">
</section>
<section class="padding-section" style="padding-top: 0;margin-top: 0">
  <div class="grid-row clear-fix" style="padding-bottom: 0;padding-bottom:0">
    <h3 style="text-align: center;">Latihan</h3> <p style="text-align: center;">
    Dibawah ini adalah latihan yang sudah dihitung berdasarkan babnya, silahkan untuk di lihat agar mengetahui perkembangan anda<br><br></p>
    <a onclick="show_modal_latihan()" class="waves-effect waves-light btn primary-color">Selengkapnya</a> <br><br>    
    <div class="skill-area">
                
        <?php if ($topik== array()): ?>
          <h4 align="center">Tidak ada Grafik Workout.</h4>
        <?php else: ?>
   
        <?php foreach ($latihan  as $item) : 
        $persentasi = (int)$item['total_benar'] / (int)$item['total_soal'] * 100;
        $p = (int)$persentasi ;
        if ($p == null) { ?>
           

        <?php } else { ?>

        <?php if ($p == 0) { ?>

          <div class="progress" style="height: 20px; background-color: #ffffff ;">
              <div class="lead">
                  <a href="<?=base_url("linetopik/learningline/".$item['judulBab']) ?>"><?=$item['judulBab'] ?></a></div>
              <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%;  visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft; height: 20px; background-color: #f5f5f5 ;" data-progress="0" class="progress-bar wow fadeInLeft animated"></div><span>0%</span>
          </div>
                
        <?php } else {?>
          <div class="progress" style="height: 20px; background-color: #ffffff ;">
          <div class="lead">
            <a href="<?=base_url("linetopik/learningline/".$item['judulBab']) ?>"><?=$item['judulBab'] ?></a>
          </div>
          <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%; visibility: visible; animation-duration: 1.5s; animation-delay: 1.2s; animation-name: fadeInLeft; height: 20px; background-color: #19305B;" data-progress="<?=$p?>" class="progress-bar wow fadeInLeft animated"></div><span><?=$p?>%</span> 
          </div>
                <?php } 
                }?>
        <!-- End Skill Bar -->
        <?php endforeach ?>   
    <!-- End Skill Bar -->
    <?php endif ?>
                                                
    </div> 
    <hr class="divider-color">
  </div>
  </section>

  <section class="padding-section" style="padding-top: 0;margin-top: 0">
  <div class="grid-row clear-fix">
    <h3 style="text-align: center;">Grafik Tryout</h3>
    <p style="text-align: center;">Dibawah ini adalah grafik perkembangan TO kamu, jika nilaninya masih tidak memuaskan jangan khawatir pasti kamu bisa memperbaikinya dengan cara banyak mengikuti latihan. Tetap semangat! </p>
<!--     <label for="" class="">
      Filter Tryout : <select class="form-control tryout_select" name="tryout_select">
      <option value="">-- Cari Berdasarkan Tryout --</option>
    </select>
  </label> -->
  <div class="panel-body" >
    <div class="panel-body pt0" id="resizeble" style="height:430px">
      <div class="container" id="chartContainer" style="width:100%">

      </div>
    </div>      
  </div>
</div>  
</section>
<hr class="divider-big">


<section class="padding-section" style="padding-bottom: : 0;">
  <div class="grid-row clear-fix">
    <h3 style="margin:0; text-align: center;" >Recent Video</h3><p style="margin:0; text-align: center;">
    Nah, dibawah ini terdapat video terbaru loh, yuk coba tonton..
    <hr>  <br></p>

    <div id="filter">
            <!-- Swipeboox Contents -->
            <section id="image-filter">
            <?php foreach ($video as $item): ?>
              <div class="wrap small-width">
                <div data-pswp-uid="1" id="demo-gallery" class="demo-gallery">
                
                  <span></span>
                <?php $url =  base_url()."video/seevideo/".$item['videoid']?>
                <a href="<?=$url ?>" class="swipebox mix category-1 no-smoothState"></a>
              </div>
              
                <?php if (!empty($item['link'])): ?>
                  <iframe  width="250" src="<?=$item['link'] ?>"></iframe>
                <?php endif ?>
              
                  
                </div>
              </div>
              <?php endforeach ?>

            </section> <!-- End of Swipebox Contents -->
            
          </div>

    <div class="grid-col-row clear-fix" >
      <?php foreach ($video as $item): ?>
        <div class="grid-col grid-col-3" >
          <div class=" portfolio-item" >
            <div class="picture">
              <div class="hover-effect"></div>
              <div class="link-cont">
                <span></span>
                <?php $url =  base_url()."video/seevideo/".$item['videoid']?>
                <a href="<?=$url ?>" class="cws-right fa fa-play"></a>
              </div>
              <center>
                <?php if (!empty($item['link'])): ?>
                  <iframe  width="250" src="<?=$item['link'] ?>"></iframe>
                <?php endif ?>
              </center>

            </div>
            <h3><?=$item['judulVideo'] ?></h3>
            <p><?=$item['deskripsi'] ?></p>
          </div>
        </div>
      <?php endforeach ?>


    </div>
    <hr class="divider-color">  

  </div>
</section>





          

        
</div> <!-- End of Main Contents -->

      
         
 

<script src="<?php echo base_url('assetsnew/plugins/jquery.barfiller.js')?>"></script>
<script src="<?= base_url('assetsnew/plugins/canvasjs.min.js') ?>"></script>


<!-- LOAD GRAFIK PERSENTASE TO -->
<script type="text/javascript">
var base_url = "<?php echo base_url();?>" ;

  $.getJSON(base_url+"tryout/report_to", function(data) {
    load_grafik(data);
  });

  function load_grafik(data){
    var chart = new CanvasJS.Chart("chartContainer", {
    //   title:{
    //     text:"Grafik Perkembangan Paket Tryout"        
    // },
    theme: "theme1",
    animationEnabled: true,
    axisX:{
      interval: 1,
      gridThickness: 0,
      labelFontSize: 10,
      labelFontStyle: "normal",
      labelFontWeight: "normal",
      labelFontFamily: "Lucida Sans Unicode"
    },
    data: [
    {     
      type: "column",
      name: "companies",
      axisYType: "secondary",   
      dataPoints: data
    }

    ]
  });
    chart.render();
  }
</script>
<!-- FILTER PENCARIAN TO -->
<script type="text/javascript">
  $.getJSON(base_url+"siswa/get_tryout_for_select", function(data) {
    $('.tryout_select').html('<option value="">-- Cari Berdasarkan Tryout --</option>');
    $.each(data, function (i, data) {
      $('.tryout_select').append("<option value='" + data.id_tryout + "'>" + data.nm_tryout + "</option>");
    });
  });

// KETIKA BAB CHANGE, LOOAD GRAFIK
$('.tryout_select').change(function () {
  id_to = $(this).val();
  if (id_to!="") {
    $.getJSON(base_url+"siswa/persentase_json/"+id_to, function(data) {
      load_grafik(data);
    });
  }else{
    $.getJSON(base_url+"siswa/persentase_json/", function(data) {
      load_grafik(data);
    });
  }
});
</script>
<script type="text/javascript">
  function show_modal_latihan() {
    $('#latihan_persentase').modal('show');
  }

  function show_modal_learning() {
    $('#learning_persentase').modal('show');
  }
</script>

