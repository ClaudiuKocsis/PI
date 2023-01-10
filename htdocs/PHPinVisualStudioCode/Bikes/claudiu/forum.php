<?php
  session_start();

  //update la fiecare topic numarul de intrebari
  require("connection.php");

  $search = "select topic_id from topics";
  $result = mysqli_query($con, $search);

  while($row = mysqli_fetch_assoc($result))
  {
    $search_questions = "select count(id) as numar from questions where topic_id = '".$row['topic_id']."' ";
    $result_questions = mysqli_query($con, $search_questions);
    $num_questions = mysqli_fetch_assoc($result_questions);

    $query = "update topics set topic_questions = '".$num_questions['numar']."' where topic_id = '".$row['topic_id']."' ";
    mysqli_query($con, $query);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .topic_name:hover{
        color: red;
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
              <li class="active"><a href="forum.php">Forum</a></li>
              <li><a href="profile.php">Profilul meu</a></li>
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




<?php
  $_SESSION['return_page'] = "forum.php";
  require("login_required.php");
?>

<!DOCTYPE html>
<html lang="en">

<style>
/* table, th, td, tr{
  border: 1px solid black;
  text-align: center;
}
.td{
  width: auto;
} */
</style>

<body>


  <main id="main">

    <section class="inner-page">
      <div class="container">
          
      <div class="button_cont" align="center"><a class="example_a" href="post.php" rel="nofollow noopener">Postează Topic Nou</a></div>
      <!-- <div class="button_cont" align="left"><a class="example_a" href="forum_section.php" rel="nofollow noopener">Forum</a></div>     -->


      </div>
    </section>
    <div >
    
    
        <table class="styled-table">
        
            <tr>
              <th>Id</th>
              <th>Titlu</th>
              <th>Creator</th>
              <th>Întrebări</th>
              <th>Dată</th>
            </tr>

            <?php
                  $con = mysqli_connect('localhost', 'root', '');
                  mysqli_select_db($con, "bikes");

                  $search = "select * from topics";
                  $result = mysqli_query($con, $search);

                  $contor = 0;

                  if($result){
                  while($row = mysqli_fetch_array($result))
                  {
                      
                      $contor++;

                      $user_id = $row['2'];
                      $search_user_name = "select username from login_form where id = '$user_id' ";
                      $result_user_name = mysqli_query($con, $search_user_name);
                      $get_user_name = mysqli_fetch_assoc($result_user_name);
                      $creator = $get_user_name['username'];  
                  
                  ?>

                        <tr>
                          <td> <?php echo $contor ?> </td>
                          <td> <a href='<?php echo "question_forum.php?topic_id=".$row['0']."&topic_name=".$row['1']?>'  > <span class="topic_name"> <?php echo $row['1'] ?> </span> </a> </td>
                          <td> <?php echo $creator ?> </td>
                          <td> <?php echo $row['3'] ?> </td>
                          <td> <?php echo $row['4'] ?> </td>
                        </tr>

                  <?php
                      // echo " <tr>
                      //             <td>".$contor."</td>
                      //             <td><a href='question_forum.php?topic_id=".$row['0']."&topic_name=".$row['1']."'> <span class='topic_name'> ".$row['1']." </span> </a></td>
                      //             <td>".$creator."</td>
                      //             <td>".$row['3']."</td>
                      //             <td>".$row['4']."</td>
                      //       </tr>";
                  }
                }
            ?>


        </table>
    
    </div>


  </main><!-- End #main -->
                
 
</html>



    
  </main>

        <?php 
            for($i = 0; $i <= 16; $i++)
            {
              echo "<br>";
            }
        ?>

   <!-- ======= Footer ======= -->
   <footer id="footer">

      
  
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