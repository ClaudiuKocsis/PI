<?php
  session_start();

  if(isset($_GET['reload']) && $_GET['reload'] == 'true')
  {   
    echo "
    <script>
        var link = document.URL;
        link = link.substring(0, link.length - 12);
        window.location.replace(link);
    </script>
    ";
  }

  $topic = $_GET['topic_id'];
  $question = $_GET['question_id'];
  $user = $_SESSION['user_id'];
  echo "
    <script>
        var topic_id = '$topic';
        var question_id = '$question';
        var user = '$user'; 
    </script>
  "
?>
<!DOCTYPE html>
<html lang="en">

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 60px;
  max-height: 70px;
  text-align: center;
  font-family: arial;
}
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
    <br>
    <br>


  <?php
    // echo $_GET['topic_id'];
    // echo "<br>";
    // echo $_GET['topic'];
    // echo "<br>";
    // echo $_GET['question_id'];
    // echo "<br>";
    // echo $_GET['question_name'];

    $conn = mysqli_connect('localhost', 'root', '', 'bikes');
    if(isset($_POST['comment'])){
        // $comment = $_POST['comment'];
        // $user_id = $_SESSION['user_id'];
        // $conn->query("insert into comments (id, userID, comment, createdOn) values ('', '$user_id', '$comment', NOW())");
        // exit("succes");
        //if this is the first comment i need to create the table with the name topic_id + "_" + question_id;
        echo $_POST['comment'];
        exit("succes");
        // $table = $_GET['topic_id']."_".$_GET['question_id'];
        //keep in mind that topic_id can be greater than 9 so i need to extract the exacnt number not only table[0] to find topic_id

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .user {
            font-weight: bold;
            color: black;
        }

        .time {
            color: gray;
        }

        .userComment{
            color: #000;
            width:500px;
            /* border:1px solid blue; */
            word-wrap:break-word;
            
        }

        .replies .comment{
            margin-top: 20px;
        }
        .replies{
            margin-left: 20px;
        }
        .round_pic{
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
            <div class="col-md-12" align = "center">
            <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/eD02QLsTUnY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
            <h1> <?php echo $_GET['question_name']?> </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action=<?php echo "new_comment.php?topic_id=".$_GET['topic_id']."&question_id=".$_GET['question_id']."&question_name=".urlencode($_GET['question_name']) ?> method = "POST">
                    <textarea type = "text " id = "mainComment" name = "comment" class="form-control" placeholder="Add Public Comment" cols="30" rows="10" required></textarea><br>
                    <button type = "submit" id="addComment" class="btn-primary btn" style="float: right;">Adaugă un comentariu</button>          
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- display the number of comments -->
                
                <h2><b>
                <?php 
                    require("connection.php");
                    
                    $topic_id = $_GET['topic_id'];
                    $question_id = $_GET['question_id'];
                    
                    // $search = "select * from comments where topic_id='$topic_id' and question_id='$question_id' ";
                    // $result = mysqli_query($con, $search);
                    
                    // $num = 0;
                    // if($result)
                    // $num = mysqli_num_rows($result);
                    // if($num == 1)
                    //     $comment = " Comentariu";
                    // else
                    //     $comment = " Comentarii";
                    // echo $num.$comment;

                    $search = "SELECT * from questions where id = '$question_id' ";
                    $result = mysqli_query($con, $search);
                    $row = mysqli_fetch_assoc($result);

                    $num = $row['replies'];
                    if($num == 1)
                        $comment = " Comentariu";
                    else
                        $comment = " Comentarii";
                    echo $num.$comment;
                    ?>
                </b></h2>


                    <?php
            
                          for($i = 0; $i <= 7; $i++)
                          echo "<br>";
                    ?>

                

                
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>

    </div>
                <!-- displaying a comment -->
                
                <?php 

$frec = array_fill(0, 1000000, 0);
function afiseaza($poz, $filtre){

global $frec;
global $topic_id;
global $question_id;

require("connection.php");
$search = "SELECT * FROM comments where topic_id = '$topic_id' and question_id = '$question_id' ".$filtre;
$result = mysqli_query($con, $search);

while($row = mysqli_fetch_assoc($result))
{

    $id = $row['id']; 


    $search_pic = "select pic from login_form where id = '".$row['creator']."'";
          $result_pic = mysqli_query($con, $search_pic);

          $profile_pic = mysqli_fetch_assoc($result_pic);

          $get_creator_by_id = "select username from login_form where id = '".$row['creator']."' ";
          $result_get_creator = mysqli_query($con, $get_creator_by_id);

          $result_creator = mysqli_fetch_assoc($result_get_creator);
    if($frec[$id] == 0){
                        

                        
                      
                ?> 
                <div class="userComments" style="margin-left: <?php echo $poz."px"?>;">

                    <div class="comment">
                        <div style="display: none;"> <p class="comment_id"> <?php echo $row['id'] ?> </p> </div>
                        
                        <div class="user">

                        


                            <span> <img src=<?php echo $profile_pic['pic']?> width = 60px style="" class="round_pic"> </span> 
                            <?php echo $result_creator['username'] ?> 
                            <span class="time"> <?php echo $row['date_created'] ?> </span> 
                            <?php if($row['creator'] == $_SESSION['user_id']) { ?> 
                            <span> <img class = "dots" src = "assets/img/catalog/dots.png" width = "15px;" style="position: relative; top: -2px; left: 10px;"> </span> 
                            
                            <span class="options" style="display: none"> 
                                  <span class="edit_button" style="cursor: pointer; position: relative; left: 25px; top: -15px; ">Edit</span> 
                                  <span class="delete_button" style="cursor: pointer; position: relative; top: 15px; left: -20px;"> Delete </span> 
                            </span>
                            <?php }?> 
                        </div>
                        
                        
                        <textarea class="userComment" style="margin-left: 82px; border-color: transparent; width: 500px;" readonly> <?php echo $row['comment'] ?> </textarea>
                        
                        <span>
                        <div class="row">
                            <div class="col-md-12">
                                 <span class="reply_button" style="display: block"> <button class="btn-primary btn" style="position: absolute; left:600px;" > <span class="reply_button_text">Reply</span> </button> </span> 
                                 <span class="cancel_reply" style="display: none"> <button class="btn-primary btn" style="position: absolute; left:510px;" > Cancel</button> </span>         
                        </div>
                        </span>
                        
                        <span>
                        <div class="row">
                            <div class="col-md-12">
                                 <span class="accept_edit" style="display: none"> <button class="btn-primary btn" style="position: absolute; left:600px;" > Submit</button> </span>          
                        </div>
                        </span>
                        


                        <span style="position:relative; left:50px; cursor:pointer;" class="upvote"> <img src="assets/img/catalog/like.png" width = 40px>  <b class="num_likes"> <?php echo $row['likes'] ?> </b> </span>

                        <textarea class= "reply_comment" style="position:relative; left:145px; top: 40px; width:500px; height: 100px; display: none" ></textarea>

                        
                        <!-- <span style="position:relative; left:50px;"> <img src="assets/img/catalog/dislike.PNG" width = 40px>  <b> 15 </b> </span> -->


                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        
                        
                        <!-- <div class="replies">
                            <div class="comment">
                                <div class="user">Lugojan Emanuel <span class="time">2021-01-23</span></div>
                                <div class="userComment">Here is a material you can find your answer</div>
                            </div>
                        
                        </div> -->
                        </div>
                    </div>
                    </div>
                </div>

                <br>

                <?php 
                
                $frec[$id] = 1;
              afiseaza($poz + 100, "and reply_id = '$id' ");
            }}
            }
            afiseaza(100, "");
                ?>

    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


    <script>
        $(".cancel_reply").on('click', function(){
           var input = $(this).closest(".comment").find(".reply_comment");
           var reply_button_text = $(this).closest(".comment").find(".reply_button_text");
           input.css({'display' : 'none'});
           $(this).css({'display' : 'none'});

           reply_button_text.text("Reply");
           console.log("????");

        });
        $(".reply_button").on("click", function(){
            var comment_id = $(this).closest(".comment").find(".comment_id").text();
            var input = $(this).closest(".comment").find(".reply_comment");
            var cancel_reply = $(this).closest(".comment").find(".cancel_reply");
            var reply_button_text = $(this).closest(".comment").find(".reply_button_text");
            var reply_comment = $(this).closest(".comment").find(".reply_comment");
            
            var ok =  reply_button_text.text();
            
            if(ok == 'Reply'){
              
              
              reply_button_text.text("Submit");

            if(input.css('display') == 'none')
            {
              input.css({'display' : 'inline'});
              cancel_reply.css({'display' : 'inline'});
            }
            else
            {
              input.css({'display' : 'none'});
              cancel_reply.css({'display' : 'none'});
            }
          }
          else
          {
              if(reply_comment.val() != ""){
              $.ajax({
                  method : 'get',
                  url : 'new_comment.php',
                  data : {
                    'reply_to_id' : comment_id,
                    'comment' : reply_comment.val(),
                    'topic_id' : topic_id,
                    'question_id' : question_id,
                    'creator' : user,
                    'ajax' : 'true',
                  },
                  success: function(data)
                  {
                    // alert(data);
                  }
              });
              window.location.reload();
            }
          } 
        });

        $(".upvote").on('click', function(){
            var comment_id = $(this).closest(".comment").find(".comment_id").text();
            var user = <?php echo $_SESSION['user_id']?> ;

            var num_likes = $(this).closest(".comment").find(".num_likes");

            console.log("you liked commment: " + comment_id);
            console.log("liked by user: " + user);
            console.log(num_likes.text());



            $.ajax({
                method: 'get',
                url: 'continua.php',
                data: {
                  'comment_id': comment_id,
                  'user_id' : user,
                  'ajax' : 'true',
                },
                success: function(data){
                    num_likes.text(data);
                }
            });
        });

        $(".dots").on('click', function(){
          var comment_id = $(this).closest(".comment").find(".comment_id").text();
          var options = $(this).closest(".comment").find(".options");
          
          if(options.css('display') == 'none')
          {
              options.css({'display' : 'inline'});
          }
          else
          {
              options.css({'display' : 'none'});
          }
          // console.log(options.css('display'));
          
          console.log(comment_id);
        })
        $(".edit_button").on('click', function(){
          var comment_id = $(this).closest(".comment").find(".comment_id").text();

          var comment = $(this).closest(".comment").find(".userComment");
          comment.prop('readonly', false);

          var accept_edit = $(this).closest(".comment").find(".accept_edit");
          var reply = $(this).closest(".comment").find(".reply");
          
          accept_edit.css({'display' : 'inline'});
          reply.css({'display' : 'none'});

          console.log("Ai apasat edit la id-ul: " + comment_id);


          //close options edit and delete button
          var options = $(this).closest(".comment").find(".options");
          options.css({'display' : 'none'});
        })
        $(".delete_button").on('click', function(){
          var comment_id = $(this).closest(".comment").find(".comment_id").text();
          console.log("Ai apasat delete la id-ul: " + comment_id);


          //close options edit and delete button
          var options = $(this).closest(".comment").find(".options");
          options.css({'display' : 'none'});

          //redirect to another page so I can change the db
          
          $.ajax({
              method : 'get',
              url : 'edit_delete.php',
              data : {
                'id' : comment_id,
                'action' : 'delete',
              },
              success : function(data)
              {
                // alert(data);
              }
            });
            // window.location.reload(true);
            console.log(document.URL);
            // window.location.replace("experimente.php?return=" + document.URL);
            window.location.replace(document.URL + "&reload=true");
           
        })

        $(".accept_edit").on('click', function(){
          var comment_id = $(this).closest(".comment").find(".comment_id").text();

          var comment = $(this).closest(".comment").find(".userComment");
          comment.prop('readonly', true);

          // comment.css({'width' : '500px', 'max-height' : '200px'});
          
          console.log(comment_id);

          //retrieve the new text
          console.log(comment.val());

          
          $(this).css({'display' : 'none'});


          $.ajax({
              method : 'get',
              url : 'edit_delete.php',
              data : {
                'id' : comment_id,
                'new_comment' : comment.val(),
                'action' : 'edit',
              },
              success : function(data)
              {
                // alert(data);
              }
            });
            window.location.reload();
          
          //go to edit_delete to change db
          // window.location.replace("edit_delete.php?action=edit&id=" + parseInt(comment_id) + "&new_comment=" + comment.val() + "&return=" + document.URL);
        })


        function setHeight(jq_in){
        jq_in.each(function(index, elem){
            // This line will work with pure Javascript (taken from NicB's answer):
            elem.style.height = elem.scrollHeight + 2 + 'px'; 
        });
        }
        $('.userComment').on('change', function(){
          setHeight($('.userComment'));

        })
        setHeight($('.userComment'));
    </script>

</body>
</html>


    
  </main>


          <?php 
            for($i = 0; $i <= 9; $i++)
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