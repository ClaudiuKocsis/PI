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
              <li><a href="Produse.php">Produse</a></li>
              <li><a href="despre_biciclete.php">Despre biciclete</a></li>
              <li class="active"><a href="forum.php">Forum</a></li>
              <li><a href="profile.php">Profilul meu</a></li>
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
?>

<html>

    
        <center>

                <form action="post.php" method = "POST">
                    <h1 class="text_span text_design"> <i><b>Numele topicului</b></i> </h1>
                    <br>
                    <textarea type="text" placeholder="Scrieți aici numele topicului" name="topic_name" style="width: 575px; height: 120px;" required></textarea>
                    <br><br>

                    <button type="submit" name = "submit" style="width: 30%;" class="btn-primary btn">Postează</button>
                </form>

        </center>
</html>
 
<?php
    if(isset($_POST['submit']))
    {      
        
        // echo $_POST['topic_name'];
        // echo $_POST['topic_content'];
        
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'bikes');
        
        $creator = $_SESSION['user_id'];
        $insert_topic = "insert into topics (topic_id, topic_name, topic_creator, topic_questions, topic_date) values ('', '".$_POST['topic_name']."', '$creator', '0', CURRENT_DATE())";
        
        mysqli_query($con, $insert_topic);


        //first i need to check if this topic table was already created
        // $try = "select id from $name limit 1";
        // $result_try = mysqli_query($con, $try);

        // if($result_try == false)
        // {
        //     //the table doesnt exist so i will create it
        //     //i need to create a tabel for every topic that contains all of the questions
        //     $create_topic_table = "CREATE TABLE $name (
        //         id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //         question VARCHAR(999),
        //         creator VARCHAR(999),
        //         replies INT(9) DEFAULT 0,
        //         date_created DATE DEFAULT CURRENT_TIMESTAMP()
        //     );";
        //     mysqli_query($con, $create_topic_table);
        // }

        // // //and if it does exist i will just add the question to it
        // // //now i have to fill in the question
        // // $insert_question = "insert into $name (id, question, creator, replies, date_created) values ('', '$content', '$creator', '', CURRENT_DATE())";
        // // mysqli_query($con, $insert_question);

        // $result_create = mysqli_query($con, $create_topic);
        
        // go back to forum section
        $URL="forum.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
?>

    
  </main>


</body>