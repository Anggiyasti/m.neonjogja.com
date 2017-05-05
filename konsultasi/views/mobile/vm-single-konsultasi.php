<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/config.js') ?>"></script>

<script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/adapters/jquery.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('assetsnew/css/pagination.css') ?>">
<style type="text/css">

</style>
       <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Konsultasi</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-ios-search"></i>
          </div>
        </div>
        
        <!-- Main Content -->
  <!-- Modal Trigger -->

  <!-- Modal Structure -->
  <div id="myModal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="modal-header">Balas</h4>
      <p>
        <div class="row">
          <div class="input-field col s12" id="modal-body">
            
          </div>
        </div>
      </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="post-koment">Post</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Batal</a> 
    </div>
  </div>

   <!-- Modal Structure -->
  <div id="modalJawab" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4 id="header-jawab-pertanyaan">Balas Pertanyaan</h4>
      <div class='col s12 quotes kuote' ><p ><i style="font-size: 12px"></i></p></div>
      <p>
        <div class="row">
          <div class="input-field col s12">
            <textarea name='editor1' id="komenText" class="materialize-textarea"></textarea>
            <label for="komen">Komentar</label>
          </div>
        </div>
      </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="post-balas">Post</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="batal">Batal</a>
    </div>
  </div>

  <!-- Hero Header -->
  <div class="h-banner animated fadeindown red lighten-1">
    <div class="parallax bg-profile">
    </div>
    <div class="banner-title">{judul_header}</div>
  </div>
    
    <div class=" delay-1">
      <div class="card  delay-2">
        <!-- START Row -->
        <div class="row">
        <div class="comments">
          <!-- blog-post -->
          <div class="blog-post">
          <article>
            <div class="post-info">
              <div class="date-post"><div class="day">{tanggal}</div><div class="month">{bulan}</div></div>
              <div class="post-info-main">
                <input type="hidden" value="{id_pertanyaan}" name="idpertanyaan">
                <input type="hidden" value="{id_pengguna}" name="idpengguna">

                <div class="author-post"><i class="ion-person"></i>by {author}</div>
              </div>
              <div class="comments-post"><i class="ion-chatbubbles"></i> {jumlah}</div>
            </div>

           <div class="quotes clear-fix" >
            <div class="quote-avatar-author clear-fix">
              <img src="{photo}" data-at2x="{photo}" alt="{namaPengguna}" width="60px" class="avatar circle">
              <div class="author-info">{author}<br><span>{akses}</span></div>
            </div>

            <div>
              <h4 style="display:inline">{judul_header}</h4>
              <div class="komen"><?=$isi ?>
              </div>
              <!-- <input type="hidden" name="" value="{isi}"> -->
              <input type="hidden" name="single" value="<?=htmlspecialchars($isi) ?>">
            </div>

          </div> <br>

          <div>
            | <span rel="tag"><i class="ion-pricetag"></i> {bab}</span> |
            <a onclick="quote('single')" rel="tag"><i class="ion-quote"></i> Quote</a> |
            <a onclick="quote(0)" rel="tag"><i class="ion-chatbubbles"></i> Balas</a> |
            <?php if ($username==$this->session->userdata('USERNAME')): ?>
              <a onclick="edit()"><i class="ion-edit"></i> Edit</a> |
            <?php endif ?>
          </div>

          </article>
          </div>
          </div>
          <!-- end blog-post -->

          <div class="comments">
          <div class="blog-post">

          <?php $number = 1; ?>
      <?php if ($data_postingan!=array()): ?>
        <?php foreach ($data_postingan as $item_postingan): ?>
          <!-- <?php print_r($item_postingan) ?> -->
          <?php $link = base_url('konsultasi/show_post/').$item_postingan['jawabID'] ?>
          <?php $number++; ?>
            <article>
              <div class="row bg-color-2">
                <div class="container"><?=$item_postingan['date_created'] ?> |
                  <a title="view single post" href="<?=$link ?>">#<?=$number ?></a></div>
                </div><br>

                <div class="quotes clear-fix" >
                  <div class="quote-avatar-author clear-fix">

                    <?php 
                    if ($item_postingan['hakAkses']=="siswa") {
                      $gbr = base_url().'assetsnew/image/photo'."/".$item_postingan['hakAkses']."/".$item_postingan['siswa_photo'];
                    }else{
                      $gbr = base_url().'assetsnew/image/photo'."/".$item_postingan['hakAkses']."/".$item_postingan['guru_photo'];
                    }
                    ?>
                    <img src="<?=$gbr ?>" width="60px" class="avatar circle">
                    <div class="author-info"><?=$item_postingan['namaPengguna'] ?><br><span><?=$item_postingan['hakAkses'] ?></span></div>
                  </div>

                  <div>
                    <?php $value =htmlspecialchars($item_postingan['isiJawaban']). 
                    "<span style='font-style:italic'><br>Post By:".ucfirst($item_postingan['namaPengguna']).
                    "<a title='view single post' href='".$link."'><i class='fa fa-arrow-circle-o-right'> > </i></a>"?>
                    <div class="komen"><?=$item_postingan['isiJawaban'] ?>
                      <input type="hidden" name="<?=$item_postingan['jawabID'] ?>" 
                      value="<?=$value ?>">
                    </div>

                  </div>

                </div><br>

                <?php if ($this->session->userdata('HAKAKSES')=="guru"): ?>
                  <div class="text-right">
                    <a onclick="quote(<?=$item_postingan['jawabID'] ?>)" >
                      <i class="fa fa-quote-right ">
                      </i> Quote  
                    </a>
                  </div>
                <?php else :?>
                  <?php if ($item_postingan['namaPengguna']==$this->session->userdata('USERNAME')): ?>
                    <div class="text-right">
                      <a onclick="quote(<?=$item_postingan['jawabID'] ?>)">
                        <i class="ion-quote">
                        </i> Quote  
                      </a> |

                      <a href="<?=base_url('konsultasi/editpost/'.$item_postingan['jawabID']) ?>">
                        <i class="ion-edit smaller">
                        </i> Edit 
                      </a>
                    </div>

                  <?php else :?>
                    <div class="text-right">
                      <a onclick="point(<?=$item_postingan['jawabID'] ?>)">
                        <i class="fa fa-heart">
                        </i> Point
                      </a> |

                      <a onclick="quote(<?=$item_postingan['jawabID'] ?>)">
                        <i class="ion-quote ">
                        </i> Quote  
                      </a>
                    </div>
                  <?php endif ?>

                <?php endif ?>

              </article>
            
          <?php endforeach ?>
        <?php endif ?>
          
        </div>
          <div class="grid-col-row clear-fix">
            <center>
              <div class="page-pagination clear-fix margin-none" style="width: 100%;">
                <?php echo $links; ?>
              </div>
            </center>
          </div>
        </div>

        </div>
        <!-- END ROW -->

        <div class="activities">
        <!-- editor reply -->
        <div class="container"> 
          <hr>  
          <div class="col-sm-12" id="jawaban">
            <br>
            <span>Isi Jawaban :</span>
            <textarea  name="respon" class="form-control" id="isi" row=10 cols=80></textarea>
            <br>
            <form action="<?=base_url('konsultasi/do_upload') ?>" method="post" enctype="multipart/form-data" id="form-gambar">
              <span>Upload gambar :</span> 
              <input type="file" class="cws-button bt-color-3 alt smaller post" name="file" style="display: inline">

              <a onclick="submit_upload()" style="border: 2px solid #18bb7c; padding: 2px;display: inline" title="Upload"><i class="ion-android-download"></i></a> 
              <div id="output" style="display: inline">
                <a style="border: 2px solid grey; padding: 2px;display: inline" title="Sisipkan" disabled><i class="ion-android-upload"></i></a> 
              </div>


              <input type="submit" class="fa fa-cloud-upload submit-upload" style="margin-top: 3px;display: none" value="Upload">             
            </a>
          </form>
          <!-- <br> -->
          <!-- <a class="cws-button bt-color-3 alt smalls" onclick="preview()">Preview</a>  -->
          <a onclick="simpan_jawaban()" class="col s12 btn accent-color waves-effect waves-light post">Post</a>
          <br>
          <br>
          <hr>
        </div>
        </div>
        </div>

      </div>
    </div>

