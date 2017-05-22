<script src="http://code.jquery.com/jquery-3.1.0.slim.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assetsnew/stylesheet/style.css')?>"> 
 <link rel="stylesheet" type="text/css" href="<?= base_url('assetsnew/css/pagination.css') ?>">
 <script src="<?= base_url('assetsnew/js/chart.min.js') ?>"></script>

<style type="text/css">
#baru{
  visibility: visible; 
  animation-duration: 1.5s; 
  animation-delay: 1.2s; 
  animation-name: fadeInLeft; 
  height: 20px; 
  background-color: lightblue ; 
  position: absolute; 
  top: 0; 
  left: 0; 
  bottom: 0; 
  right: 0;
  background-image: linear-gradient(-45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, 
  transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, 
                transparent);
  z-index: 1;
  background-size: 50px 50px;
  animation: move 2s linear infinite;
  
  overflow: hidden;

} 
table.tb > thead > tr > th{
  border: 1px solid black;
  text-align: center;
}
table.tb > tbody > tr > td{
  border: 1px solid black;
  text-align: center;

}


</style>

<!-- Modal Learning Line -->
        <div id="modalL" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4>Progres Learning Line</h4>
            <?php foreach ($learning as $row): ?>
              <?php  $persentasi = (int)$row['stepDone'] / (int)$row['jumlah_step'] * 100;?>
                 <div class="">
                    <ul>
                        <li>Nama Topik&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp<?= $row['namaTopik'] ?></li>
                        <li>Step Dikerjakan&nbsp&nbsp&nbsp:&nbsp <?=$row['stepDone']?> </li>
                        <li>Jumlah Step&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp <?=$row['jumlah_step']?> </li>
                        <li>Persentase &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp <?=(int)$persentasi?>% </li>
                    </ul>
                </div> 
                <hr>
                <?php endforeach ?>
                

          </div>


          <div class="modal-footer" style="background-color: #800000 ;">
            <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat primary-color">Batal</a>
          </div>
        </div>
      

        <!-- Modal Learning Line -->
        <div id="modalLatihan" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4>Pengembangan Latihan</h4>
            <?php foreach ($lat as $row): ?>
              <?php  $score = (int)$row['total_benar'] / (int)$row['total_soal'] * 100 ;?>
                 <div class="">
                    <ul>
                        <li>Nama Bab &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp<?= $row['judulBab'] ?></li>
                        <li>Jumlah Soal &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp <?=$row['total_soal']?> </li>
                        <li>Jumlah Benar &nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp <?=$row['total_benar']?> </li>
                        <li>Jumlah Salah &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp <?=$row['total_salah']?> </li>
                        <li>Jumlah Kosong &nbsp&nbsp:&nbsp <?=$row['total_kosong']?> </li>
                        <li>Persentase &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp <?=$score?> </li>
                    </ul>
                </div> 
                <hr>
                <?php endforeach ?>

          </div>

          <div class="modal-footer" style="background-color: #800000 ;">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat primary-color">Batal</a>
          </div>
        </div>
       



       <!-- Page Content -->
      <div id="content" class="page" style="min-height: 550px;">

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
          

       
<div class="form-group">
    <a href="javascript:toggleDiv('myPesan');" class="primary-color btn btn-info btn-block" style="text-align: left; background-color: #2196F3;" id="jawaban"><i class="ion-android-arrow-dropdown right"></i>
     PESAN</a>
    </div>
     <section>
     <div class="panel panel-default" style="min-height:170px;" id="myPesan" hidden="true">
     <div class=" delay-1">
          <div class="card delay-2">
    
            
            <ul class="comments-list">
            <div class="comments">
            
              <li>
              <?php foreach ($pesan as $key): ?>
                <img src="<?=base_url('assets/back/img/logo@2x2.png')?>" alt="" class="avatar circle"></i>
                
                <div class="comment-body">
                  <span class="author uppercase"><?=$key['jenis']?></span>
                  <?php if ($key['isi']== null): ?>
                  <p> {Tidak ada pesan}</p>
                <?php else: ?>
                  <p><?php $c = $key['isi']; echo substr($c, 0, 50) ?></p>
                  <?php endif ?>
                </div>
                  <?php endforeach ?>
              </li>

              </div>
            </ul>
          </div>
           </section>
           <br>


