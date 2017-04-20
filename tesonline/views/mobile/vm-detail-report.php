  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <style type="text/css">
        .chart {
            height: 400px; 
            width: 100%;
            color: green;
        }
    </style>        
      <!-- Page Content -->
      <div id="content" class="page">
      
        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Report Workout</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        <!-- Article Content -->
<div class="row">
              <div class="col s12">
            <!-- With Left Icon -->
          <h4 class="uppercase" align="center">Report Detail</h4>
          <?php if ($report == array()): ?>
            <h3>Tidak ada Report Latihan.</h3>
            <?php else: ?>
                    <?php foreach ($report as $reportitem): ?>
                    
                      <div class="activity animated fadeinright delay-1">
                <ul class="course-feature" style="margin-top: 0;">
                  <li>Nama Latihan&nbsp&nbsp&nbsp:&nbsp<?= $reportitem['nm_latihan'] ?></li>
                  
                  <li>Score&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $reportitem['skore'] ?></li>
                </ul>
              </div>
                    <?php endforeach ?>
            <?php endif ?>
            <div class="chart">
              <div id="chartContainer" style="height: 200px;padding-top: 0px;">
              </div>
            </div>
          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->
      <script src="<?= base_url('assetsnew/js/canvasjs.min.js') ?>"></script>
<script type="text/javascript">

    window.onload = function() {
                    var data      = <?php echo json_encode($reportitem,JSON_NUMERIC_CHECK);?>;
                    var report = {
                        durasi: 0,
                        level: 0,
                        poin: 0,
                        konstanta: 0,
                        score: 0};



                    //report.durasi = 10;
                    report.jumlah_soal = parseInt(data.jumlahSoal);
                    report.level = parseInt(data.tingkatKesulitan);
                    report.poin = parseInt(data.jmlh_benar);
                    //report.konstanta =  report.durasi * report.jumlah_soal;
                    report.score = data.jmlh_benar;
                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "theme1",
                        backgroundColor: "white",
                        data: [
                            {
                                type: "doughnut",
                                indexLabelFontFamily: "Garamond",
                                indexLabelFontSize: 20,
                                startAngle: 0,
                                indexLabelFontColor: "black",
                                indexLabelLineColor: "darkgrey",
                                toolTipContent: "Jumlah : {y} ",
                                dataPoints: [
                                    {y: data.jmlh_benar, indexLabel: "Poin {y}"},
                                    {y: data.jmlh_salah, indexLabel: "Salah {y}"},
                                    {y: data.jmlh_kosong, indexLabel: "Kosong {y}"}

                                ]

                            }

                        ]

                    });

                    chart.render();

                }

</script>



    
    <script src="<?= base_url('assetsnew/js/jquery-2.1.0.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/jquery.swipebox.min.js') ?>"></script>   
    <script src="<?= base_url('assetsnew/js/materialize.min.js') ?>"></script> 
    <script src="<?= base_url('assetsnew/js/swiper.min.js') ?>"></script>  
    <script src="<?= base_url('assetsnew/js/jquery.mixitup.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/jquery.smoothState.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/masonry.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/chart.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/functions.js') ?>"></script>
  </body>
</html>


