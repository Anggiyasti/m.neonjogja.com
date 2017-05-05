<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Automplate -->
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<link rel="stylesheet" type="text/css" href="<?= base_url('assetsnew/css/pagination.css') ?>">
<!-- /Automplate -->
 <style type="text/css">
  .komen {
    width:80%;
    margin-left: 120px;
  }
  .komen img{
    width: 10%;
  }
  .komen li{
    margin: 0;
    padding: 0;
    line-height:1.5;
  }
  .baru {
    padding-top: 60px;
  }
 </style>
<!-- START Blog Content -->


   <div id="content" class="page">
      <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Konsultasi</span>
        </div>

        <!-- Hero Header -->
        <div class="h-banner animated fadeindown red lighten-1">
          <div class="parallax bg-profile">
          </div>
            <div class="banner-title">{judul_header}</div>
          </div>

          <!-- delay-1 -->
          <div class=" delay-1">

            <!-- delay-2 -->
            <div class="card  delay-2">
              <!-- START Row -->
              <div class="row">
              <b>Filter Pertanyaan</b>
                <form class="form-group">
                  <div>
                    <select class="col s12 browser-default" name="mapel" id="mapelSelect">
                      <option value=0>-Pilih Matapelajaran-</option>
                      <?php foreach ($mapel as $mapel_item): ?>
                        <option value=<?=$mapel_item['tingpelID'] ?>><?=$mapel_item['napel'] ?></option>  
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="baru">
                    <select class="col s12 browser-default" name="tingkat" id="babSelect"  ><option value=0>-Pilih Bab-</option></select>
                  </div>
                  <div class="baru">
                    <a class="col s12 btn accent-color-baru waves-effect waves-light buat-btn"><i class="ion-plus-round"></i>Buat</a>
                  </div>
                  <div class="baru">
                    <a class="col s12 btn accent-color-baru waves-effect waves-light cari-btn"><i class="ion-search"></i>Cari</a>
                  </div>
                </form>
              </div>
              <!-- END ROW -->
            </div>
            <!-- end delay-2 -->

            <!-- delay-2 -->
            <div class="card  delay-2">
              <!-- START Row -->
              <div class="row">
              <b>Pencarian Pertanyaan</b>
                <form class="form-group">
                  <div>
                    <select class="col s12 browser-default" name="" id="" onchange="location = this.value";>
                      <option value="<?=base_url('konsultasi/pertanyaan_ku') ?>"  class="center-text">Pertanyaan Saya</option>
                      <option value="<?=base_url('konsultasi/pertanyaan_all')?>">Semua Pertanyaan</option>
                      <option selected value="<?=base_url('konsultasi/pertanyaan_grade')?>">Pertanyaan Setingkat</option>
                      <option value="<?=base_url('konsultasi/pertanyaan_mento')?>r">Pertanyaan Sementor</option>
                    </select>
                  </div>
                  <div class="baru">
                    <input type="text" placeholder="Cari pertanyaan lalu enter" name="cari" id="search1">
                    <a class="col s12 btn accent-color-baru waves-effect waves-light" href="<?=base_url('konsultasi/pertanyaan_grade') ?>"><i class="fa fa-times"></i> Reset</a>
                  </div>
                </form>
              </div>
              <!-- END ROW -->
            </div>
            <!-- end delay-2 -->

            <!-- delay-2 -->
            <div class="card  delay-2">
              <!-- START Row -->
              <div class="row">
                <!-- Comments -->
                <div class="comments">
                  <ul class="comments-list">
                   <!-- semua -->
                  <?php if ($my_questions): ?>
                    <?php foreach ($my_questions as $question): ?>
                    <li>
                      <img src="<?=base_url("assetsnew/image/photo/siswa/".$question['photo'])?>" data-at2x="<?=base_url("assetsnew/image/photo/siswa/".$question['photo'])?>" alt="" class="avatar circle">
                      <div class="comment-body">
                        <span class="author uppercase"><?=$question['namaDepan']." ".$question['namaBelakang'] ?></span>
                        <span class="date"><?=$question['date_created'] ?></span>
                        <span>
                          <blockquote class="primary-border">
                            <a href="<?=base_url('konsultasi/singlekonsultasi/') ?><?=$question['pertanyaanID'] ?>">
                              <?=$question['judulPertanyaan'] ?><span title="waktu dibuat"> (<?=$question['date_created'] ?>)</span>
                            </a>
                          </blockquote>
                        </span>
                        <p> <?=$question['isiPertanyaan'] ?></p> <br>
                        <div style="text-align: right">
                          <a href="<?=base_url('konsultasi/filter/'.str_replace(' ', '_', $question['namaMataPelajaran']).'/all') ?>">
                            <i class="ion-pricetag"></i> <?=$question['namaMataPelajaran'] ?></a> |
                          <a href="<?=base_url('konsultasi/filter/'.str_replace(' ', '_', $question['namaMataPelajaran']).'/'.str_replace(' ', '_', $question['judulBab'])) ?>">
                            <i class="ion-outlet"></i> <?=$question['judulBab'] ?></a> |
                          <span><i class="ion-edit"></i> <?=$question['jumlah'] ?></span> |
                          <?php if (!empty($question['namaGuru'])): ?>
                            <span><i class="fa fa-search"></i> <?=$question['namaGuru'] ?></span>
                          <?php else: ?>
                            <span>Tanpa Mentor</span>
                          <?php endif ?>
                        </div>
                      </div>
                    </li>
                    <?php endforeach ?>
                  </ul>
                  <?php else: ?>
                    <h3>Tidak Ada Pertanyaan</h3>
                  <?php endif ?>
                  <div>
                    <div class="page-pagination clear-fix" style="width:100%;">
                      <center><?php echo $links; ?></center>  
                    </div>
                  </div>

                </div>
                <!-- comment -->
              </div> 
              <!-- end row -->
            </div>
            <!-- end delay-2 -->

          </div>
          <!-- end delay-1 -->
 <script type="text/javascript">
  function showmodal(){
    $('#myModal').modal('show');
  }

 </script>
 <!-- on keypres cari soal -->
 <script type="text/javascript">
  $("#search1").on('keyup', function (e) {
    if (e.keyCode == 13) {
      keyword = $('#search1').val().replace(/ /g,"-");    ;
      document.location = base_url+"konsultasi/pertanyaan_grade_search/"+keyword;
    }
  });

  $('.cari-btn').click(function(){
    var mapel= $('#mapelSelect').find(":selected").text().replace(/ /g,"_");
    var bab= $('#babSelect').find(":selected").text().replace(/ /g,"_");

    console.log(mapel);
    if (mapel == 'Pilih_Mata_Pelajaran') {
      sweetAlert("Oops...", "Silahkan Pilih Pelajaran Atau Bab Terlebih Dahulu", "error");
    }else{
      if (mapel!='Pilih Mata Pelajaran' && bab=='Bab Pelajaran') {
        document.location = base_url+"konsultasi/filter_grade/"+mapel+"all";
      }else if(bab!='Bab Pelajaran'){
        document.location = base_url+"konsultasi/filter_grade/"+mapel+"/"+bab;
      }
    }
  });
 </script>