<div class="form-group">
    <a href="javascript:toggleDiv('myTopik');" class="primary-color btn btn-info btn-block" style="text-align: left; background-color: #2196F3;" id="jawaban"><i class="ion-android-arrow-dropdown right"></i>
     TOPIK YANG TELAH DIPELAJARI</a>
    </div>

<section class="padding-section" style="padding-top: 0;margin-top: 0; ">


   <div class="panel panel-default"  style="min-height:170px;" id="myTopik" hidden="true">
   <div class=" delay-1">
          <div class="card delay-2">

  <div class="grid-row clear-fix " style="padding-bottom: 0;padding-bottom:0">
  <?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
    
    Hi, <?=$this->session->userdata('USERNAME') ?> ! Dibawah ini adalah progress learning line dari <?=$sis?>!<br></p>
  <?php else: ?>
    
    Hi, <?=$this->session->userdata('USERNAME') ?> ! Dibawah ini adalah progress learning line kamu, silahkan lanjutkan untuk bisa menyelesaikan topik-topik yang disediakan. Tetap semangat!<br></p>

    
  <?php endif ?>

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

          <div class="progress" style="height: 20px; background-color: #C0C0C0; width: 95%;">
              <div class="lead">
                  <a href="#"><?=$item['namaTopik'] ?></a></div>
              <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%;" data-progress="0" class="progress-bar wow fadeInLeft animated" id="baru"></div><span>0%</span>
          </div>
                
        <?php } else {?>
          <div class="progress" style="height: 20px; background-color: #C0C0C0 ; width: 95%;">
          <div class="lead">
            <a href="#"><?=$item['namaTopik'] ?></a>
          </div>
          <div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%;" data-progress="<?=$p?>" class="progress-bar wow fadeInLeft animated " id="baru"></div><span><?=$p?>%</span> 
          </div>
                <?php } 
                }?>
        <!-- End Skill Bar -->
        <?php endforeach ?>   
    <!-- End Skill Bar -->
    <?php endif ?>
                                                
    </div>
    </div>   
  </div>
  </div>
   </div>
  </div>
 
</section>
<br>


<div class="form-group">
    <a href="javascript:toggleDiv('myLatihan');" class="primary-color btn btn-info btn-block" style="text-align: left; background-color: #2196F3;" id="jawaban"><i class="ion-android-arrow-dropdown right"></i>
     Latihan YANG TELAH DIPELAJARI</a>
    </div>

<section class="padding-section" style="padding-top: 0;margin-top: 0">
 <div class="panel panel-default"  style="min-height:170px;" id="myLatihan" hidden="true">
   <div class=" delay-1">
          <div class="card delay-2">
  <div class="grid-row clear-fix" style="padding-bottom: 0;padding-bottom:0">
  <?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
    
    Dibawah ini adalah latihan yang sudah dihitung berdasarkan babnya, silahkan untuk di lihat agar mengetahui perkembangan <?=$sis?><br></p>
    <?php else: ?>
      
    Dibawah ini adalah latihan yang sudah dihitung berdasarkan babnya, silahkan untuk di lihat agar mengetahui perkembangan and<br></p>
     <?php endif ?>

    <div style="margin-left: 10px;">
       
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

          <div class="progress" style="height: 20px; background-color: #C0C0C0 ; width: 95%;">
              <div class="lead" >
                  <a href="#"><?=$item['judulBab'] ?></a>
                                    </div>
                  
              <br><br><div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%; " data-progress="0" class="progress-bar wow fadeInLeft animated" id="baru"></div><span>0%</span>
          </div>
                
        <?php } else {?>
          <div class="progress" style="height: 20px; background-color: #C0C0C0 ; width: 95%;">
          <div class="lead">
            <a href="#" ><?=$item['judulBab'] ?></a> 
          
          </div>
          
          
          <br><br><div data-wow-delay="1.2s" data-wow-duration="1.5s" style="width: <?=$p?>%;" data-progress="<?=$p?>" class="progress-bar wow fadeInLeft animated" id="baru"></div><span><?=$p?>%</span> 
          </div>
                <?php } 
                }?>
        <!-- End Skill Bar -->
        <?php endforeach ?>   
    <!-- End Skill Bar -->
    <?php endif ?>
                                                
    </div> 
    
  </div>
  </div>
  </div> 
    
  </div>
  </div>
  </section>
  <br>




