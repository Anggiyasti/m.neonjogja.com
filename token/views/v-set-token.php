 <!-- Page Content -->
      <div id="content">

        <!-- Toolbar -->
        <div id="toolbar" class="primary-color">
          <div class="open-left" id="open-left" data-activates="slide-out-left">
            <i class="ion-android-menu"></i>
          </div>
          <span class="title">Halo</span>
          <div class="open-right" id="open-right" data-activates="slide-out">
            <i class="ion-android-person"></i>
          </div>
        </div>
        
        <!-- Main Content -->
        <div class="animated fadeinup">
          
          <!-- Slider -->         
          <div class="swiper-container slider-drawer">
            <div class="swiper-wrapper">
              <div class="swiper-slide white z-depth-1">
                 <div class="row">
                  <div class="col s12">
                  <p class="center-align grey-text">{pesan}</p>

                    <center>   <input type="text" name="kode_token" style="width: 40%;margin-bottom: 10px" placeholder="Masukan Kode Token">
                    <br>
                    <a class="waves-effect waves-light btn-large accent-color m-b-20 animated bouncein delay-4 alt isi_button">Submit</a></center>

                    
                  </div>
                </div>
              </div>
            </div>
            <!-- Add Pagination -->
            <!-- <div class="swiper-pagination drawer-pagination"></div> -->
            

          </div>
          <!-- End of Slider -->

        </div> <!-- End of Main Contents -->
      
       
      </div> <!-- End of Page Content -->




<script type="">

    $('.isi_button').click(function(){

        kode_token = $('input[name=kode_token]').val();

        url = base_url+"token/isi_token";

        $.ajax({

            type:'POST',

            data:{kode_token:kode_token},

            url:base_url+"token/isi_token",

            dataType:"TEXT",

            success:function(data){

                console.log(data);

                if (data=="1") {     

                    swal('Token Berhasil di aktifkan, silahkan menikmati layanan kami !');

                   window.location = base_url+"welcome";

                }else{

                    swal('Kode Token salah');

                }

            },error:function(){

                console.log('masuk 1');

            }

        });

    })





</script>