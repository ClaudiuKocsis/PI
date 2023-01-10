<?php
    session_start();
    require("produse_in_cos.php");
    if(isset($_SESSION['username']))
    {

    }
    else
    {
      $_SESSION['return_page'] = 'cos.php';
      echo '<script>
      window.location.replace("forum_login.php");
      </script>';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

<link rel="icon" href="assets/img/bike_icon_white.png">
<style>

main {
  padding: 1em;
}
table{
    text-align: center;
}
.table-wrapper {
  overflow: auto;
  max-width: 100%;
  background:
    linear-gradient(to right, white 30%, rgba(255,255,255,0)),
    linear-gradient(to right, rgba(255,255,255,0), white 70%) 0 100%,
    radial-gradient(farthest-side at 0% 50%, rgba(0,0,0,.2), rgba(0,0,0,0)),
    radial-gradient(farthest-side at 100% 50%, rgba(0,0,0,.2), rgba(0,0,0,0)) 0 100%;
  background-repeat: no-repeat;
  background-color: white;
  background-size: 40px 100%, 40px 100%, 14px 100%, 14px 100%;
  background-position: 0 0, 100%, 0 0, 100%;
  background-attachment: local, local, scroll, scroll;
}

tr {
  border-bottom: 1px solid;
}

th {
  background-color: #555;
  color: #fff;
  white-space: nowrap;
}

th,
td {
  text-align: center;
  padding: 0.5em 1em;
}

.numeric {
  text-align: right;
}
.zoom {
  padding: 30px;
  background-color: transparent;
  transition: transform .2s;
  width: 80px;
  height: 80px;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
.numberCircle {
    border-radius: 50%;
    width: 20px;
    height: 20px;
    padding: 2px;

    background: red;
    color: #666;
    text-align: center;

    font: 14px Arial, sans-serif;
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
  <scrip src="assets/vendor/jquery.easing/jquery.easing.min.js"></scrip>
  <scrip src="assets/vendor/php-email-form/validate.js"></scrip>
  <scrip src="assets/vendor/waypoints/jquery.waypoints.min.js"></scrip>
  <scrip src="assets/vendor/counterup/counterup.min.js"></scrip>
  <scrip src="assets/vendor/owl.carousel/owl.carousel.min.js"></scrip>
  <scrip src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></scrip>
  <scrip src="assets/vendor/venobox/venobox.min.js"></scrip>
  <scrip src="assets/vendor/aos/aos.js"></scrip>

  <!-- Template Main JS File -->
  <scrip src="assets/js/main.js"></scrip>

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
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <p style="color:red; position:absolute; top:30px; right: 300px;"> <?php if($_SESSION['produse_in_cos'] > 0 ) echo $_SESSION['produse_in_cos']?></p>

        <h1 align = "center">Coșul meu de cumparaturi</h1>


        <?php
            if($_SESSION['produse_in_cos'] != 0)
            {
        ?>

        <center>

            <table>
                <tr>
                    <th class="save" style="border: none; cursor: pointer" id="save">  Salvează </th>
                    <th>Produs</th>
                    <th>Model</th>
                    <th>Mărime</th>
                    <th>Cantitate</th>
                    <th colspan="2">Preț</th>
                </tr>
                

                <?php 

                        require("connection.php");

                        //iau toate biciclete din cos care le are username-ul curent
                        $search = "SELECT * from cos where cumparator = '".$_SESSION['user_id']."' order by id_produs asc";
                        $result = mysqli_query($con, $search);

                        $subtotal = "select sum(pret) as subtotal from cos where cumparator = '".$_SESSION['user_id']."'";
                        $subtotal_result = mysqli_query($con, $subtotal);

                        $row_subtotal = mysqli_fetch_assoc($subtotal_result);
                        $subtotal = $row_subtotal['subtotal'];

                        while($row = mysqli_fetch_assoc($result)){
                            $bike_id = $row['id_produs'];
                            $search_bike = "select * from produse where id = '$bike_id' ";
                            $result_bike = mysqli_query($con, $search_bike);
                           
                            $bike = mysqli_fetch_assoc($result_bike);
                            
                            $poza = $bike['poza'];
                            $nume = $bike['nume'];
                            $marime = $row['marime'];
                            $cantitate = $row['cantitate'];
                            $pret = $row['pret'];

                        
                ?>
                <tr>
                    <td> <img src="assets/img/catalog/remove_red.png" width="15" class="zoom"> </td>
                    <td> <a href='<?php echo "detalii.php?id=".$row['id_produs'] ?>' > <img src='<?php echo $poza;?>' width = "100"> </a> </td>
                    <td> <p class="nume"> <?php echo $nume;?> </p> </td>
                    <td>
                        <select class="size">
                            <option <?php if ($marime == 'XS') echo "selected";?>>XS</option>
                            <option <?php if ($marime == 'S') echo "selected";?>>S</option>
                            <option <?php if ($marime == 'M') echo "selected";?>>M</option>
                            <option <?php if ($marime == 'L') echo "selected";?>>L</option>
                            <option <?php if ($marime == 'XL') echo "selected";?>>XL</option>
                            <option <?php if ($marime == 'XXL') echo "selected";?>>XXL</option>
                        </select>
                    </td>

                    <td> <div><span> <img src="assets/img/catalog/minus.png" width="26" class="minus-btn"> </span>  <input class = "cantitate" value='<?php echo $cantitate;?>' size="1" style="text-align: center;" >  <span> <img src="assets/img/catalog/plus.png" width="40" class="plus-btn"> </span> </div></td>
                    <td> <div value="1000" class="pret" > <?php echo $pret;?> </div> </td>   
                    <td> Lei </td>
                    <td style="display:none"> <p class="bike_id" > <?php echo $row['id']?> </p> </td>  
                    <td style="display:none"> <p class="pret_initial" > <?php echo $row['pret_initial']?> </p> </td>               
                </tr>

                <?php 
                        }
                ?>



                <!-- subtotalu -->
                <tr style="border-bottom: 0px">
                    <td colspan="4"></td>
                    <td> <h4>Total </h4> </td>
                    <td> <div class="subtotal"> <b><?php echo $subtotal;?> </b> </div> </td>
                    <td> <h4>Lei</h4> </td>
                </tr>

                
                
              </table>
              
              <form action="comanda.php">
              <div class="row">
                              <div class="col-md-12">
                                   <span class="finalizeaza" style="display: block"> <button type = "submit" class="btn-primary btn" style="position: relative; width:30%;"> Plasează comanda</button> </span>   
                              </div>       
              </div>
                      </form>
            </center>

        <?php
            }
            else
            {
              for($i = 0; $i <= 7; $i++)
                    echo "<br>";
            }
        ?>


        <?php 

        ?>
        <script>
            $(".subtotal").css({"color" : "red", "font-weight" : "bold"});
            $(".subtotal").wrap("<h4 />");
            var changes = [];


            var cantitate_veche = -1;;
            $(".cantitate").on('keydown', function () { 
                console.log($(this).val());
                if(cantitate_veche == -1)
                  cantitate_veche = $(this).val();
             });
            $(".cantitate").on('change', function(){
                var pret_final = $(this).closest("tr").find(".pret");
                var pret_initial = parseInt($(this).closest("tr").find(".pret_initial").text());
                var cantitate = parseInt($(this).val());
                var rez = pret_initial * cantitate;

                if(cantitate >= 1){
                  
                cantitate_veche = -1;
                pret_final.text(rez);



                //schimb atributele din baza de date
                var nume = $(this).closest('tr').find('.nume').text();
                var size = $(this).closest('tr').find('.size').val();
                var id = $(this).closest('tr').find('.bike_id').text();

                schimba_atribute(nume, cantitate, rez, size, id);

                change_save_color();

                var preturi = document.getElementsByClassName('pret');
                 var k = preturi.length;
                 var suma = 0;
                 for(var i = 0; i < k; i++)
                 {
                     suma += parseInt(preturi[i].innerHTML);
                 }

                 var subtotal = $(this).closest('table').find('.subtotal');
                 subtotal.text(suma);
                 console.log(suma);


                }
                else{
                    if(cantitate == 0)
                    {
                      //delete the bike
                      var id = $(this).closest('tr').find('.bike_id').text();

                      var query = "delete from cos where id = '" + id + "'";

                      changes.push(query);

                      apply_changes();
                    }
                    else
                        $(this).val(cantitate_veche);
                  }
            });

            function apply_changes(){
                $result = "actualizeaza.php?";
                for(var i=0; i<changes.length; i++)
                {
                    $result += i + "=" + changes[i] + "&";
                }
                window.location.replace($result);
            }

            $('.save').on('click', function(){
                // $result = "actualizeaza.php?";
                // for(var i=0; i<changes.length; i++)
                // {
                //     $result += i + "=" + changes[i] + "&";
                // }
                // window.location.replace($result);
                apply_changes();
            });


            $('.zoom').on('click', function(){

                var id = $(this).closest('tr').find('.bike_id').text();

                var query = "delete from cos where id = '" + id + "'";

                changes.push(query);
                
                apply_changes();
            });
            function schimba_size(id, size){
                console.log("Schimb bicicleta cu id= " + id + " la marimea " + size);
                var $query = "update cos set marime = '" + size + "' where id='" + id + "'";
                console.log($query);
                changes.push($query);
            }

            function schimba_atribute(nume, value, pret, size, id){
                var query = "update cos set cantitate = '" + value + "', pret = '" + pret + "' where id = '" + id + "'"; 
                changes.push(query);
                console.log(query);
            }

            $('.size').on('change', function(){
                var size = $(this).val();
                var id = $(this).closest('tr').find('.bike_id').text();
                // console.log("S-a schimbat size la: " + size);
                change_save_color();
                schimba_size(id, size);
            });

            function change_save_color(){
                document.getElementById('save').style.color = 'orange';
                $(".finalizeaza").css({"display" : "none"});
            }
            $(".minus-btn").on('click', function(){

                change_save_color();
                var change = 1;
                var $this = $(this);
                var $input = $this.closest('div').find('input');
                var value = parseInt($input.val());
                console.log(value);
                if(value > 1){
                    value--;
                    change = 0;
                    $input.val(value);
                    
                    //actualizare pret
                    var initial = parseInt($this.closest('tr').find(".pret_initial").text());  
                    var input = $this.closest('tr').find('.pret');
                    var pret = initial * value;
                    
                    console.log(input.val())
                    
                    input.text(pret);

                    //fac rost de numele bicicletei
                    var nume = $this.closest('tr').find('.nume').text();
                    var size = $this.closest('tr').find('.size').val();
                    var id = $(this).closest('tr').find('.bike_id').text();
                    console.log("Nume: " + nume);
                    console.log("Cantitate: " + value);
                    console.log("Pret: " + pret);
                    console.log("Size: " + size);
                    console.log("id" + id);

                    schimba_atribute(nume, value, pret, size, id);

                    //de fiecare data cand value(cantitatea) si pret se schimba, trebuie sa modific si baza de date
                    
                }

                 //actualizare rezultat
                 if(change == 0){

                 var preturi = document.getElementsByClassName('pret');
                 var k = preturi.length;
                 var suma = 0;
                 for(var i = 0; i < k; i++)
                 {
                     suma += parseInt(preturi[i].innerHTML);
                 }

                 var subtotal = $this.closest('table').find('.subtotal');
                 subtotal.text(suma);
                 console.log(suma);

            }
            

            });
            $('.plus-btn').on('click',  function(){
                
                change_save_color();
                var $this = $(this);
                var $input = $this.closest('div').find('input');
                var value = parseInt($input.val());
                value++;
                $input.val(value);
                console.log(value);


                //actualizare pret
                var initial = parseInt($this.closest('tr').find(".pret_initial").text()); 
                var input = $this.closest('tr').find('.pret');
                var pret = initial * value;

                console.log(input.val())
                
                input.text(pret);


                //fac rost de numele bicicletei
                var nume = $this.closest('tr').find('.nume').text();
                    var size = $this.closest('tr').find('.size').val();
                    var id = $(this).closest('tr').find('.bike_id').text();
                    console.log("Nume: " + nume);
                    console.log("Cantitate: " + value);
                    console.log("Pret: " + pret);
                    console.log("Size: " + size);
                    console.log("id" + id);

                    schimba_atribute(nume, value, pret, size, id);



                //actualizare rezultat
                var preturi = document.getElementsByClassName('pret');
                 var k = preturi.length;
                 var suma = 0;
                 for(var i = 0; i < k; i++)
                 {
                     suma += parseInt(preturi[i].innerHTML);
                 }

                 var subtotal = $this.closest('table').find('.subtotal');
                 subtotal.text(suma);
                 console.log(suma);
            });
            function plus(){
                console.log("+");
            }

        </script>



    <?php
        // $marime = $_POST['marime'];
    ?>


    
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

<?php 
    
?>