<div class="form-group">
    <a href="javascript:toggleDiv('myContent');" class="primary-color btn btn-info btn-block" style="text-align: left; background-color: #2196F3;" id="jawaban"><i class="ion-android-arrow-dropdown right"></i>
     REPORT TRYOUT</a>
    </div>

   
  
  <section>
  <div class="panel panel-default"  style="min-height:170px;" id="myContent" hidden="true">
    <div class=" delay-1">
          <div class="card delay-2">
    <table class="tb">
      <thead>
            <tr>
              <th >No</th>
              <th>Nama Tryout</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 0; ?>
          <?php foreach ($tryout as $row): ?>
            <?php 
            $sumBenar=$row ['jmlh_benar'];
            $sumSalah=$row ['jmlh_salah'];
            $sumKosong=$row ['jmlh_kosong'];
          
            //hitung jumlah soal
            $jumlahSoal=$sumBenar+$sumSalah+$sumKosong;
            $nilai=0;
            // cek jika pembagi 0
            if ($jumlahSoal != 0) {
                //hitung nilai
            $nilai=$sumBenar/$jumlahSoal*100; 
          }
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nm_tryout']; ?></td>
                    <td><?= $jumlahSoal?></td>
                </tr>

                                <?php endforeach ?>

          </tbody>

    </table>
    </div>
     </div>
      </div>
    

  </section><br>




 <!--  <section class="padding-section" style="padding-top: 0;margin-top: 0">
  <div class="grid-row clear-fix" style="padding-bottom: 0;padding-bottom:0">
    <h3 style="text-align: center;">Grafik Tryout</h3> <p style="text-align: center;">
    Dibawah ini adalah grafik perkembangan TO kamu, jika nilaninya masih tidak memuaskan jangan khawatir pasti kamu bisa memperbaikinya dengan cara banyak mengikuti latihan. Tetap semangat!<br><br></p> -->
<!--     <label for="" class="">
      Filter Tryout : <select class="form-control tryout_select" name="tryout_select">
      <option value="">-- Cari Berdasarkan Tryout --</option>
    </select>
  </label> -->
<!--   <div class="panel-body" >
    <div class="panel-body pt0" id="resizeble" style="height:430px">
      <div class="container" id="chartContainer" style="width:100%">

      </div>
    </div>      
  </div>
</div> 

</section><br>
<hr class="divider-big"> -->


  

<!-- <section class="padding-section" style="padding-bottom: : 0;">
  <div class="grid-row clear-fix">
    <h3 style="margin:0; text-align: center;" >Recent Video</h3><p style="margin:0; text-align: center;">
    Nah, dibawah ini terdapat video terbaru loh, yuk coba tonton..
   <br></p>
    <div class="p-20 animated fadeinup">
    <div id="filter"> -->
      <!-- Swipeboox Contents -->
            <!-- <section id="image-filter">
              <div class="wrap small-width">
                <div data-pswp-uid="1" id="demo-gallery" class="demo-gallery" style="text-align: center;">
                  <?php foreach ($video as $item): ?>
                    <?php $url =  base_url()."video/seevideo/".$item['videoid']?>
                    <?php if (!empty($item['link'])): ?>
                      <iframe  width="250" src="<?=$item['link'] ?>" allowfullscreen> </iframe>
                      <div><h4><?=$item['judulVideo'] ?></h4>
                      <p><?=$item['deskripsi'] ?></p></div>

                    

                    <?php endif ?>
                  <?php endforeach ?>
                  
                </div>

              </div>

            </section> --> <!-- End of Swipebox Contents -->
            
    </div>
    </div>
    

  </div>

</section>


 </div>





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




// function load_grafik(data) {
//   var chart = new CanvasJS.Chart("chartContainer",
//     {
//       title:{
//         text: "Grafik Perkembangan Paket Tryout"
//       },
//       data: [
//       {
//         type: "bar",
//         dataPoints: data
//       }
//       ]
//     });

// chart.render();
// }

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
  
  function toggleDiv(divId) {
   $("#"+divId).toggle(800);
}

 
</script>

