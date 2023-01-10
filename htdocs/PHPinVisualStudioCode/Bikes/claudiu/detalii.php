<?php
    session_start();
    $login = "false";
    if(isset($_SESSION['username']))
    {
        $login = "true";
    }
    else
    {
        $_SESSION['return_page'] = "detalii.php?id=".$_GET['id'];

    }

    if(isset($_GET['cos']) && $_GET['cos'] == "true")
    {
      echo "
      <script>
            var comanda = true;
        </script>
      ";
    }else
    {
      echo "
      <script>
            var comanda = false;
        </script>
      ";
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 1200px;
  max-height: 2000px;
  margin: auto;
  /* text-align: center; */
  font-family: arial;
}







@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #3e94ec;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 16px;
  font-weight: 400;
  text-rendering: optimizeLegibility;
}

div.table-title {
   display: block;
  margin: auto;
  width: 1200px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  width: 1200px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
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
              <li class="active"><a href="produse.php">Produse</a></li>
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

  <main>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
        require("connection.php");
        $id = $_GET['id'];
        $search = "select * from produse where id = '$id' ";

        $result = mysqli_query($con, $search);
        $row = mysqli_fetch_assoc($result);

        $poza = $row['poza'];
        $nume = $row['nume'];
        $pret = $row['pret'];

       $describe = mysqli_query($con, "describe produse");
       $contor = 0;

       $search_question_id = "select * from questions where question = '".$row['nume']."' ";
       $find_question_id = mysqli_query($con, $search_question_id);
       $get_question_id = mysqli_fetch_assoc($find_question_id);
       $question_id = $get_question_id['id'];
       
       $link = "answers.php?topic_id=5&question_id=".$question_id."&question_name=".$nume;

    ?>
    
    <div class="card">
        <h3 style="position: relative; top: 20px;" align = "center"> <?php echo $nume; ?> </h3><br>
        <img style="position: relative; left: 20px;"  src='<?php echo $poza;?>' width="500">
        <!-- <hr> -->
        <!-- <h3 style="position: relative; left: 20px; color: red"> Specificatii </h3> -->

        <div >
            <h3 style="position:absolute; top:200px; right:400px;">Preț</h3>
            <h3 style="position:absolute; top:200px; right:100px; color: red"> <?php echo $pret;?> Lei </h3>

            <br>

            <form action=<?php echo "adauga_in_cos.php?id=".$_GET['id']."&pret=".$pret;?> method = "POST" id="send_to_cos">
            <label for="marime" style="position:absolute; top:300px; right:370px;"><h3>Mărime</h3></label>
            <select name="marime" style="position:absolute; top:300px; right:130px;" action="detalii.php" method="POST">
                <option>XS</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
                <option>XXL</option>
            </select>

            <div class="container">
    
            <div class="buy">
                <button type="submit" class="btn btn-info btn-lg" id="comanda" style="position:absolute; top:400px; right:200px; width:200px;">
                <span class="glyphicon glyphicon-shopping-cart"></span> Cumpară
                </button>
            </div>
            </div>

            </form>
        </div>

        
        <body style="position: relative; left: 20px;">
            <table class="table-fill">
                <tr>
                    <th class="table-title"><h3 class="table-title">Specificații</h3></th>
                    <th class="table-title" align="right"><h3 class="table-title"> <a href="<?php echo $link?>">  Comentarii  </a> </h3></th>
                </tr>
            <tbody class="table-hover">
                
            <?php
                    while($field = mysqli_fetch_assoc($describe))
                    {
                        $col = $field['Field'];
                        $contor++;
                        if($contor >= 5 && $row[$col] != ""){
            ?>
            
            <tr>
                <td class="text-left"> <?php echo ucfirst($col);?> </td>
                <td class="text-left"> <?php echo $row[$col];?> </td>
            </tr>
            <?php
                        }
                    }

            ?>
            </tbody>
            </table>
        
        
        </body>
    </div>

    <script>
        $(".buy").on('click', function(){
            var cont = "<?php echo $login; ?>";
            var here = "<a>here</a>";
            if(cont == 'false')
            {
                //alert("Please login before you buy, you can login " + here);
                if (window.confirm('You need to login before you buy, press ok to login, or press cancel to return to the page')) 
                {
                    window.location.replace("forum_login.php");
                    console.log("ok");
                    document.getElementById("send_to_cos").action = "forum_login.php";
                }
                else
                    document.getElementById("send_to_cos").action = "";
            }
        });
    </script>

    <?php

        for($i = 0; $i <= $contor + 20; $i++)
        {
            echo "<br>";
        }
    ?>


        <script>
          if(comanda == true)
          {
              document.getElementById("comanda").click();
              console.log("trying");
          }
        </script>

    
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



<?php
    //echo "BRUV";

?>