<script type="text/javascript">
      function insert(){
        nama_file = $('.insert').data('nama');
        url = base_url+"assets/image/konsultasi/"+nama_file;

        CKEDITOR.instances.isi.insertHtml('<img src='+url+' ' + CKEDITOR.instances.isi.getSelection().getNative()+'>');
      }

      function submit_upload(){
        $('.submit-upload').click();
      }

      jQuery(document).ready(function() { 
        jQuery('#form-gambar').on('submit', function(e) {
          e.preventDefault();
          jQuery('#submit-button').attr('disabled', ''); 
          jQuery("#output").html('<div style="padding:10px"><img src="<?php echo base_url('assets/image/loading/spinner11.gif'); ?>" alt="Please Wait"/> <span>Mengunggah...</span></div>');
          jQuery(this).ajaxSubmit({
            target: '#output',
            success:  sukses 
          });
        });
      }); 

      function sukses(){ 
        jQuery('#form-upload').resetForm();
        jQuery('#submit-button').removeAttr('disabled');
      }

      var ckeditor;



      $(document).ready(function(){
        CKEDITOR.replace( 'respon', {
          height: 260,
          /* Default CKEditor styles are included as well to avoid copying default styles. */
        } );

        /*ckeditor = CKEDITOR.replace('respon');  */
      });

      var ckeditor;
      var string;
      var txt = 1;
      function quote(data){
        if (data==0) {            
          // balas
          $('html, body').animate({
            scrollTop: $("#jawaban").offset().top
          }, 2000);
        }else{
          //quote
          $('html, body').animate({
            scrollTop: $("#jawaban").offset().top
          }, 2000);

          string = $('input[name='+data+']').val();

          CKEDITOR.instances.isi.setData("<blockquote>"+string+"</blockquote><br>");
        }

      }
      function simpan_jawaban(){
        // get text from ck editor
        txt = CKEDITOR.instances.isi.getData();
        
        var datas = {
          isiJawaban : txt,
          penggunaID : $('input[name=idpengguna]').val(),
          pertanyaanID : $('input[name=idpertanyaan]').val(),
        };

        url = base_url+"konsultasi/ajax_add_jawaban/";
        $.ajax({
          url : url,
          type: "POST",
          data: datas,
          dataType: "TEXT",
          success: function(data){
            window.location = base_url+"konsultasi/singlekonsultasi/"+datas.pertanyaanID;
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error adding / update data');
          }
        });

      }

      function point(data){
        elemen = "<textarea class='form-control' name='komentar'></textarea>";
        $('.modal-body').html(elemen);
        $('.modal-header .modal-title').html("Berikan Komentar");
        $('#myModal').modal('show');
        button = "<button type='button' class='cws-button bt-color-1 alt small' data-dismiss='modal'>Batal</button><button type='button' class='cws-button bt-color-2 alt small mulai-btn post'onclick='komen("+data+")'>Berikan</button>";

        $('.modal-footer').html(button);


      }

      function komen(data){
        var isikomentar = $('textarea[name=komentar]').val();

  // url = base_url+"konsultasi/ajax_add_point/"+data;
  url = base_url+"konsultasi/check_point/"+data;

  datas = {
    isiKomentar : isikomentar,
    idJawaban : data
  }
  var stat;
  $.ajax({
    url : url,
    type: "POST",
    data: datas,
    dataType: "json",
    success: function(data, status, jqXHR)
    {
      stat = get_data(data, datas);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      swal('Error adding / update data');
    }
  });

}

function get_data(data, datas){
  status = data;
  postingan = datas;
  if (status==1) {
    swal("Tidak Dapat Memberikan Point")
  }else{
    console.log(postingan.idJawaban);
    url = base_url+"konsultasi/ajax_add_point/"+postingan.idJawaban;
    $.ajax({
      url : url,
      type: "POST",
      data: datas,
      dataType: "text",
      success: function()
      {
        swal("sudah ditambahkan");
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Error adding / update data');
      }
    });
  }
}
</script>

<!-- FUNGSI EDIT -->
<script>
  function edit(){

  } 
</script>
<!-- FUNGSI EDIT -->
