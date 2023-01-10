<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<style>
    h1 {text-align: center;}
    h3 {text-align: center;}
    p {text-align: center;}
    div {text-align: center;}
    </style>

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
              <li class="active"><a href="despre_biciclete.php">Despre biciclete</a></li>
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
   




  <p> <br><br><br></p>
   
   <h1>Care sunt elemetele unei biciclete?</h1>
   
   <p style="font-size: medium;"> <br> <br>Daca te-ai intrebat vreodata din ce piese este compusa o bicicleta, inseamna ca ai nimerit unde trebuie : aici vei gasi toate detaliile.<br>Ca sa-ti fie mai simplu, 
     am creat o imagine in care sunt marcate componentele bicicletei.
    Te rugam sa faci click pe + pentru a o mari. <br>
     Sub imagine vei gasi toate componentele importante cu descrierile aferente si scopul prezentei lor pe bicicleta. Nimic in plus, nimic in minus.</p>
     <br>
     
     
     <section id="portfolio" class="portfolio" style="margin-left: 710px;">
       <div class="container" data-aos="fade-up">
     <div class="col-lg-4 col-md-6 portfolio-item filter-app">
       <div class="portfolio-wrap">
         <img src="assets/img/elemente.jpg" class="img-fluid" alt="">
         <div class="portfolio-info">
         </div>
         <div class="portfolio-links">
           <a href="assets/img/elemente.jpg" data-gall="portfolioGallery" class="venobox" title="Elementele bicicletei"><i class="bx bx-plus"></i></a>
         </div>
       </div>
     </div>
       </div>
     </section>
     
   </p> 
    
   
     <h3>Cadrul</h3>
   
    <p>
   
     Este componenta de baza a unei biciclete. Acesta poate avea diferite dimensiuni si diferite scopuri de utilizare : Mountain Bike, Semicursiera, BMX etc.
     <br> Cadrul este alcatuit in general din mai multe bucati de tevi sudate intre ele, excetie facand cadrele de carbon care sunt dintr-o singura bucata. <br>
     Bineinteles, materialul din care este construit cadrul determina coeficienti precum greutatea si pretul.<br><br>
   
   
   
     Spre exemplu, un cadru de carbon este mult mai usor ca unul de aluminiu, dar si mult mai scump. Cadrele mai pot fi din otel (in general la bicicletele vechi) sau crom-mo (care cunoaste un comeback). <br>
      Caderele pot avea deasemenea si diferite dimensiuni (mai mici sau mai mari). Majoritatea isi aleg cadrul in functie de scopul caruia ii este <br> 
      destinat ( downhill – coborari, cross country, trial etc) sau in functie de inaltimea rider-ului (un rider de 1.85 m va avea nevoie de un cadru mai inalt de minim 18 inch). <br>
      Toate marimile cadrelor sunt date in inch.
    </p>
   
   <br><br><br>
     <h3>Furca</h3>
     <p> 
       A doua componenta in ordinea importantei pe o bicicleta : furca poate fi de mai multe tipuri ca si constructie si scop de utilizare. Furcile sunt rigide (fara amortizor) <br>
       si mobile ( cu amortizoare ). Furcile rigide se folosesc in general pentru bicicletele de viteza sau ciclocross, pentru cele de sosea sau de oras unde nu exista denivelari ce trebuiesc absorbite.<br> 
       Furcile cu amortizor sunt mai complexe si pot functiona cu arcuri si ulei sau cu aer comprimat.<br><br>
   
       Deasemenea fiecare furca cu amortizor detine anumite specificatii tehnice de luat in seama : greutate, cursa (distanta de amortizare), reglaj, prinderi. <br>
       O furca cu amortizor pentru Cross Country poate avea o cursa de 80 de mm, pe cand una de coborare – downhill – poate avea cu cursa de 180 de mm. La fel ca si cadrele,<br>
        furcile au scopul lor precis si in general sunt adaptate cadrului si nevoilor riderului. Pretul unei furci cu amortizor decente porneste de la 4-500 lei.
     </p>
     <br><br><br>
   
     <h3>Butuci</h3>
   
     <p>
       Se regasesc la rotile bicicletei, atat in fata cat si in spate, si pe langa faptul ca spitele sunt prinse de acestea, butucii reprezinta piesele cele mai importante pe care se bazeaza rotile unei biciclete.<br>
        Butucii pot varia ca pret in functie de constructie, performante si componentele folosite. Spre exemplu, un butuc ce functioneaza cu rulmenti si nu cu coroane va costa mai mult.
     </p>
     <br><br><br>
   
     <h3>Angrenaj</h3>
   
     <p>
       Angrenajul reprezinta sistemul de punere in miscare a bicicletei de catre rider. Acesta este compus din mai multe elemente : foile, lantul si pinioanele. <br>
       Foile sunt montate pe bratele angrenajului, de care sunt prinse pedalele. In functie de foaia si pinionul utilizat puterea de pedalare creste, proportional cu aceasta crescand si viteza.<br>
        Pentru a se efectua manevra de schimbare a pinioanelor sau a foilor se folosesc schimbatoarele aferente acestora. <br>
        In situatia in care te aflii la munte, in fata unui deal, veti folosi foaia mica cu pinionul mare.<br><br>
   
        Astfel vei pedala foarte usor si vei putea urca fara prea mult efort dealul respectiv. Daca vei folosi aceaasi combinatie pentru drum intins, vei pedala aproape in gol. <br>
         Pentru viteza se foloseste foaia mare cuplata cu pinionul mic. Desi vei pedala mult mai greu, viteza va fi foarte mare. Altfel spus, la majoritatea bicicletelor exista 3 foi si 8 pinioane.<br> 
         Combinandu-le intre ele, vei reusi sa gasesti forta optima de pedalare in functie de terenul pe care rulezi. De mentionat, ca atat foile cat si pinioanele pot fi actionate de pe manetele instalate pe ghidon.
     </p>
     <br><br><br>
     <h3>Franele</h3>
   
     <p>
       Franele unei bicicletele sunt la fel de esentiale ca orice alta componenta. Tinand cont ca sunt elemente de sigurata, deoarece fara frane, orice vehicul este scapat de sub control,<br>
        vom acorda o mai multa importanta descrierii.Tipurile de frana se impart in mai multe categorii : cu actionare pe janta sau cu actionare pe disc.<br> 
        Atat franele cu actionare pe janta cat si cele cu actionare pe disc pot fi hidraulice sau mecanice. In ultima perioada, franele hidraulice au castigat<br>
         foarte mult teren in fata celor mecanice, deoarece datorita productiei in masa, au cunoscut o scadere a costurilor de achizitie.<br>
          Recomandarea noastra va ramane inttodeauna frana hidraulica, din mai multe motive : este mai sigura, este mai puternica, poate fi explotata in timp indelungat.<br><br>
   
          Franele mecanice se bazeaza pe un cablu de otel montat intre maneta de pe ghidon si etrier ( in cazul franei mecanice pe disc). Forta de franare este mult mai mica decat la cele hidraulice <br>
          si au existat numeroase situatii in care cablurile respective au cedat datorita unei utilizari intense. Se poate spune ca nu sunt foarte precise.<br><br> 
          
          Franele hidraulice pe disc in general au nevoie de mentenanta minima, important si recomandat este ca discul de franare sa ramana intreg dupa o tura pe la munte :<br> 
          discurile cu diametru mare se pot deforma foarte usor, ceea ce va duce la contactul acestuia cu placutele de frana, totul rezultand in infranarea bicicletei si un zgomot greu de suportat in unele cazuri.
     </p>
   
   
     <br><br><br>
     <h3>Concluzie</h3>
     <p>
       In general regula „dai un ban dar stai in fata” este perfect valabila si pentru biciclete sau pentru componentele acestora. Este in mod clar evident ca o bicicleta de<br>
        300 de Lei nu va avea niciodata performantele uneia de 2.000 euro. Limita de jos pentru o bicicleta OK, dupa aprecierea noastra evident, se situeaza undeva in jurul sumei de 350 euro. 
     </p>
   
    
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
          <a href="https://www.instagram.com" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

</body>