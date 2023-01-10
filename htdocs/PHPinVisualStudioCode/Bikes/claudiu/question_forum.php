<?php
  session_start();

  //update replies for each question
  require("connection.php");

  $topic_id = $_GET['topic_id'];
  $search = "select id from questions where topic_id = '".$topic_id."' "; 
  $result = mysqli_query($con, $search);

  while($row = mysqli_fetch_assoc($result))
  {
    $question_id = $row['id'];
    $search_comments = "select count(id) as numar from comments where topic_id = '$topic_id' and question_id = '$question_id' ";
    $result_comments = mysqli_query($con, $search_comments);

    $number = mysqli_fetch_assoc($result_comments);
    $number_replies = $number['numar'];

    $update = "update questions set replies = '$number_replies' where id = '$question_id' ";
    mysqli_query($con, $update);
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

<style>
  .question_name:hover{
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
        <br>


        <?php
  $_SESSION['return_page'] = "forum_section.php";
  require("login_required.php");
  // if(isset($_SESSION["username"]))
  //   echo $_SESSION['username'];
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
          
          <div class="button_cont" align="center"><a class="example_a" href='post_question.php?topic_id=<?php echo $_GET['topic_id']?>&topic_name=<?php echo $_GET['topic_name']?>' rel="nofollow noopener">Pune o întrebare</a></div>  

          <br><br>
          <h1>TOPIC</h1>
          <br>
          <h3><?php echo $_GET['topic_name']?></h3>

      </div>
    </section>
    <div >
    

      <?php
          $topic_id = $_GET['topic_id'];
          $topic_name = $_GET['topic_name'];
      ?>
      <center>
        <form action="question_forum.php?" method="GET" >
            <input name="search_words"  style="position:relative; width:800px;" placeholder="cauta..." value='<?php if(isset($_GET['search_words'])) echo $_GET['search_words']?>'  ></input>  
            <input name="topic_id" value="<?php echo $topic_id ?>" style="display: none"> 
            <input name="topic_name" value="<?php echo $topic_name ?>" style="display: none"> 
            <button type="submit" style="display: none" ></button>
        </form>    
      </center>
      <table class="styled-table">
        
            <tr>
              <th>Id</th>
              <th>Întrebare</th>
              <th>Creator</th>
              <th>Comentarii</th>
              <th>Dată</th>
            </tr>

            <?php
                  require("connection.php");

                  $topic_id = $_GET['topic_id'];

                  $filtre = "";
                  if(isset($_GET['search_words']) && $_GET['search_words'] != "")
                  {
                    $cuvinte = explode(" ", $_GET['search_words']);
                    $ok = 0;
                    for($i = 0; $i < count($cuvinte); $i++)
                    {
                        $word = $cuvinte[$i];
                        $filtre = $filtre." and question like '%$word%'  ";
                        
                    }
                  }
                  
                  $search = "select * from questions where topic_id = '$topic_id' ".$filtre;
                  $result = mysqli_query($con, $search);

                  if($result){

                    $number = 0;
                  while($row = mysqli_fetch_array($result))
                  {
                      $number++;

                      $user_id = $row['creator'];
                      $search_user_name = "select username from login_form where id = '$user_id' ";
                      $result_user_name = mysqli_query($con, $search_user_name);
                      $get_user_name = mysqli_fetch_assoc($result_user_name);
                      $creator = $get_user_name['username'];  

                   ?>

                        <tr>

                              <td> <?php echo $number ?> </td>
                              <td width = "500"> <a href='<?php echo "answers.php?topic_id=".$topic_id."&question_id=".$row['id']."&question_name=".$row['question'] ?>' > <span class="question_name"> <?php echo $row['question']  ?> </span> </a> </td>
                              <td> <?php echo $creator ?> </td>
                              <td> <?php echo $row['replies'] ?> </td>
                              <td> <?php echo $row['date_created'] ?> </td>
                        </tr>

                   <?php
                      
  
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