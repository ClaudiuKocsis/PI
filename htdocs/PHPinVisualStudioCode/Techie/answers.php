<?php
    session_start();
    include("inner_page_top.php");
    // echo $_GET['topic_id'];
    // echo "<br>";
    // echo $_GET['topic'];
    // echo "<br>";
    // echo $_GET['question_id'];
    // echo "<br>";
    // echo $_GET['question_name'];

    $conn = mysqli_connect('localhost', 'root', '', 'atestat');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
                <form action=<?php echo "new_comment.php?topic_id=".$_GET['topic_id']."&topic=".$_GET['topic']."&question_id=".$_GET['question_id']."&question_name=".urlencode($_GET['question_name']) ?> method = "POST">
                    <textarea type = "text " id = "mainComment" name = "comment" class="form-control" placeholder="Add Public Comment" cols="30" rows="10" required></textarea><br>
                    <button type = "submit" id="addComment" class="btn-primary btn" style="float: right;">Add comment</button>          
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- display the number of comments -->
                
                <h2><b>
                <?php 
                    $con = mysqli_connect('localhost', 'root', '', 'atestat');
                    $table = "c".$_GET['topic_id']."_".$_GET['question_id'];

                    $search = "select * from $table";
                    $result = mysqli_query($con, $search);

                    $num = 0;
                    if($result)
                        $num = mysqli_num_rows($result);
                    echo $num." Comments";
                ?>
                </b></h2>

                <br>

                

                
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>

    </div>
                <!-- displaying a comment -->
                
                <?php 

                    if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $search_pic = "select pic from login_form where username = '".$row['username']."'";
                        $result_pic = mysqli_query($con, $search_pic);

                        $profile_pic = mysqli_fetch_assoc($result_pic);
                        

                        
                      
                ?> 
                <div class="userComments" style="margin-left: 140px;">

                    <div class="comment">
                        <div class="user"><span> <img src=<?php echo $profile_pic['pic']?> width = 60px style="" class="round_pic"> </span><?php echo $row['username'] ?> <span class="time"> <?php echo $row['createdON'] ?> </span></div>
                        <div class="userComment" style="margin-left: 82px;"> <?php echo $row['the_comment'] ?> </div>
                        
                        
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
                
                }
                }
                ?>

    <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript">
       $(document).ready(function () {
            $("#addComment").on('click', function () {
                var comment = $("#mainComment").val();

                if(comment.length > 5) {
                    $.ajax({
                        url: <?php echo "answers.php?topic_id=1" ?>,
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            addComment: 1,
                            comment: comment
                        }, success: function (response) {
                            console.log(response);
                        }
                    });
                } else
                    alert('Please Check Your Inputs');

            }); 
       })

    </script> -->

</body>
</html>

<?php
    include("inner_page_bottom.php");
?>