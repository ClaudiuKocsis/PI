<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>

.table_design{
    border-spacing: 100px;
    position: absolute;
    top: 0px;
    left: 300px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 330px;
  height: 400px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}
.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}

.options{
    position: relative;
    left: 90px;
}
.circle {
        border-radius: 50%;
        width: 28px;
        height: 28px;
        padding: -2px;
        background: #fff;
   
        color: #000;
        text-align: center;
        font: 20px Arial, sans-serif;
background-color: red;
color: white;
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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <scrip src="assets/vendor/jquery.easing/jquery.easing.min.js"></scrip>
  <scrip src="assets/vendor/php-email-form/validate.js"></scrip>
  <scrip src="assets/vendor/waypoints/jquery.waypoints.min.js"></scrip>
  <scrip src="assets/vendor/counterup/counterup.min.js"></scrip>
  <scrip src="assets/vendor/owl.carousel/owl.carousel.min.js"></scrip>
  <scrip src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></scrip>
  <scrip src="assets/vendor/venobox/venobox.min.js"></scrip>
  <scrip src="assets/vendor/aos/aos.js"></scrip>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">  

  <!-- ISO -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap-design.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <link rel="icon" href="assets/img/bike_icon_white.png">

</head>

<body>

  <!-- ======= Header ======= -->

  <div class="bootstrap-design">
 
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
              <!-- <div class="circle" style="position: absolute; top: 10px; right: 200px"><b>3</b></div> -->
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
</div>

  <main>
    
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="options">

        

        <form method = "POST" action = "produse.php">
                <p><b>Caută</b></p>
                <input name="search_words" type="text" placeholder="Search..." size="13px" value="<?php if(isset($_POST['search_words'])) echo $_POST['search_words']?>" class="search_value">
                <img src="assets/img/catalog/search.png" width="20px" style="position: relative; top: 5px; cursor: pointer" class="search_box">

            <br>
            <br>

            <p><b>Preț</b></p>
            <select class = "select_pret"  name="ordine" <?php if(isset($_POST['ordine'])) echo 'checked'; ?>>
                
                <?php
                    $unu = 'crescator';
                    $doi = 'descresctor';
                    if(isset($_POST['ordine']) && $_POST['ordine'] == 'Descrescator'){
                        echo "<option>Descrescator</option>"; 
                        echo "<option>Crescator</option>";
                    }
                    else
                    {
                        echo "<option>Crescator</option>";
                        echo "<option>Descrescator</option>"; 
                    }
                ?>

            </select>
            
            <br>
            <label>De la:</label>
              <br>
              <input style="width: 113px;" name="pret_inceput" value='<?php if(isset($_POST['pret_inceput'])) echo $_POST['pret_inceput']?>' >  </input>
              <br>
              <label>Până la:</label>
              <br>
              <input style="width: 113px;" name="pret_final" value='<?php if(isset($_POST['pret_inceput'])) echo $_POST['pret_final']?>' > </input>
            <br>
            <br>


        <?php
        require("connection.php");

        $v = ['producător', 'tip', "cadru", 'viteze', 'foi', 'diametru', 'frână'];

        for($i = 0; $i <= 6; $i ++){
            
            $search = "select distinct ".$v[$i]." from produse order by ".$v[$i]." asc";
            $result = mysqli_query($con, $search);
            echo "<b>".ucfirst($v[$i])."</b><br>";
            
            $j = 0;
            while($row = mysqli_fetch_assoc($result))
            {
                $optiune = $row[ $v[$i] ];
                $j++;
                $name = $v[$i].$j; 

                if($optiune != ""){
        ?>
        <input type="checkbox" name='<?php echo $name?>' value='<?php echo $optiune?>' <?php if(isset($_POST[$name])) echo 'checked'; ?> class="checkbox_clicked">
        <label > <?php echo $optiune?> </label><br>
        <?php
                
            }
          }
            echo "<br>";
        }
        ?>
        <input type="submit" name =  "submit" value="Aplica filtre" id="aplica_filtre" style="display: none;">

    </form>
    </div>
    
        <?php


            //caut dupa filtrele selectate
            $list = "select * from produse ";
            if(isset($_POST['submit']))
          {
          

              $list = "select * from produse ";
              
              $where = 0;
              for($i = 0; $i <= 6; $i++)
              {
                // echo $v[$i];
                // echo "<br>";
                  $ok = 0;
                  
                  $search = "select distinct ".$v[$i]." from produse";
                  //numar optiunile pt fiecare selectare
                  $result = mysqli_query($con, $search);

                  $j = 0;
                  while($row = mysqli_fetch_assoc($result))
                  {
                    $j++;
                    $nume = $v[$i].$j;
                    if(isset($_POST[$nume]))
                    {
                        if($ok == 0)
                        {
                            if($where == 0)
                            {
                              $list = $list."where (".$v[$i]." = '".$_POST[$nume]."' ";
                              $ok = 1;
                              $where = 1;
                            }
                            else
                            {
                              $list = $list."and (".$v[$i]." = '".$_POST[$nume]."' ";
                              $ok = 1;
                            }
                        }
                        else
                            $list = $list." or ".$v[$i]." = '".$_POST[$nume]."' ";
                    }
                      
                  }
                  if($ok != 0)
                  {
                    $list = $list.") ";
                  }
              }
              ///adaug search boxul
              if(isset($_POST['search_words']) && $_POST['search_words'] != ""){
                $cuvinte = explode(" ", $_POST['search_words']);
                
                $k = count($cuvinte);
                $filtre;
                for($i = 0; $i < $k; $i++)
                {
                  if($i == 0)
                  {
                     if($list == "select * from produse ")
                     {
                        $filtre = "where nume like ";
                     }
                     else
                     {
                       $filtre = "and nume like ";
                     }
                  }
                  $filtre = $filtre." '%".$cuvinte[$i]."%' ";
                  if($i != $k - 1)
                  {
                     $filtre = $filtre." and nume like ";
                  }
                }
                $list = $list.$filtre;
              }
              if(isset($_POST['pret_inceput']) && $_POST['pret_inceput'] != "") 
              {
                $filtre;
                $inceput = $_POST['pret_inceput'];
                if($list == "select * from produse ")
                {
                  $filtre = "where pret >= '$inceput' "; 
                }
                else
                {
                  $filtre = "and pret >= '$inceput' ";
                }
                $list = $list.$filtre;
              }
              if(isset($_POST['pret_final']) && $_POST['pret_final'] != "")
              {
                $filtre;
                $final = $_POST['pret_final'];
                if($list == "select * from produse ")
                {
                  $filtre = "where pret <= '$final' "; 
                }
                else
                {
                  $filtre = "and pret <= '$final' ";
                }
                $list = $list.$filtre;
              }



              $list = $list." order by pret ";
              if($_POST['ordine'] == 'Descrescator')
              {
                $list = $list." desc";
              }
              else
              {
                $list = $list." asc";
              }
          }
          else
          {
            $list = $list." order by pret asc";
          }

            
            $search_bike = $list;
            // echo "<br>";
            // echo "<br>";
            // echo "this is my list ".$list;
            // echo "<br>";
            $result = mysqli_query($con, $search_bike);
        ?>
       
        <table class="table_design">
            <?php
              $nr_produse = 0;
              $stop = 0;
              $gasit = 0;
              while($stop == 0)
              {
                
            ?>
                
            <tr>
            <?php
                for($i = 0; $i <= 2; $i++)
                {
            ?>


                    <?php
                        
                        if($result){
                          $nr_produse++;
                        $row = mysqli_fetch_assoc($result);

                        if($row)
                        {
                          $gasit = 1;
                          ?>

                          <!-- fac sectiunea de commenturi pentru bicicleta curenta dupa numele ei -->
                          <!-- caut daca sectiunea deja exista -->
                          <?php
                              $search_bike_name = "select * from questions where question = '".$row['nume']."' ";
                              $result_bike_name = mysqli_query($con, $search_bike_name);

                              $bike = mysqli_num_rows($result_bike_name);
                              if($bike == 0)
                              {
                                  // nu am gasit intrebare deci o sa creez sectiunea pentru bicicleta curenta
                                  //topic_id = 5 pentru ca topicul de biciclete este 5
                                  $create_bike_question = "insert into questions(id, topic_id, question, creator, replies, date_created) values('', '5', '".$row['nume']."', '10', '0', CURRENT_DATE())";
                                  mysqli_query($con, $create_bike_question);  
                              }

                          ?>
                        
                        <td class="card" style="position:relative">
                          <p style="position:absolute; bottom: 0px;">
                            <a target="_blank" href=<?php echo "detalii.php?id=".$row['id']?>><img src=<?php echo $row['poza']?> width="300px" ></a>

                            <span>
                              <b> <?php echo $row['nume']?> </b>
                            </span>

                            <span>
                              <br>
                              <b style="color:red"> <?php echo $row['pret']?> Lei </b>
                            </span>

                            <span>
                              <br>
                              <a  target="_blank" href='<?php echo "detalii.php?id=".$row['id']?>&cos=true' style="color: white;"><button> Adaugă în cos </button> </a>
                            </span>

                        
                          </p>
                          <!-- <p style="color: red; position:absolute; bottom: -30px;" > <b> <?php echo $row['pret']?> Lei </b> </p> -->
                        </td>
                      
                    <?php
                        }
                        else
                        {
                          $stop = 1;
                          break;
                        }}
                        
                        
                        ?>

          <?php
              }
          ?>
              </tr>
    
            <?php
              }
              if($gasit == 0)
              {
            ?>
              <td width = "1000"><h1 style = "position: absolute; margin-left:auto; margin-right:auto;">Nu am găsit niciun produs</h1></td>
            <?php
              }
            ?>

        <table>

        <?php 

            for($i = 1; $i <= $nr_produse / 3 * 15; $i++)
            {
                echo "<br>";
            }
        ?>

        <script>
        //refresh pentru fiecare filtru
          $(".checkbox_clicked").on('change', function(){
            aplica_filtre();
          })

          $(".select_pret").on('change', function(){
            aplica_filtre();
          })
          function aplica_filtre()
          {
              document.getElementById("aplica_filtre").click();
          } 
          $(".search_box").on('click', function(){

            console.log('BRO');  
            var value = $('.search_value').val();
            
            console.log(value);
            aplica_filtre();
            //window.location.replace('produse.php?search=' + value);
          });
          //fix Confirm Form Resubmission
          if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
          }
        </script>
    


    
  </main>

    <div class="bootstrap-design">
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
</div>

</body>

<?php

?>
<!-- <div class="circle" style="position: absolute; top: 70px; right: 200px"><b>3</b></div> -->
