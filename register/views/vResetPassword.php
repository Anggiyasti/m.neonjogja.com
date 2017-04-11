 <!-- Page Content -->
      <div id="content" class="grey-blue login">

        <!-- Toolbar -->
        <div id="toolbar" class="tool-login primary-color animated fadeindown">
          <a href="javascript:history.back()" class="open-left">
            <i class="ion-android-arrow-back"></i>
          </a>
        </div>
        
        <!-- Main Content -->
        <div class="login-form animated fadeinup delay-2 z-depth-1">

            <h1>Reset Password</h1>

                        <div class="alert alert-warning">

                            <span class="semibold">Note :</span>&nbsp;&nbsp;Masukan password baru mu.

                        </div>

                    <hr>

          
             <form name="form-register" action="<?= base_url() ?>index.php/register/resetdatapassword" method="post">
             <div class="form-group">
                <div class="input-field" style="margin-bottom:20px;">
                    <i class="ion-android-lock prefix"></i> 
                      <input type="password" class="form-control" id="password" name="password" required>

                    <label for="new password">New Password</label>
                </div>
            </div>

             <div class="form-group">
                <div class="input-field" style="margin-bottom:20px;">
                    <i class="ion-android-lock prefix"></i> 
                      <input type="password" class="form-control" id="password2" name="oldpassword" required onkeyup="checkPass(); return false;">
                    <span id="confirmMessage" class="confirmMessage"></span>
                    <label for="confirm password">Confirm Password</label>
                </div>
            </div>

            <button type="submit" class="waves-effect waves-light btn-large accent-color width-100 m-b-20 animated bouncein delay-4" disabled="true" id="btn-password"><span class="semibold">Submit</span></button>
          </form>
        </div><!-- End of Main Contents -->
      
       
      </div> <!-- End of Page Content -->

<script type="text/javascript">

    function checkPass() {

        //Store the password field objects into variables ...

        var pass1 = document.getElementById('password');

        var pass2 = document.getElementById('password2');

        //Store the Confimation Message Object ...

        var message = document.getElementById('confirmMessage');

        //Set the colors we will be using ...

        var goodColor = "#66cc66";

        var badColor = "#ff6666";

        var blank = "#fff"

        //Compare the values in the password field

        //and the confirmation field



        if (pass2.value == "") {

            message.style.color = blank;

            message.innerHTML = ""
             document.getElementById('btn-password').disabled = true;

        } else if (pass1.value == pass2.value) {

            //The passwords match.

            //Set the color to the good color and inform

            //the user that they have entered the correct password

            message.style.color = goodColor;

            message.innerHTML = "Passwords Cocok!"
            document.getElementById('btn-password').disabled = false;

        } else {

            //The passwords do not match.

            //Set the color to the bad color and

            //notify the user.

            message.style.color = badColor;

            message.innerHTML = "Passwords Tidak Cocok!"

             document.getElementById('btn-password').disabled = true;

        }

    }



</script>




