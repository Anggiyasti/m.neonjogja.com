<!DOCTYPE html>
<html>
<head>

    <title>{judul_halaman}</title>
    <meta content="IE=edge" http-equiv="x-ua-compatible">
    <meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Icons -->
    <link rel="shortcut icon" href="<?= base_url('assets/back/img/favicon.png') ?>">

    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" media="all" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <?php if (current_url() != base_url().'index.php/konsultasi/singlekonsultasi/'.$this->uri->segment(3)): ?>
        <link rel="stylesheet" href="<?= base_url('assetsnew/css/bootstrap.min.css') ?>"/>
    <?php endif ?>
    
    <link href="<?= base_url('assetsnew/css/keyframes.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/materialize.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/swiper.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/swipebox.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/style.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assetsnew/css/stylenew.css') ?>" rel="stylesheet" type="text/css">
    <!-- style -->
    <link rel="stylesheet" href="<?= base_url('assetsnew/css/sweetalert.css');?>"> 


<div class="m-scene" id="main">


    <?php
    if (!$files) {
        
    } else {
        foreach ($files as $key) {

        include ($key);

        }
    }
    ?>

        </div> <!-- End of Main Contents -->  
    </div> <!-- End of Page Content -->
</div> <!-- End of Page Container -->
    <script src="<?= base_url('assetsnew/js/jquery-2.1.0.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/jquery.swipebox.min.js') ?>"></script>   
    <script src="<?= base_url('assetsnew/js/materialize.min.js') ?>"></script> 
    <script src="<?= base_url('assetsnew/js/swiper.min.js') ?>"></script>  
    <script src="<?= base_url('assetsnew/js/jquery.mixitup.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/jquery.smoothState.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/masonry.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/chart.min.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/functions.js') ?>"></script>
    <script src="<?= base_url('assetsnew/js/sweetalert-dev.js');?>"></script>
    <script>
    $(document).ready(function() {
        $('select').material_select();
        // Plugin initialization
        // $('.modal').modal();
    });
    </script>

    <?php if (current_url() === base_url().'index.php/video/seevideo/'.$this->uri->segment(3)): ?>
        <script src="http://macyjs.com/assets/js/macy.min.js"></script>

<script>
    $(document).ready(function () {
        Macy.init({
          container: '#macy-container',
          trueOrder: false,
          waitForImages: false,
          margin: 24,
          columns: 3,
          breakAt: {
            1200: 5,
            940: 3,
            520: 2,
            400: 1
        }
    });

        $("#formkomen").submit(function (e) {
            e.preventDefault();
            var isiKomen = $("#isiKomen").val();
            console.log(isiKomen);
            var videoID = <?= $this->uri->segment(3) ?>;
            if (isiKomen=="") {
                $('#info .lengkapi').removeClass('hide');
                $('#info .sukses').addClass('hide');
                $('#info .gagal').addClass('hide');
            }else{
             $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>index.php/video/addkomen',
                data: {isiKomen: isiKomen, videoID: videoID},
                success: function (data)
                {
                    swal({   title: "Komen Berhasil ditambahkan",   
                     type: "info",   
                     showCancelButton: false,   
                     confirmButtonColor: "#8BDCF7",   
                     confirmButtonText: "Ok!",   
                     closeOnConfirm: false }, 
                     function(){   
                        window.location = '<?php echo base_url() ?>'+"video/seevideo/"+videoID;
                        ; });
                },
                error: function ()
                {
                    $('#info .lengkapi').removeClass('hide');
                    $('#info .sukses').addClass('hide');
                    $('#info .gagal').removeClass('hide');
                }
            }); 
         }

     });
    });
</script> 
    <?php endif ?>

