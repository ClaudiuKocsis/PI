<?php
  session_start();
  $_SESSION['return_page'] = "forum_section.php";
  require("login_required.php");
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
          
      <div class="button_cont" align="center"><a class="example_a" href="post.php" rel="nofollow noopener">Post Topic</a></div>
      <!-- <div class="button_cont" align="left"><a class="example_a" href="forum_section.php" rel="nofollow noopener">Forum</a></div>     -->


      </div>
    </section>
    <div >
    
    
        <table class="styled-table">
        
            <tr>
              <th>Number</th>
              <th>Title</th>
              <th>Creator</th>
              <th>Questions</th>
              <th>Date created</th>
            </tr>

            <?php
                  $con = mysqli_connect('localhost', 'root', '');
                  mysqli_select_db($con, "atestat");

                  $search = "select * from topics";
                  $result = mysqli_query($con, $search);


                  if($result){
                  while($row = mysqli_fetch_array($result))
                  {
                      
        

                      
                      echo " <tr>
                                  <td>".$row['0']."</td>
                                  <td><a href='question_forum.php?topic_id=".$row['0']."&topic_name=".$row['1']."'>".$row['1']."</a></td>
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