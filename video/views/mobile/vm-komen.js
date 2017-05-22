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