<?php if (current_url() === base_url().'index.php/konsultasi/singlekonsultasi/'.$this->uri->segment(3)): ?>
<script type="text/javascript" src="<?= base_url('assetsnew/plugins/ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assetsnew/plugins/ckeditor/adapters/jquery.js') ?>"></script>
<script>
$(document).ready(function(){
    
    var ckeditor;
    var string;
    var txt = 1;
    var base_url = '<?= base_url(); ?>';
    var quote = null;
    var dataPoint;
    
    $(".quote").click(function(){
        quote = $(this).attr('data-quote');
        if (quote == 0) {
            console.log('true');
            $('#modalJawab .modal-body .quotes p i').html("");
            $('#modalJawab .modal-header .modal-title').html("Balas Pertanyaan");
            $('#modalJawab').openModal();
            $( "#post-balas" ).click(function() {
                string = 0;
                simpan_jawaban();
            });
        } else {
            console.log('false');
            $('#modalJawab #header-jawab-pertanyaan').html("Quote Jawaban");
            string = $('input[name='+quote+']').val();
            $('#modalJawab .modal-content .quotes p i').html("<blockquote>"+string+"</blockquote>");
            // ckeditor.setData(string);
            $('#modalJawab').openModal();
            $( "#post-balas" ).click(function() {
                simpan_jawaban();
            });
        }
    })
        
    function simpan_jawaban(){
        txt = $('#komenText').val();
            console.log(txt);
            console.log(string);
        //kalo kosong
        if (string==0) {
            var desc = txt;/*ckeditor.getData();*/
            var data = {
                isiJawaban : desc,
                penggunaID : $('input[name=idpengguna]').val(),
                pertanyaanID : $('input[name=idpertanyaan]').val(),
            }
            idpertanyaan= data.pertanyaanID;
        }else{
            quote = "<blockquote>"+string+"</blockquote>"+txt;
            var data = {
                isiJawaban : quote,
                penggunaID : $('input[name=idpengguna]').val(),
                pertanyaanID : $('input[name=idpertanyaan]').val(),
            }
            idpertanyaan= data.pertanyaanID;
        }
        if (data.isiJawaban == "") {
            $('#info').show();
        }else{
            url = base_url+"konsultasi/ajax_add_jawaban/";
            $.ajax({
                url : url,
                type: "POST",
                data: data,
                dataType: "TEXT",
                success: function(data)
                {
                // alert('masd');
                $('.post').text('Posting..'); //change button text
                $('.post').attr('disabled',false); //set button enable
                // alert('berhasil');
                window.location = base_url+"konsultasi/singlekonsultasi/"+idpertanyaan;
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
        }
    }

    $(".point").click(function(){
        dataPoint = $(this).attr('data-point');
        point(dataPoint);
    });
    $("#post-koment").click(function(){
        komen(dataPoint);
    });
    
    function point(data){
        elemen = "<textarea class='materialize-textarea' name='komentar'></textarea><label for='komen'>Komentar</label>";
        $('.modal-content #modal-body').html(elemen);
        $('.modal-content #modal-header').html("Berikan Komentar");
        $('#myModal').openModal();
        

    }

    function komen(data){
        var isikomentar = $('textarea[name=komentar]').val();

    // url = base_url+"konsultasi/ajax_add_point/"+data;
    url = '<?= base_url(); ?>'+"konsultasi/check_point/"+data;

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
        url = '<?= base_url(); ?>'+"konsultasi/ajax_add_point/"+postingan.idJawaban;
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
});
</script> 
<?php endif ?>

<?php if (current_url() === base_url().'index.php/konsultasi'): ?>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
<link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="Stylesheet"></link>

<script>

  $(document).ready(function(){
// filter pertanyaan

$( "#pertanyaan-setingkat" ).first().hide();
$("#filter-pertanyaan").change(function(){
   var pertanyaan = $("#filter-pertanyaan").val();
   if (pertanyaan === "all") {
    console.log('all')
    $('#semua-pertanyaan').show( 1000 );
    $('#pertanyaan-setingkat').hide( 1000 );
   } else {
        console.log('setingkat')
        $('#pertanyaan-setingkat').show( 1000 );
        $('#semua-pertanyaan').hide( 1000 );
   } 
});


var base_url = '<?= base_url(); ?>';
    $( "#tags" ).autocomplete({
      source:  base_url +"konsultasi/search_all",
            select: function (event, ui) {
                window.location = ui.item.url;
            }
    });


$('#search2').autocomplete({
    source: base_url +"konsultasi/search_tingkat",
    select: function (event, ui) {
        window.location = ui.item.url;
    }
});

$('#search3').autocomplete({
    source: base_url +"konsultasi/search_mine",
    select: function (event, ui) {
        window.location = ui.item.url;
    }
});


        $('#mapelSelect').change(function () {
  var idMapel = $(this).val();
  console.log(idMapel)
  load_bab(idMapel);
 });

 $('#babSelect').change(function () {
  var idbab = $(this).val();

  load_sub(idbab);
 });

    //fungsi untuk ngeload bab berdasarkan tingkat-pelajaran id
    function load_bab(tingPelId) {
     $('#babSelect').find('option').remove();
     $('#babSelect').append('<option value=0>Bab Pelajaran</option>');
     var babID;
     $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>index.php/matapelajaran/get_bab_by_tingpel_id/" + tingPelId,
      success: function (data) {
       $.each(data, function (i, data) {
        $('#babSelect').append("<option value='" + data.id + "'>" + data.judulBab + "</option>");
        load_sub(data.id);  
       });
      }
     });
    }

    // //fungsi untuk ngeload bab berdasarkan tingkat-pelajaran id
    function load_sub(babID) {
     var babID;
     $.ajax({
      type: "POST",
      url: "<?php echo base_url() ?>videoback/getSubbab/" + babID,
      success: function (data) {
       $('#subSelect').html('<option value=0>-- Pilih Sub Bab Pelajaran  --</option>');
       $.each(data, function (i, data) {
       console.log(data);
        $('#subSelect').append("<option value='" + data.id + "'>" + data.judulSubBab + "</option>");
       });
      }
     });
    }

    function mulai() {
      var mapel= $('#mapelSelect').val();
      var subab= $('#subSelect').val();
      var bab= $('#babSelect').val();
     if (mapel == 0 || subab == 0 || bab == 0) {
      $('#info').show();
     }else{
       $('.buat-btn').text('proses...');
       window.location = "<?php echo base_url() ?>konsultasi/bertanya/" + subab;
     }
  }



          function hideme(){
           $('#info').hide();
          }
          $('.buat-btn').click(function () {
           mulai();
          });
    })
</script> 
<?php endif ?>

    
   


</body>

</html>