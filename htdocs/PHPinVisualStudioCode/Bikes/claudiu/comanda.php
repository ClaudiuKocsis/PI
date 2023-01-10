<?php
    session_start();
    if(isset($_GET['finalizat']) && $_GET['finalizat'] == 'true')
    {
        $_SESSION['produse_in_cos'] = 0;

        $msg = "Vă mulțumim că ați comandat de la noi. \nComanda cu numărul 2 va fi livrată în decurs de maxim o săptămână";
        $email = $_SESSION['email'];


        require("connection.php");
        $user = $_SESSION['user_id'];
        $sterg_cos = "DELETE from cos where cumparator = '$user' ";
        echo $user;
        mysqli_query($con, $user);

        $msg = wordwrap($msg, 70);
        mail($email, "Comandă", $msg);
    }
    {

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
              <li class="active"><a href="cos.php">Cos</a></li>
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
   
  <?php 
            for($i = 0; $i <= 5; $i++)
            {
              echo "<br>";
            }
        ?>

        <?php
            if(isset($_GET['finalizat']) && $_GET['finalizat'] == 'true')
            {   
                for($i = 0; $i <= 11; $i++)
                {
                  echo "<br>";
                }

                ?>
                    <h1 style="position:relative; left:450px;">Comanda a fost preluată cu succes. Mulțumim!</h1>
                <?php

                //golesc cosul, elimin din baza de date cos produsele detinute de SESSION['username']
                
                require("connection.php");
                $change = "delete from cos where cumparator = '".$_SESSION['user_id']."' ";
                mysqli_query($con, $change);
                header( "Refresh:3; url=index.php");
            }    
            else{

        ?>

  <div class="row" style="position: relative; left: 500px;">



        <div class="col-lg-6">
        <form action="comanda.php?finalizat=true" method="post" role="form" class="comanda-form">
            
            <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder = "Utilizator" value='<?php echo $_SESSION['username']?>'' data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
            <div class="validate"></div>
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Email" value = '<?php echo $_SESSION['email']?>'  data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
            <div class="validate"></div>
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Telefon" value = '<?php echo $_SESSION['telefon']?>' data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
            <div class="validate"></div>
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Județ" value = '<?php echo $_SESSION['județ']?>' data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
            <div class="validate"></div>
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Oraș" value = '<?php echo $_SESSION['oraș']?>' data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
            <div class="validate"></div>
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Stradă" value = '<?php echo $_SESSION['stradă']?>' data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
            <div class="validate"></div>
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Nr" value = '<?php echo $_SESSION['nr']?>' data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
            <div class="validate"></div>
            </div>


            <div>
            <input type="radio" name="radio" id = "plata_ramburs" style="display: inline-block;" checked="checked">
            <label>Ramburs</label>
            <input type="radio" name="radio" id = "plata_card" style="display: inline-block; position:relative; left:50px;">
            <label style="position: relative; left:50px;">Card</label>
            </div>

        
            <br>

            <div class="card-form" style="display: none">


                <h3>Nume proprietar</h3>

                <div class="form-group">
                <input type="text" class="form-control" name="subject" id="nume" placeholder="Nume" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                <div class="validate"></div>
                </div>

                <h3>Numar card</h3>

                <div class="form-group">
                <input type="text" class="form-control" name="subject" id="numar_card" placeholder="XXXX-XXXX-XXXX-XXXX" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                <div class="validate"></div>
                </div>

                <h3>Data expirarii</h3>

                <div class="form-group">
                <input type="text" class="form-control" name="subject" id="data_expirare" placeholder="MM/YY" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                <div class="validate"></div>
                </div>

                <h3>Cod CV</h3>

                <div class="form-group">
                <input type="text" class="form-control" name="subject" id="cvc" placeholder="CVC" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"/>
                <div class="validate"></div>
                </div>

            </div>


            
        </div>

        <form action="comanda.php?finalizat=true">
        <div class="col-md-12">
        <span class="accept_edit" style="display: block"> <button type = "submit" class="btn-primary btn" style="position: relative; width: 49.3%;" > Finalizează comanda</button> </span>          
        </div>
        </form>
    </form>
    
   
    
</div>

<?php

}
?>

                                

  </main>



            <script>
                $("#plata_card").on("click", function(){
                    $(".card-form").css({"display" : "block"});

                    $('#nume').prop("required", true);
                    $('#numar_card').prop("required", true);
                    $('#data_expirare').prop("required", true);
                    $('#cvc').prop("required", true);
                });
                $("#plata_ramburs").on("click", function(){
                    $(".card-form").css({"display" : "none"});

                    $('#nume').prop("required", false);
                    $('#numar_card').prop("required", false);
                    $('#data_expirare').prop("required", false);
                    $('#cvc').prop("required", false);
                });


                var previous = "";
                var card = "";
                $("#numar_card").on("keyup", function(e){

                    var value = $(this).val();
                    if(e.keyCode == 8){

                        $(this).prop("readonly", false);
                        console.log(previous);
                        var sters = previous[ previous.length - 1 ]
                        console.log("Am sters " + sters.charCodeAt(0));
                        
                        
                        if(sters == " ")
                        {
                            value = value.slice(0, -1);
                            console.log("refac cu " + value);
                            $(this).val(value);
                        }
                    }
                    else
                    {
                        contor = value.length;
                        if(contor > 19)
                        {
                            $(this).prop("readonly", true);
                            $(this).val(card);
                        }
                        if(contor == 19)
                        {
                            $(this).prop("readonly", true);
                            card = value;
                        }
                        if(contor == 4 || contor == 9 || contor == 14)
                        {
                            value = value + " ";
                            $(this).val(value);
                        }
                    }
                    console.log(contor);
                    previous = value;
                });

                var valoare_data = "";
                $("#data_expirare").on("keyup", function(e){

                    console.log(e.keyCode);
                    var $this = $(this);
                    if(e.keyCode != 8){
                        var value = $this.val(); 
                        if(value.length == 2)
                        {
                            $this.val(value + "/");
                        }
                        if(value.length == 5)
                        {
                            $this.prop("readonly", true);
                            valoare_data = value;
                        }
                        if(value.length > 5)
                        {
                            $this.val(valoare_data);
                            $this.prop("readonly", true);
                        }
                        console.log(value.length);
                    }
                    else
                        $this.prop("readonly", false);
                });
            </script>


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