<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="<?= base_url('assetsnew/css/pagination.css') ?>">

<!-- START Blog Content -->


   <div id="content" class="page">
      <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Tryout</span>
        </div>

        <!-- Hero Header -->
        <div class="h-banner animated fadeindown red lighten-1">
          <div class="parallax bg-profile">
          </div>
            <div class="banner-title">Tryout - <?=$nama_to?></div>
          </div>
          <div class=" delay-1">
            <div class="card  delay-2">
              <!-- START Row -->
              <div class="row">
                <h4>Daftar Paket TO yang Belum Dikerjakan</h4>
                <?php if ($paket==array()): ?>
                  <h5>Belum ada paket Try Out.</h5>
                <?php else: ?>
                  <h5>Status TO : <?php   echo $status_to; ?></h5>
                  <?php foreach ($paket as $paketitem):?>
                    <ul>
                      <li>Nama Paket Soal : <?=$paketitem['nm_paket'] ?></li>
                      <li>Status : Belum Dikerjakan</li>
                      <li>
                        <?php if ($status_to=='doing'): ?>
                         <a onclick="kerjakan(<?=$paketitem['id_paket']?>)" 
                           class="btn btn-success border-radius modal-on<?=$paketitem['id_paket']?>"
                           data-todo='<?=json_encode($paketitem)?>'><i class="ion-edit"></i></a>
                         <?php elseif ($status_to=='done'): ?>
                           <a onclick="habis()" disable
                           class="btn btn-danger border-radius modal-on<?=$paketitem['id_paket']?>"
                           data-todo='<?=json_encode($paketitem)?>'><i class="ion-close-round"></i></a>
                         <?php else: ?>
                          <a onclick="forbiden()" disable
                          class="btn btn-danger border-radius modal-on<?=$paketitem['id_paket']?>"
                          data-todo='<?=json_encode($paketitem)?>'><i class="ion-close-round"></i></a>
                        <?php endif ?>
                      </li>
                    </ul>
                  <?php endforeach ?>
                <?php endif ?>
                <div class="grid-col-row clear-fix">
                  <center>
                    <div class="page-pagination clear-fix margin-none" style="width: 100%;">
                      <?php echo $links; ?>
                    </div>
                  </center>
                </div>
              </div>
              <!-- END ROW -->
            </div>
          </div>

          <div class=" delay-1">
            <div class="card  delay-2">
              <!-- START ROW -->
              <div class="row">
                <h4>Paket Soal yang Sudah Dikerjakan</h4>
                <?php if($paket_dikerjakan==array()): ?>
                  <h5>Tidak ada paket soal.</h5>
                <?php else: ?>
                  <?php foreach ($paket_dikerjakan as $paketitem): ?>
                    <ul>
                      <li>Nama Paket Soal : <?=$paketitem['nm_paket'] ?></li>
                      <li>
                        <a href="<?= base_url() ?>tryout/Score/<?=$paketitem['id_paket']?>"
                          class="btn btn-primary modal-on<?=$paketitem['id_paket']?>"
                          data-todo='<?=json_encode($paketitem)?>' title="Lihat Score"><i class="ion-android-list"></i></a>
                        <?php if ($status_to=="done"): ?>
                          <a onclick="pembahasanto(<?=$paketitem['id_paket']?>)" 
                            class="btn btn-primary"
                            data-todo='<?=json_encode($paketitem)?>' title="Pembahasan"><i class="ion-ios-paper"></i></a>
                        <?php endif ?>
                      </li>
                    </ul>
                  <?php endforeach ?>
                <?php endif ?>

                <div class="grid-col-row clear-fix">
                  <center>
                    <div class="page-pagination clear-fix margin-none" style="width: 100%;">
                      <?php echo $links; ?>
                    </div>
                  </center>
                </div>
                
              </div>
              <!-- END ROW -->
            </div>
          </div>


<!--/ END Blog Content -->

<script type="text/javascript"> 



  function kerjakan(id_to){
    var kelas = ".modal-on"+id_to;
    var data_to = $(kelas).data('todo');
    url = base_url+"index.php/tryout/buatto";
    console.log(data_to);

    var datas = {
      id_paket:data_to.id_paket,
      id_tryout:data_to.id_tryout,
      id_mm_tryoutpaket:data_to.mmid
    }

    $.ajax({
      url : url,
      type: "POST",
      data: datas,
      dataType: "TEXT",
      success: function(data)
      {
       window.location.href = base_url + "index.php/tryout/mulaitest";
     },

     error: function (jqXHR, textStatus, errorThrown)

     {

      console.log("gagal");

    }

  });
  }

  function pembahasanto(id_to){

    var kelas = ".modal-on"+id_to;

    var data_to = $(kelas).data('todo');

    url = base_url+"index.php/tryout/buatpembahasan";



    

    var datas = {

      id_paket:data_to.id_paket,

      id_tryout:data_to.id_tryout,

      id_mm_tryoutpaket:data_to.id

    }



    $.ajax({

      url : url,

      type: "POST",

      data: datas,

      dataType: "TEXT",

      success: function(data)

      {

       window.location.href = base_url + "index.php/tryout/mulaipembahasan";

     },

     error: function (jqXHR, textStatus, errorThrown)

     {

      swal("gagal");

    }

  });
  }


  

function show_report(){

  $('#myModal2').modal('show');

  $('#myModal2 modal-title').text('Report Latihan');

}

function forbiden(){
  swal('Maaf, to belum bisa di kerjakan!');
}

function habis(){
  swal('Waktu pengerjaan to sudah habis!, anda tidak dapat mengerjakan to.');
}
</script>

