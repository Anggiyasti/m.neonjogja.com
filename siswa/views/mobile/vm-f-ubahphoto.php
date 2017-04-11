  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assetsnew/js/preview.js') ?>"></script>
       <?php 

        foreach ($sis as $row) {

            $namaDepan = $row['namaDepan'];

            $namaBelakang = $row['namaBelakang'];

            $alamat = $row['alamat'];

            $noKontak = $row['noKontak'];

            $biografi = $row['biografi'];

            $namaSekolah = $row['namaSekolah'];

            $alamatSekolah  = $row['alamatSekolah']; 

            $photo=base_url().'assetsnew/image/photo/siswa/'.$row['photo'];

            $oldphoto=$row['photo'];

        } ;

     ?>  
       <!-- Page Content -->
      <div id="content" class="page">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Profil Siswa</span>
        </div>

        <!-- Hero Header -->
        <div class="h-banner animated fadeindown red lighten-1">
          <div class="parallax bg-profile">
          </div>
            <div class="banner-title"><?=$namaDepan;?> <?=$namaBelakang;?></div>
          </div>

         <!-- Profile Content -->
        <div class=" delay-1">
          <div class="card  delay-2">
            <form class="col s12" name="form-account" action="<?=base_url()?>index.php/siswa/upload/<?=$oldphoto; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
            <div class="input-field">
            <img id="preview" class="img-circle circle avatar" src="<?=$photo;?>" alt="" style="width: 150px; height: 150px;" />
            <br><br>  
            </div>  
                  
            <label for="file" class="btn primary-color" >
            Pilih Gambar
            </label>
            
            <input style="display:none;" type="file" id="file" name="photo" class="btn btn-default" required="true" onchange="ValidateSingleInput(this);" />
            
             <label class="btn primary-color"  onclick="restImgSoal()">Reset</label>
            <?php echo form_error('password'); ?>
            
            <br><br> 
                                                       <!--  <input type="hidden" name="id_siswa" value="<?=$id_siswa;?>"> -->
            <div class="input-field">
            <button type="submit" class="btn-large primary-color width-100">Simpan</button>
            </div>

            </form>
          </div>
        </div>
        
        </div> <!-- End of Main Contents -->
      
         
      </div> <!-- End of Page Content -->

    </div> <!-- End of Page Container -->

<!-- start script js validation extension -->
<script type="text/javascript">
 var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    

function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        console.log(sFileName);
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
             $('#notif').show();
                // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                // oInput.value = "";
                return false;
            }

            file = oInput.files[0];
            if (file.size > 508000 ) {
               $('#size').show();
               return false;
            } 
            
        }
    }
    return true;
}

</script>
<!-- END -->
