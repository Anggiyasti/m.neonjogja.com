 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Tryout</span>
        </div>

         <!-- Profile Content -->
        <div class=" delay-1">
          <div class="card  delay-2">
            <h3 class="uppercase">Score {nama_paket}</h3>
            <!-- START Row -->
           <div class="row">
            <?php foreach ($paket_dikerjakan as $reportitem): ?>
            <?php endforeach ?>
            <div class="chart">
              <div id="chartContainer" style="height: 200px;padding-top: 0px;">
              </div>
            </div>
            <div>
                <h4>Nilai : <?=$nilai?></h4>
            </div>
          </div>
          </div>

        </div>




<script src="<?= base_url('assetsnew/plugins/canvasjs.min.js') ?>"></script>
<script type="text/javascript">
    window.onload = function($) {
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
                                    {y: data.jmlh_benar, indexLabel: "Benar {y}"},
                                    {y: data.jmlh_salah, indexLabel: "Salah {y}"},
                                    {y: data.jmlh_kosong, indexLabel: "Kosong {y}"}

                                ]

                            }

                        ]

                    });

                    chart.render();

    }(jQuery);
</script>
