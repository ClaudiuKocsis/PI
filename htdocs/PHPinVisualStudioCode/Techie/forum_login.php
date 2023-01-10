<?php 

session_start();
include("inner_page_top.php");

// if(isset($_GET['logout']) && $_GET["logout"] == "true")
// {
//   $_GET["logout"] = "false"; 
//   session_destroy();
// }
// else{


if(isset($_SESSION['username']))
{
  //if i am logged in then i get redirected to the forum section, no need to login again
  // header("location: http://localhost/PHPinVisualStudioCode/Techie/forum_section.php");
  if(isset($_GET['page']) && $_GET['page'] == "profile")
  {
    $URL="http://localhost/PHPinVisualStudioCode/Techie/profile.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
  else
  {
    // $URL="http://localhost/PHPinVisualStudioCode/Techie/forum_section.php";
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
  }
}


// }

// $host = "localhost";
// $user = "root";
// $password = "";
// $db = "atestat";




// $conn = new mysqli($host, $user, $password);

// if ($conn -> connect_errno) {
//   echo "Failed to connect to MySQL: " . $conn -> connect_error;
//   exit();
// }
// // mysqli_connect($host, $user, $password);
// mysqli_select_db($conn, $db);

// if(isset($_POST['email_login'])){
//   $user_email = $_POST['email_login'];
//   $user_password = $_POST['password_login'];

//   $sql = "select * login_form where email = '".$user_email."' and password = '".$user_password."'  limit 1 ";

//   $result = mysqli_query($conn, $sql);

//   if(mysqli_num_rows($result) == 1){
//     echo "You have successfully logged in";
//     exit();
//   }
//   else
//   {
//     echo "You have entered incorrect password";
//     exit();
//   }

// }//


?>


<!DOCTYPE html>
<html lang="en">
  


  <main>

      <br>

      <center>

                      <!-- on click alert -->
                        <!--myyyyyyyyyyyyyyyyyyyy codeeeeeeeeeeeeeeeeeeeeeeeee -->
                        <body>
                          <div class="wrapper">
                            <div class="title-text">
                              <div class="title login">
                      Login Form</div>
                      <div class="title signup">
                      Signup Form</div>
                      </div>
                      <div class="form-container">
                              <div class="slide-controls">
                                <input type="radio" name="slide" id="login" checked>
                                <input type="radio" name="slide" id="signup">
                                <label for="login" class="slide login">Login</label>
                                <label for="signup" class="slide signup">Signup</label>
                                <div class="slider-tab">
                      </div>
                        
                      </div>
                      <div class="form-inner">
                                <form action="validation.php" method = "POST" class="login">
                                  <div class="field">
                                    <input type="text" name =  "email_or_username_login" placeholder="Email Address" required>
                                  </div>
                      <div class="field">
                                    <input type="password" name = "password_login" placeholder="Password" required>
                      </div>

                      <div class="pass-link">
                      <a href="#">Forgot password?</a></div>
                      <div class="field btn">
                                    <div class="btn-layer">
                      </div>
                      <input type="submit" value="Login">
                                  </div>
                      <div class="signup-link">
                      Not a member? <a href="">Signup now</a></div>
                      </form>
                      <form action="registration.php" method = "POST" class="signup">
                        <div class="field">
                          <input type="text" name = "username_signin" placeholder = "Username" required>
                        </div>
                        <div class="field">
                          <input type="text" name = "email_signin" placeholder="Email Address" required>
                        </div>
                      <div class="field">
                                    <input type="password" name = "password_signin" placeholder="Password" required>
                                  </div>
                      <div class="field">
                                    <input type="password" name = "password_signin_check" placeholder="Confirm password" required>
                                  </div>
                      <div class="field btn">
                                    <div class="btn-layer">
                      </div>
                      <input type="submit" value = "Submit">
                                  </div>
                      </form>
                      </div>
                      </div>
                      </div>
                      <script>
                            const loginText = document.querySelector(".title-text .login");
                            const loginForm = document.querySelector("form.login");
                            const loginBtn = document.querySelector("label.login");
                            const signupBtn = document.querySelector("label.signup");
                            const signupLink = document.querySelector("form .signup-link a");
                            signupBtn.onclick = (()=>{
                              loginForm.style.marginLeft = "-50%";
                              loginText.style.marginLeft = "-50%";
                            });
                            loginBtn.onclick = (()=>{
                              loginForm.style.marginLeft = "0%";
                              loginText.style.marginLeft = "0%";
                            });
                            signupLink.onclick = (()=>{
                              signupBtn.click();
                              return false;
                            });
                          </script>
                      
                        </body>

              <br>

      </center>


    </main>

</html>


<?php

    include("inner_page_bottom.php");

?>

<?php
   if(isset($_GET['error']))
   {

?>

     <html>
       <script>
         alert("<?php echo $_GET['error']?>");
       </script>
     </html>

<?php      
   $URL="http://localhost/PHPinVisualStudioCode/Techie/forum_login.php";
   echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
   }
?>

