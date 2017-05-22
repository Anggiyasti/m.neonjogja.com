<style>
    #jwb_sisJ {
        border-radius: 12px;
        /*background: #fff;*/
        padding: 2px 4px 2px 4px; 
        width: 20px;
        height: 20px;
        color : #06C;
        font-size: 12px;
        text-align: center;
        text-decoration: none;
        border: 1px solid #63d3e9; 
        margin-left: 27px;
        margin-top: 4px;
    }

    #flex-item {
        float:left;
        width: 48px;
        height: 48px;
        /*margin: 1px;*/
        padding: 2px;
        margin-top: 12px; 

    }


    #lihatStatus{
        /*position: fixed;*/
        /*top: 0;*/
        /*left: 10px;*/
        /*z-index: 99;*/
        /*border-bottom: 1px solid #ddd;*/
        min-width: 10%;
        /*padding: 9px;*/
        /*background-color: #fff;*/
        /*border: 1px solid #555;*/
    }
    #lihat{
        margin: 5px;
    }
    #kotak{
        width: 30px;
        height: 30px;
        border: 1px solid aqua;
        margin: 5px;
        float: left;
        padding: 5px;
        /*position: absolute;*/
    }

    label > input{ /* HIDE RADIO */
      visibility: hidden;  
      position: absolute; /* Remove input from document flow */
    }

    label:hover{ /* HIDE RADIO */
      background-color: #63d3e9;
    }

    .terpilih{
        background-color: #63d3e9;
    }
    
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(http://www.thebuddhistchef.com/wp-content/themes/culinier-theme/images/loader.gif) center no-repeat #fff;
    }

</style>
<!-- START Body -->

<body class="bgcolor-white">
    <div class="se-pre-con"></div>
    <!-- START Template Main -->
    <script src="<?= base_url('assetsnew/js/bjqs-1.10.js') ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#my-slideshow').bjqs({
