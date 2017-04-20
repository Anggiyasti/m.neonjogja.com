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
    background: url(https://www.thebuddhistchef.com/wp-content/themes/culinier-theme/images/loader.gif) center no-repeat #fff;
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
                        <img src="<?= base_url('assets/back/img/logo.png') ?>" width="70px"  alt>
                        <p class="title font-alt">Tryout Online 
                        </p>
                        <?php foreach ($topaket as $key): ?>
                        <div class="text-center"><div style="font-size:20px;"><?= $key['namato'] ?>/<?= $key['namapa'] ?></div></div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="panel-heading">
                            <div class="row">
                                <!--<div class="text-center"><h4>Lembar Jawaban</h4></div>-->
                                <div class="text-center"> <h4><span id="timer"></span></h4></div>
                                <input type="text" hidden="true" id="durasi" value="" name="durasi" />
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
                    <form action="<?= base_url('index.php/tryout/cekjawaban') ?>" method="post" id="hasil">
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
                                                <div class="panel-collapse">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-1 text-right">
                                                                <p><h4><?= $i ?>.</h4></p>
                                                            </div>
                                                            <div class="col-md-11">
                                                                <?php if (!empty($key['gambar'])) { ?>       
                                                                <img src="<?= base_url('./assets/image/soal/' . $key['gambar']) ?>">   
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
                                                                ?>

                                                                <?php foreach ($pil as $row): ?>
                                                                <?php if ($row['pilid'] == $k) { ?>
                                                                <div class="mb10">
                                                                    <!-- <label id="pil[<?= $row['pilid']; ?>]" onclick="changeColor('pil[<?= $row['pilid']; ?>]')" style="border:1px solid #63d3e9; padding: 5px;width:100% "> -->
                                                                    <label id="<?=$key['soalid'].$indexpil;?>" onclick="changeColor('<?=$key['soalid'].$indexpil;?>',<?=$key['soalid']?>)" alt="<?=$key['soalid'];?>" style="border:1px solid #63d3e9; padding: 5px;width:100% ">
                                                                        <input type="radio" id="<?= $i ?>" value="<?= $row['pilpil'].$pilihan[$indexpil]; ?>" name="pil[<?= $row['pilid']; ?>]" onclick="updateColor(<?= $i ?>)">
                                                                        <div class ="btn"><?=  $pilihan[$indexpil];?>.
                                                                        </div>
                                                                        <?php
                                                                        if (empty($row['pilgam'])) {
                                                                            echo '';
                                                                        } else {
                                                                            ?>
                                                                            <img src="<?= base_url('./assets/image/jawaban/' . $row['pilgam']) ?>">
                                                                            <?php } ?>
                                                                            <?= $row['piljaw'] ?>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default" style="">
                                                    <div class="panel-body">                                                    
                                                        <div class="row">
                                                           <!-- <div class="col-md-6 center"></div> -->
                                                           <div class="col-sm-12">
                                                           <div class="form-group">
                                                                <a href="javascript:toggleDiv('myContent');"  align="center" class="btn btn-info btn-block" style="background-color: #2196F3;" id="jawaban">
                                                                Jawaban</a>
                                                            </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <a class="btn btn-info btn-block" style="background-color: #2196F3;" align="center"  onclick="bataljawab('pil[<?= $key['soalid']?>]','<?=$i?>',<?= $key['soalid']?>)">
                                                                Batal Jawab</a>
                                                            </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <a href="#" class="btn btn-info btn-block" style="background-color: #2196F3;" align="center" onclick="raguColor(<?= $i ?>)">Ragu Ragu</a>
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
                            <div class="panel panel-default"  style="min-height:170px;" id="myContent" hidden="true">
                                     
                                    <!--panel body with collapse capabale--> 
                                    <div class="panel-collapse">
                                        <div class="panel-body">
                                    
                                                    <div class="col-md-10 col-md-offset-1">
                                                        <!--<li class="pageNumbers"></li>-->
                                                        <div class="ljk" style="margin-top:-20">
                                                        <?php
                                                        $nojwb = 1;
                                                        foreach ($soal as $jwb) {
                                                            ?>
                                                            <div id ="flex-item" >
                                                                <div id ="jwb_sisJ" class ="jwb<?= $nojwb ?>"></div>
                                                                <a href ="#" id ="nom_sisS" class ="go_slide btn" style ="border:1px solid #63d3e9" alt="<?= $nojwb ?>"><?= $nojwb ?></a>
                                                            </div>
                                                            <?php
                                                            $nojwb++;
                                                        }
                                                        ?>
                                                        </div>

                                                    </div>
                                                    <!--</ul>-->  

                                                <div class="clear" style="clear:both"></div>

                                                <div class="col-md-12" style="">
                                                    <hr> 
                                                    <button type="button" class="btn btn-info btn-block" style="background-color: #2196F3;" onclick="kirimHasil();deleteAllCookies('seconds', 'minutes', 'hours');">Kumpulkan Jawaban</button>
                                                </div>
                                        </div>
                                        <div></div> 
                                        <!--/ panel body with collapse capabale--> 
                                    </div>
                                    <!--/ END panel--> 
                                </div>
                                <div class="row">
                                    <div class="col-md-6 center"></div>
                                    <div class="col-md-2"></div>
                                        <div class="col-md-8 text-right"> 
                                            <button class="btn btn-info" style="background-color: #2196F3;" id="btnPrev"><<</button>
                                            <button class="btn btn-info" style="background-color: #2196F3;" id="btnNext">>></button>
                                        </div>
                                    </div>
                        </ul>

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
<script>
function updateColor(id) {
    $(".jwb" + id).html($('input[id="' + id + '"]:checked').val()[1]);
    $('a[alt="' + id + '"]').css({"background-color": "#5bc0de", "color": "#fff", "border": "none"});
}

function raguColor(id) {
    $('a[alt="' + id + '"]').css({"background-color": "#ffd66a", "color": "#fff", "border": "none"});
}


function bataljawab(idsoal,idpil,grouppil){
 clearRadioGroup(idsoal);
 clearpiljaw(idpil,grouppil);
}


function clearRadioGroup(GroupName)
{
  var ele = document.getElementsByName(GroupName);
  for(var i=0;i<ele.length;i++)
    ele[i].checked = false;
}

function clearpiljaw(id,groupname){
    $(".jwb" + id).html("");
    $('a[alt="' + id + '"]').css({"background-color": "#fff", "color": "#00b1e1", "border": "1px solid #63d3e9"});
    $('label[alt="' + groupname + '"]').removeClass( "terpilih" );
}

function changeColor(pilid,groupname){
    console.log(pilid,groupname);
    $('label[alt="' + groupname + '"]').removeClass( "terpilih" );
    var d = document.getElementById(pilid);
    d.className = "terpilih";
}
function toggleDiv(divId) {
   $("#"+divId).toggle();
}

// loading screen on load
    $(window).load(function() {
        $(".se-pre-con").fadeOut("slow");;
    });
// loading screen on load
</script>
