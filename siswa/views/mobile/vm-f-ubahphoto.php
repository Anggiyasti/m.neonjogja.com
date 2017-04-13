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

        <!-- Article Content -->
       <div class=" delay-1">
          <div class="card  delay-2">
          <div class="form-inputs">
          <div class="notification notification-danger" id="notif" hidden="true">
            <a class="close-notification no-smoothState"><i class="ion-android-close"></i></a>
            <h4>Silahkan cek type extension gambar!</h4>
            <p>Type yang bisa di upload hanya .jpeg|.gif|.jpg|.png|.bmp</p>
          </div>

          <div class="notification notification-danger" id="size" hidden="true">
            <a class="close-notification no-smoothState"><i class="ion-android-close"></i></a>
            <h4>Silahkan cek ukuran gambar!</h4>
            <p>Ukuran yang bisa di upload maksimal 500Kb! </p>
          </div>
          <?php echo $this->session->flashdata('updsiswa'); ?>
            <form class="col s12" name="form-account" action="<?=base_url()?>index.php/siswa/upload/<?=$oldphoto; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
             <div class="row">
              <div class="col s12">
                <img id="preview" class="img-circle circle avatar" src="<?=$photo;?>" alt="" style="width: 150px; height: 150px; margin-bottom: 30px;" />
                <label for="file" class="btn" style="margin-bottom: 10px;">
                 File
                </label>
                <input style="display:none;" type="file" id="file" name="photo" class="btn btn-default" required="true" onchange="ValidateSingleInput(this);" />
              </div> 
            </div>
            <div class="row"> 
              <div class="col s12">
                <button type="reset" class="col s12 btn accent-color waves-effect waves-light right" style="margin-bottom: 10px;" onclick="restImg()">Reset</button>
                <button type="submit" class="col s12 btn accent-color waves-effect waves-light right">Simpan</button>
            </div>
            </div>

            </form>
          </div>
            
          </div>

          
        </div> 
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

function restImg() {
      $("input[name=photo]").val("");
      $('#preview').attr('src', "");
      $('#file').text("");
      $('#filetypeSoal').text("");
      $('#filesizeSoal').text("");
    }
</script>
<!-- END -->


    