//                'height': 400,
                // 'width': 600,
                // 'responsive': false
            });
        });
    </script>
    <section id="main" role="main">
        <!-- START page header -->
        <section class="page-header page-header-block nm" style="">
            <!-- pattern -->
            <!--/ pattern -->
            <div class="container pt15 pb15">
                <div class="">
                    <div class="page-header-section text-center">
                        <img src="http://neonjogja.com/assets/back/img/logo.png" width="70px"  alt>
                        <p class="title font-alt">Latihan Online 
                        </p>
                        
                    </div>
                </div>
            </div>
        </section>

        <!--/ END page header -->

        <!-- START Register Content -->
        <section class="section bgcolor-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form  id="hasil">
                            <div class="col-md-8" style="margin-bottom:30">
                                <?php
                                $i = 1;
                                $nosoal = 1;
                                ?>
                                <div id="my-slideshow" style="">
                                    <ul class="bjqs" style="display: block;list-style: none">
                                        <?php foreach ($soal as $key): ?>
                                            <li class="bjqs-slide" style="display: none;">
                                                <div class="">
                                                    <div class="panel panel-default" style="">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                            <div class="col-md-6 center"></div>
                                                                <div class="col-md-6 text-right" style="margin-top:0;"><?php if ($this->session->userdata('HAKAKSES')=='ortu'): ?>
                                                                <a href="<?= base_url("tesonline/daftarlatihan")?>" class="btn btn-info btn-block" >Pembahasan Selesai</a>
                                                            <?php else: ?>
                                                                <a href="<?= base_url() ?>index.php/tesonline/daftarreport/<?=$key['tingkatID']?>" class="btn btn-info btn-block" >Pembahasan Selesai</a>
                                                                    
                                                                <?php endif ?>

                                                                </div>
                                                            </div>

                                                            
                                                        </div>
                                                        <div class="panel-collapse">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-1 text-right">
                                                                        <p><h4><?= $i ?>.</h4></p>
                                                                    </div>
                                                                    <div class="col-md-11">
                                                                        <?php if (!empty($key['gambar'])) { ?>       
                                                                            <img src="http://neonjogja.com/assets/image/soal/<?=$key['gambar'] ?>">   
                                                                        <?php } ?>
                                                                        <h5><?= $key['soal'] ?></h5>
                                                                        <br>
                                                                    </div>  
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-10 col-md-offset-1">
                                                                        <?php
                                                                        $k = $key['soalid'];
                                                                        $pilihan = array("A", "B", "C", "D", "E");
                                                                        $indexpil = 0;

                                                                        $jawaban = $key['jaw'];
                                                                        ?>

                                                                        <?php foreach ($pil as $row): ?>
                                                                            <?php if ($row['pilid'] == $k) { ?>
                                                                                <div class="mb10">
                                                                                        <!-- <label id="pil[<?= $row['pilid']; ?>]" onclick="changeColor('pil[<?= $row['pilid']; ?>]')" style="border:1px solid #63d3e9; padding: 5px;width:100% "> -->
                                                                                         <label id="pil[<?= $row['pilid']; ?>]" onclick="changeColor('pil[<?= $row['pilid']; ?>]')" style="border:1px solid #63d3e9; padding: 5px;width:100%; <?php 
                                                                                                if ($jawaban == $row['pilpil']) {
                                                                                                    echo "background-color:#63d3e9";
                                                                                                }else{

                                                                                                }
                                                                                            ?>">
                                                                                            <input type="radio" id="<?= $i ?>" value="<?= $row['pilpil'].$pilihan[$indexpil]; ?>" name="pil[<?= $row['pilid']; ?>]" onclick="updateColor(<?= $i ?>)">
                                                                                            <div class ="btn"><?=  $pilihan[$indexpil];?>.
                                                                                            </div>
                                                                                             <?php
                                                                                            if (empty($row['pilgam'])) {
                                                                                            echo '';
                                                                                            } else {
                                                                                            ?>
                                                                                            <img src="http://neonjogja.com/assets/image/soal/<?=$row['pilgam']?>">
                                                                                            <?php } ?>
                                                                                            <?= $row['piljaw'] ?>
                                                                                             <?php 
                                                                                                if ($jawaban == $row['pilpil']) {
                                                                                                    echo "&nbsp&nbsp&nbsp&nbsp<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
                                                                                                }else{

                                                                                                }
                                                                                            ?>
                                                                                            <?php $indexpil++;?>
                                                                                        </label>  
                                                                                </div>
                                                                                <?php
                                                                            } else {
                                                                                // $indexpil=0;
                                                                            }
                                                                            ?>
                                                                        <?php endforeach ?>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">      
                                                                    <div class="col-md-10 col-md-offset-1">
                                                                        <?php
                                                                            // if ($key['status_pembahasan'] == 0) {
                                                                            if ($key['gambar_pembahasan'] == null && $key['pembahasan'] == null && $key['video_pembahasan'] == null && $key['link'] == null) {
                                                                                echo "<h5><strong>Tidak ada pembahasan pada soal ini</strong></h5>";
                                                                            }else{
                                                                                echo "<h5><strong>Pembahasan :</strong></h5>";
                                                                            }
                                                                        ?>
                                                                    </div>

                                                                    <?php
                                                                            // if ($key['status_pembahasan'] == 1) { 
                                                                            if ($key['gambar_pembahasan'] != null || $key['pembahasan'] != null || $key['video_pembahasan'] != null || $key['link'] != null) {
                                                                    ?>
                                                                                <div class="col-md-10 col-md-offset-1" style="border: 1px solid #63d3e9;min-height: 100px;padding:10px;text-align:justify">
                                                                            <?php 
                                                                                if ($key['gambar_pembahasan'] != null) { ?>
                                                                            
                                                                                    <!-- echo '<p>'.$key['gambar_pembahasan'].'</p>'; -->
                                                                                    <img src="http://neonjogja.com/assets/image/pembahasan/<?=$key['gambar_pembahasan']?>" width=100% >
                                                                            <?php
                                                                                }

                                                                                if ($key['pembahasan'] != null) {
                                                                                    echo '<p>'.$key['pembahasan'].'</p>';
                                                                                }

                                                                                if ($key['video_pembahasan'] != null) { ?>
                                                                                    <video width=100% controls>
                                                                                        <source src="http://neonjogja.com/assets/video/<?=$key['video_pembahasan']?>" type="video/mp4">
                                                                                    </video>
                                                                            <?php
                                                                                }
                                                                                if ($key['link'] != null) {
                                                                                    echo '<iframe width=100% height="430" src="'.$key['link'].'"></iframe>';
                                                                                }

                                                                                
                                                                            ?>
                                                                            
                                                                            
                                                                        </div>
                                                                            <?php
                                                                            }
                                                                    ?>
                                                                    <!-- <div class="row"> -->
                                                                        
                                                                    <!-- </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php
                                            $i++;
                                            $nosoal++;
                                            ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 center"></div>
                                    <div class="col-md-2"></div>
                                        <div class="col-md-8 text-right"> 
                                            <button class="btn btn-info" style="background-color: #2196F3;" id="btnPrev"><<</button>
                                            <button class="btn btn-info" style="background-color: #2196F3;" id="btnNext">>></button>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <!--/ END Register Content -->

        <!-- START To Top Scroller -->

        <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>

        <!--/ END To Top Scroller -->

    </section>
    <!--/ END Template Main -->
          <script type="text/javascript">
        // loading screen on load
            $(window).load(function() {
                $(".se-pre-con").fadeOut("slow");;
            });
        // loading screen on load
      </script>