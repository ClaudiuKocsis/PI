<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EmKla.Bike</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <link rel="icon" href="assets/img/bike_icon_white.png">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="index.php">EmKla.Bike</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

          <nav class="nav-menu d-none d-lg-block">
            <ul>
            <li><a href="index.php">Home</a></li>
              <li><a href="produse.php">Produse</a></li>
              <li><a href="despre_biciclete.php">Despre biciclete</a></li>
              <li><a href="forum.php">Forum</a></li>
              <li><a href="profile.php">Profilul meu</a></li>
              <li><a href="cos.php">Cos</a></li>
              <li><a href="despre_noi.php">Despre noi</a></li>

            </ul>
          </nav><!-- .nav-menu -->

          
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <main>
   

    <br>
    <br>
    <br>
    <br>

    <?php 

session_start();
$_SESSION['produse_in_cos'] = 0;
require("produse_in_cos.php");

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
    $URL="profile.php";
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
// $db = "bikes";




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
                          <input type="radio" name="slide" id="login" checked style="display: none;">
                          <input type="radio" name="slide" id="signup" style="display: none;">
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
                <input type="submit" value="Login" id="login_button">
                            </div>
                <div class="signup-link">
                Not a member? <a href="">Signup now</a></div>
                </form>
                <form action="registration.php" method = "POST" class="signup">
                  <div class="field">
                    <input type="text" name = "username_signin" placeholder = "Username" required>
                  </div>
                  <div class="field">
                    <input type="text" name = "email_signin" data-rule="email" data-msg="PLEASE" placeholder="Email Address" >
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

    
  </main>

</body>