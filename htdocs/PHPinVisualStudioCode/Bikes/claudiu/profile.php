

<?php
  session_start();

  //update the number of replies and question of this user
  
  $search = "select count(id) as num_questions from questions where creator = '".$_SESSION['username']."' "; 
?>


<!DOCTYPE html>
<html lang="en">

<head>

<style>
input{
  text-align: center;
  width: 500px;
}
</style>
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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

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
              <li class="active"><a href="profile.php">Profilul meu</a></li>
              <li><a href="cos.php">Cos</a></li>
              <li><a href="despre_noi.php">Despre noi</a></li>

            </ul>
            <?php
                if(isset($_SESSION['username']) && $_SESSION['produse_in_cos'] > 0){
            ?>
              <p style="color:white; position:absolute; top:0px; right: 105px;" class="numberCircle"> <?php echo $_SESSION['produse_in_cos']?> </p>
            <?php
                }
            ?>           
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
    $_SESSION['return_page'] = "profile.php";
    require("login_required.php");

    require("connection.php");
    $_SESSION['error'] = "";
    
    
    if(isset($_SESSION['username'])){
        
        //update the number of replies and question of this user
  
        $search_num = "select count(id) as num_questions from questions where creator = '".$_SESSION['username']."' "; 
        $result_num = mysqli_query($con, $search_num);
        $row_num = mysqli_fetch_assoc($result_num);
        $num_of_questions = $row_num['num_questions'];

        $search_num = "select count(id) as num_comments from comments where creator = '".$_SESSION['username']."' "; 
        $result_num = mysqli_query($con, $search_num);
        $row_num = mysqli_fetch_assoc($result_num);
        $num_of_comments = $row_num['num_comments'];

        $update_num = "update login_form set replies = '$num_of_comments', questions = '$num_of_questions' where username = '".$_SESSION['username']."' ";
        mysqli_query($con, $update_num);
      
        $seach_pic = "select pic from login_form where username = '".$_SESSION['username']."' ";
        $result_pic = mysqli_query($con, $seach_pic);
        $my_pic;
        if($result_pic){
        while ($row = mysqli_fetch_assoc($result_pic))
        {
            $my_pic = $row['pic'];
        }}
?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .round_pic{
        border-radius: 50%;
    }
    /* table, th, td, tr{
            border: 1px solid black;
            text-align: center;
}     */
</style>
    

    <main>

            <div align = "center">
                <br><br><br>
                <img src="<?php echo $my_pic ?>" width="170" height="130" class = "round_pic"></img> 
                
                
                <?php 
                    $con = mysqli_connect('localhost', 'root', '', 'bikes');
                    $search_info = mysqli_query($con, "select * from login_form where username = '".$_SESSION['username']."'  ");
                    if($search_info){
                    while($row = mysqli_fetch_assoc($search_info))
                    {

                ?>
                        <table class="styled-table">
                            <tr>
                                <th colspan="2"><h3 class="cont">Contul meu</h3></th>
                            </tr>
                            <tr>
                                <td><h3>Utilizator</h3></td>
                                <td><h3><input type="text" id = "username" value='<?php echo $_SESSION['username']?>' style="border:none; background-color:transparent"> </h3></td>
                                </tr>
                                
                                <tr>
                                <td><h3>Email</h3></td>
                                <td><h3> <input type="text" id = "email" value='<?php echo $_SESSION['email']?>' style="border:none; background-color:transparent"> </h3></td>
                                </tr>

                                <tr>
                                <td><h3>Telefon</h3></td>
                                <td><h3> <input type="text" id = "telefon" value='<?php echo $_SESSION['telefon']?>' style="border:none; background-color:transparent" > </h3></td>
                                </tr>

                                <tr>
                                <td><h3>Județ</h3></td>
                                <td><h3><input type="text" id = "județ" value='<?php echo $_SESSION['județ']?>' style="border:none; background-color:transparent"> </h3></td>
                                </tr>

                                <tr>
                                <td><h3>Oraș</h3></td>
                                <td><h3><input type="text" id = "oraș" value='<?php echo $_SESSION['oraș']?>' style="border:none; background-color:transparent"></h3></td>
                                </tr> 

                                <tr>
                                <td><h3>Stradă</h3></td>
                                <td><h3><input type="text" id = "stradă" value='<?php echo $_SESSION['stradă']?>' style="border:none; background-color:transparent"></h3></td>
                                </tr>

                                <tr>
                                <td><h3>Nr</h3></td>
                                <td><h3><input type="text" id = "nr" value='<?php echo $_SESSION['nr']?>' style="border:none; background-color:transparent"></h3></td>
                                </tr>
                                
                                <!-- <tr>
                                <td><h3>Comentarii</h3></td>
                                <td><h3><?php //echo $row['replies']?></h3></td>
                                </tr> -->
                                
                                <!-- <tr>
                                <td><h3>Likes</h3></td>
                                <td><h3><?php //echo $row['likes']?></h3></td>
                                </tr> -->
                                
                                <!-- <tr>
                                <td><h3>Întrebări</h3></td>
                                <td><h3><?php //echo $row['questions']?></h3></td>
                                </tr> -->
                                
                                <tr>
                                <!-- <td> <a href="profile.php?action=ci"> <h3>Change Profile Picture</h3> </a></td> -->
                                <td>
                                    <h3>
                                        Schimbă poza de profil
                                    </h3>
                                </td>
                                
                                <td align="center">
                                    <h3>
                                    <form action="profile.php?action=ci" method = "POST" enctype = "multipart/form-data">
                                           <input type="file" name = "image">
                                           <input type="submit" name="submit" value = "Change">
                                            <!-- <h3><?php //echo $_SESSION['error']?></h3> -->
                                    </form>
                                    </h3>
                                </td>
                                </tr>

                                

                                
                            </table>
                <?php            
                        }
                        }
                ?>
                
                <a href="index.php?logout=true" class="btn btn-info btn-lg" style="width: 10%; height: 5%">
                    <span class="glyphicon glyphicon-log-out"></span> 
                    <h5>Log out</h5>
                </a>

            </div>
    </main>

    <script>
      var info = ["username", "email", "telefon", "județ", "oraș", "stradă", "nr"];
      var updates = {
        "username" : -1,
        "email" : -1,
        "telefon" : -1,
        "județ" : -1,
        "oraș" : -1,
        "stradă" : -1,
        "nr" : -1,
      }
      $(".cont").on("click", function(){
          var value = $(".cont").text();
          if(value != 'Contul meu')
          {
            console.log(updates);
            
            var send_updates = "update_profil.php?";
            for(var key in updates) {
              var value = updates[key];
              if(value != -1)
              {
                send_updates += key + "=" + value + "&";
              }
              
            }
            
            window.location.replace(send_updates);
          }
      });

      for(var i = 0; i < info.length; i++)
      {
        var optiune = "#" + info[i];
        // $(optiune).on('change', function(){
        //     $(".cont").text("Salvează modificări");
        //     $(".cont").css({"cursor" : "pointer", "color" : "orange"});
        //     console.log(optiune + " = " + $(optiune).val());
        // });
      }
      $("#username").on('change', function(){

      updates["username"] = $("#username").val();

      $(".cont").text("Salvează modificări");
      $(".cont").css({"cursor" : "pointer", "color" : "orange"});
      console.log("username" + " = " + updates["username"]);
      });

      $("#email").on('change', function(){

      updates["email"] = $("#email").val();

      $(".cont").text("Salvează modificări");
      $(".cont").css({"cursor" : "pointer", "color" : "orange"});
      console.log("email" + " = " + updates["email"]);
      });



      $("#telefon").on('change', function(){

            updates["telefon"] = $("#telefon").val();
            
            $(".cont").text("Salvează modificări");
            $(".cont").css({"cursor" : "pointer", "color" : "orange"});
            console.log("telefon" + " = " + updates["telefon"]);
      });
      $("#județ").on('change', function(){

            updates["județ"] = $("#județ").val();
            
            $(".cont").text("Salvează modificări");
            $(".cont").css({"cursor" : "pointer", "color" : "orange"});
            console.log("județ" + " = " + updates["județ"]);
      });
      $("#oraș").on('change', function(){

            updates["oraș"] = $("#oraș").val();
            
            $(".cont").text("Salvează modificări");
            $(".cont").css({"cursor" : "pointer", "color" : "orange"});
            console.log("oraș" + " = " + updates["oraș"]);
      });
      $("#stradă").on('change', function(){

            updates["stradă"] = $("#stradă").val();
            
            $(".cont").text("Salvează modificări");
            $(".cont").css({"cursor" : "pointer", "color" : "orange"});
            console.log("stradă" + " = " + updates["stradă"]);
      });
      $("#nr").on('change', function(){

            updates["nr"] = $("#nr").val();
            
            $(".cont").text("Salvează modificări");
            $(".cont").css({"cursor" : "pointer", "color" : "orange"});
            console.log("nr" + " = " + updates["nr"]);
      });
    </script>

</html>

<?php
    }
    else{
?>

<html>
    <main>

        <a href="forum_login.php?page=profile">Log in here</a>

    </main>
</html>

<?php
    }
    if(isset($_POST['submit'])){
        $errors = array();
        $allowd_e = array('png', 'jpg', 'jpeg');

        $file_name = $_FILES['image']['name'];
        $file_e = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_s = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        if(in_array($file_e, $allowd_e) === false){
            $errors[] = 'This file extension is not allowed';
            $_SESSION['error'] = $errors;
        }

        if($file_s > 20971520){
            $errors[] = 'File must be under 2 MB';
            $_SESSION['error'] = $errors;
        }

        if(empty($errors)){
            move_uploaded_file($file_tmp, 'assets/img/'.$file_name);
            $image_up = 'assets/img/'.$file_name;

            $change_pic = "update login_form set pic = '$image_up' where username = '".$_SESSION['username']."' ";
            mysqli_query($con, $change_pic); 

            //
            $URL="profile.php";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

        }
        else
        {
            foreach($errors as $error){
        ?>    

        <html>
                <script>
                        alert( "<?php echo $error ?>" );
                </script>
        </html>

        <?php    
                // echo $error."<br>";
            }
        }
        
        //$con
        require("connection.php");
        // $change_pic = "update login_form set pic = '".$_POST['image']."' where username = '".$_SESSION['username']."'";
        // mysqli_query($con, $change_pic);
        
    }
?>


    
  </main>
    <br>
    <br>
    <br>
   <!-- ======= Footer ======= -->
   <footer id="footer" style="position: relative; bottom: 0px;">

      
  
    <div class="container">

      <div class="copyright-wrap d-md-flex py-4">
        <div class="mr-md-auto text-center text-md-left">
          <div class="copyright">
            &copy; Copyright <strong><span>EmKla.Bike</span></strong>. All Rights Reserved
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.instagram.com/cristiano/" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

</body>