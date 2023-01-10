<?php
  session_start();
  $_SESSION['return_page'] = "forum_section.php";
  require("login_required.php");
  include("inner_page_top.php");
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
          
          <div class="button_cont" align="center"><a class="example_a" href='post_question.php?topic_id=<?php echo $_GET['topic_id']?>&topic_name=<?php echo $_GET['topic_name']?>' rel="nofollow noopener">Post Question</a></div>  

          <br><br>
          <h1>TOPIC</h1>
          <br>
          <h3><?php echo $_GET['topic_name']?></h3>

      </div>
    </section>
    <div >
    
    
        <table class="styled-table">
        
            <tr>
              <th>Number</th>
              <th>Question</th>
              <th>Creator</th>
              <th>Replies</th>
              <th>Date created</th>
            </tr>

            <?php
                  $con = mysqli_connect('localhost', 'root', '');
                  mysqli_select_db($con, "atestat");

                  $topic_id = $_GET['topic_id'];
                  $topic = "t".$topic_id;
                  $search = "select * from $topic";
                  $result = mysqli_query($con, $search);

                  if($result){

                  while($row = mysqli_fetch_array($result))
                  {
                      echo " <tr>
                                  <td>".$row['0']."</td>
                                  <td><a href='answers.php?topic_id=".$topic_id."&topic=".$topic."&question_id=".$row['0']."&question_name=".$row['1']."'>".$row['1']."</a></td>
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

 
</html>

  
<?php  
  include("inner_page_bottom.php");
?>