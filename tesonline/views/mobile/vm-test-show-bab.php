     <!-- Page Content -->
      <div id="content" class="page" style="min-height: 425px;">
      
        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Latihan</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>

        
        <!-- Article Content -->
        <div class="row">
              <div class="col s12">
            <!-- With Left Icon -->



<form class="form-group" id="formlatihan" method="post" onsubmit="return false;">

                            

                               
                            <div class="alert alert-dismissable alert-danger" id="info" hidden="true" >

                              <button type="button" class="close" onclick="hideme()" >×</button>

                              <strong>Terjadi Kesalahan</strong> <br>Silahkan Lengkapi Data.

                          </div>



                          <p class="has-success">

                            <label>BAB</label>

                            <select class="browser-default" name="bab" id="babSelect"  ><option value='0'>--pilih--</option>
                                              <?php 
                                                foreach ($bab as $b) {
                                                echo "<option value='$b[id]'>$b[judulBab]</option>";
                                                }
                                              ?>

                            </select>

                        </p>

                        <p class="has-success">

                            <label >SUB BAB</label>

                            <select class="browser-default" name="subab" id="subSelect"  ><option value=0>-Pilih Sub-</option></select>                       

                        </p>

                        <p class="has-success">

                            <label>TINGKAT KESULITAN</label>

                            <select class="browser-default" name="kesulitan" id="kesulitan">

                                <option value=0>-Pilih Tingkat Kesulitan-</option>

                                <option value="mudah">Mudah</option>

                                <option value="sedang">Sedang</option>

                                <option value="sulit">Sulit</option>

                            </select>                       

                        </p>

                        <p class="has-success">

                            <label>JUMLAH SOAL</label>

                            <select class="browser-default" name="jumlahsoal">

                                <option value=0>-Pilih Jumlah Soal-</option>

                                <option value="5">5</option>

                                <option value="10">10</option>

                                <option value="15">15</option>

                            </select>                       

                        </p>

                       <div class="modal-footer bg-color-3">

                            <button type="button" class="waves-effect waves-light btn-large primary-color width-100" data-dismiss="modal">Batal</button>
                            <br><br>

                            <button type="button" class="waves-effect waves-light btn-large primary-color width-100 mulai-btn">Mulai Latihan</button>
                            <br><br>

                            <button type="button" class="waves-effect waves-light btn-large primary-color width-100 latihan-nnti-btn">Latihan nanti</button>



                        </div>
                    </form>

                          </div>
        </div> 
      
         
      </div> <!-- End of Page Content -->
<script type="text/javascript">




    $('#babSelect').change(function () {
        load_sub($('#babSelect').val());
    });



   

    function submit(id) {
        //passing data to modals.
        var tingPelID = $('.kirim' + id).data('todo').id;
        //untuk ditampilkan di modal
        var namaPelajaran = $('.kirim' + id).data('todo').namapelajaran;
        $('#myModal').modal('show');
        $('.modal-title').text('Mulai Latihan untuk pelajaran ' + namaPelajaran);
        load_bab(tingPelID);
    }



    //fungsi untuk ngeload bab berdasarkan tingkat-pelajaran id
    function load_bab(tingPel) {
        $('#babSelect').find('option').remove();
        $('#babSelect').append('<option value=1>Bab Pelajaran</option>');
        var babID;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>index.php/matapelajaran/get_bab_by_tingpel_id/" + tingPel,
            success: function (data) {

                $.each(data, function (i, data) {
                    $('#babSelect').append("<option value='" + data.id + "'>" + data.judulBab + "</option>");
                    babid = data.id;
                });
            }
        });

    }


    // var babID = $('input[name=bab]').val();
    function load_sub(babID) {
        $.ajax({
            type: "POST",
            data: babID.bab_id,
            url: "<?php echo base_url() ?>index.php/videoback/getSubbab/" + babID,
            success: function (data) {
                $('#subSelect').html('<option value=0>-- Pilih Sub Bab Pelajaran  --</option>');
                $.each(data, function (i, data) {
                    $('#subSelect').append("<option value='" + data.id + "'>" + data.judulSubBab + "</option>");
                });
            }
        });
    }



    function mulai(test) {
        var sub_bab_id = $('#subSelect').val();
        var kesulitan = $("select[name=kesulitan]").val();
        var jumlahsoal = $("select[name=jumlahsoal]").val();
        var subabid = $("select[name=subab]").val();
        var babid = $("select[name=bab]").val();



        var data = {
            kesulitan: kesulitan,
            jumlahsoal: jumlahsoal,
            subab: subabid,
            bab:babid
        };
        if (data.kesulitan == 0 || data.jumlahsoal == 0) {
            $('#info').show();
        }else{
            $('.mulai-btn').text('Proses...'); //change button text
            $('.mulai-btn').attr('disabled', true); //set button disable 

            if (data.subab==0) {
                url = "<?php echo base_url() ?>index.php/latihan/tambah_latihan_ajax_bab";
                console.log(data);
            }else{
                url = "<?php echo base_url() ?>index.php/latihan/tambah_latihan_ajax";
            }

            $.ajax({
                url: url,
                type: "POST",
                dataType: 'text',
                data: data,
                success: function (data, respone)
                {
                    
                    $('.mulai-btn').text('save'); //change button text
                    $('.mulai-btn').attr('disabled', false); //set button enable 
                    $('#formlatihan')[0].reset(); // reset form on modals
                if (test == 'mulai') {
                    window.location.href = base_url + "index.php/tesonline/mulaitest";
                } else {
                    window.location.href = base_url + "index.php/welcome";
                }
            },
            error: function (respone, jqXHR, textStatus, errorThrown)
            {
                swal('Error adding / update data');
            }
        });
        }
    }


    function hideme(){
        $('#info').hide();
    }

    $('.mulai-btn').click(function () {
        mulai('mulai');
    });



    $('.latihan-nnti-btn').click(function () {
        mulai('nanti');

    });







</script>