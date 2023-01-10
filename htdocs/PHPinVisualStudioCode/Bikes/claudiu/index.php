<?php
  session_start();
  
  if(isset($_GET['logout']) && $_GET["logout"] == "true")
  {
    $_GET["logout"] = "false"; 
    session_destroy();
    echo '<script>
    window.location.replace("index.php");
    </script>';
  }
?>

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
 <main>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center">
          <h1 class="logo mr-auto"><a href="index.php">EmKla.Bike</a></h1>
          <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

          <nav class="nav-menu d-none d-lg-block">
            <ul>
            <li class="active"><a href="index.php">Home</a></li>
              <li><a href="produse.php">Produse</a></li>
              <li><a href="despre_biciclete.php">Despre biciclete</a></li>
              <li><a href="forum.php">Forum</a></li>
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
   <!-- ======= Hero Section ======= -->
   <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Totul despre biciclete intr-un singur loc</h1>
          <h2>Echipa noastra iti sta la dispozitie pentru a te ajuta!</h2>
          <div><a href="produse.php" class="btn-get-started scrollto">Incepe cumparaturile</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <?php
    require("connection.php");
    $search_users = "select id from login_form";
    $result_users = mysqli_query($con, $search_users);

    $num_users = mysqli_num_rows($result_users);


    $search_questions = "select count(id) as numar from questions";
    $result_questions = mysqli_query($con, $search_questions);

    $row = mysqli_fetch_assoc($result_questions);
    $num_questions = $row['numar'];

    $comments = "select count(id) as num_comments from comments";
    $result_comments = mysqli_query($con, $comments);

    $row = mysqli_fetch_assoc($result_comments);
    $num_replies = $row['num_comments'];

    $produse = "select count(id) as num_produse from produse";
    $result_produse = mysqli_query($con, $produse);

    $row = mysqli_fetch_assoc($result_produse);
    $num_produse = $row['num_produse'];

    

    $change_statistics = "update statistics set users = '".$num_users."', questions = '".$num_questions."', replies = '".$num_replies."', produse = '".$num_produse."' ";
    mysqli_query($con, $change_statistics);


?>

  <section class="counts section-bg">
    <div class="container">

      <div class="row">

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
          <div class="count-box">
            <i class="icofont-simple-smile" style="color: #20b38e;"></i>
            <span data-toggle="counter-up"> <?php echo $num_users?> </span>
            <p>Utilizatori</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
          <div class="count-box">
            <i class="icofont-document-folder" style="color: #cc0479;"></i>
            <span data-toggle="counter-up"> <?php echo $num_questions?> </span>
            <p>Întrebări</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
          <div class="count-box">
            <i class="icofont-live-support" style="color: #46d1ff;"></i>
            <span data-toggle="counter-up"> <?php echo $num_replies ?> </span>
            <p>Răspunsuri</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
          <div class="count-box">
            <img src="assets/img/home_bicycle.PNG" style="width: 117px;">
            <span data-toggle="counter-up"> <?php echo $num_produse ?> </span>
            <p>Produse</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

 </main>
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
        <a href="https://twitter.com/cristiano" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.facebook.com/Cristiano" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/cristiano/" class="instagram"><i class="bx bxl-instagram"></i></a>
    </div>

  </div>
</footer><!-- End Footer -->

</body>