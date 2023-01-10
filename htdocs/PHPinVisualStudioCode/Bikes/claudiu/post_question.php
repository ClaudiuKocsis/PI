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
              <li><a href="produse.php">Produse</a></li>
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


    <br>
    <br>
    <br>
    <br>
    <br>
    
  <main>
   
  <?php
    session_start();
?>

<html>
<center>

    <form action='post_question.php?topic_id=<?php echo $_GET['topic_id']?>&topic_name=<?php echo $_GET['topic_name']?>' method = "POST">
        <h1> <i><b>Adăugați o întrebare</i></b></h1>
        <br>
        <textarea type="text" placeholder="Scieți aici întrebarea pe care o aveți "name="question" style="width: 575px; height: 120px; resize: none" required></textarea>

        <br><br>
        <button type="submit" name = "submit" style="width: 30%;" class="btn-primary btn">Postează</button>

        
    </form>

</center>
</html>


<?php
    if(isset($_POST['submit'])){
    
    require("connection.php");

    $topic = $_GET['topic_id'];
    $question = $_POST['question'];
    $creator = $_SESSION['user_id'];
    $insert_question = "insert into questions (id, topic_id, question, creator, replies, date_created) values ('', '$topic', '$question', '$creator', '0', CURRENT_DATE())";
    mysqli_query($con, $insert_question);


    //increment with one the total amount of questions
    // $new_question = "update topics set topic_questions = topic_questions + 1 where topic_id = ".$_GET['topic_id']."";
    // mysqli_query($con, $new_question);
    // echo $question;

    // $update_questions_profile = "update login_form set questions = questions + 1 where username = '".$creator."'";
    // mysqli_query($con, $update_questions_profile);


    $URL="question_forum.php?topic_id=".$_GET['topic_id']."&topic_name=".$_GET['topic_name']."";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }

?>



    
  </main>

</body>