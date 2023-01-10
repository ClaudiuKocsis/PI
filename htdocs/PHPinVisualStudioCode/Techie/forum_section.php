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

</head>

<body>
<main>
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
              <li><a href="Produse.html">Produse</a></li>
              <li><a href="despre_biciclete.html">Despre biciclete</a></li>
              <li class="active"><a href="forum_section.php">Forum</a></li>
              <li><a href="despre_noi.html">Despre noi</a></li>

            </ul>
          </nav><!-- .nav-menu -->

          
        </div>
      </div>

    </div>
  </header><!-- End Header -->


      <main id="main">
    
        <section class="inner-page">
          <div class="container">
              
          <div class="button_cont" align="center"><a class="example_a" href="post.php" rel="nofollow noopener">Post Topic</a></div>
          <!-- <div class="button_cont" align="left"><a class="example_a" href="forum_section.php" rel="nofollow noopener">Forum</a></div>     -->
    
    
          </div>
        </section>
        <div >
        
        
            <table class="styled-table">
            
                <tr>
                  <th>Number</th>
                  <th>Title</th>
                  <th>Creator</th>
                  <th>Questions</th>
                  <th>Date created</th>
                </tr>
    
                <?php
                      $con = mysqli_connect('localhost', 'root', '');
                      mysqli_select_db($con, "atestat");
    
                      $search = "select * from topics";
                      $result = mysqli_query($con, $search);
    
    
                      if($result){
                      while($row = mysqli_fetch_array($result))
                      {
                          
            
    
                          
                          echo " <tr>
                                      <td>".$row['0']."</td>
                                      <td><a href='question_forum.php?topic_id=".$row['0']."&topic_name=".$row['1']."'>".$row['1']."</a></td>
                                      <td>".$row['2']."</td>
                                      <td>".$row['3']."</td>
                                      <td>".$row['4']."</td>
                                </tr>";
                      }
                    }
                ?>
    
            </table>
        
        </div>
    
    
      </main><!-- End #main -->

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
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.instagram.com/cristiano/" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

</body>