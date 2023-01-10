<?php
    session_start();
    require("connection.php");
    $question_id = $_GET['question_id'];

    $update = "UPDATE questions set replies = replies + 1 where id = '$question_id' ";
    mysqli_query($con, $update);
    if(isset($_GET['ajax']) && $_GET['ajax'] == 'true')
    {
        $topic_id = $_GET['topic_id'];
        $question_id = $_GET['question_id'];
        $creator = $_GET['creator'];
        $comment = $_GET['comment'];
        $reply = $_GET['reply_to_id'];

        $query = "insert into comments(id, topic_id, question_id, creator, comment, date_created, likes, reply_id) values ('', '$topic_id', '$question_id', '$creator', '$comment', CURRENT_DATE(), '', '$reply')";
        mysqli_query($con, $query);
    }
    else
    {

    

    $topic_id = $_GET['topic_id'];
    $question_id = $_GET['question_id'];
    $creator = $_SESSION['user_id'];
    $comment = $_POST['comment'];

    //create table_name
    

    //if the table doesnt exist then i need to create one
    
    $query = "insert into comments(id, topic_id, question_id, creator, comment, date_created, likes, reply_id) values ('', '$topic_id', '$question_id', '$creator', '$comment', CURRENT_DATE(), '', '')";
    mysqli_query($con, $query);

    // $result = $con->query("select * from ".$table." ");
    // if($result == false)
    // {
    //     $create_table = "CREATE TABLE $table (
    //         id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //         username    VARCHAR(50) ,
    //         profile_pic VARCHAR(300), 
    //         the_comment TEXT,
    //         createdON DATE DEFAULT NOW()
    //     );";
    //     mysqli_query($con, $create_table);
    // }
    
    //     $insert_comment = "insert into $table(id, username, profile_pic, the_comment, createdOn) values ('', '".$_SESSION['username']."', '".$_SESSION['pic']."' , '".$_POST['comment']."', NOW())";
    //     mysqli_query($con, $insert_comment);    
    //     echo $_POST['comment'];

    //     mysqli_query($con, "update login_form set replies = replies + 1 where username = '".$_SESSION['username']."'");

    //     $topic = "t".$_GET['topic_id'];
    //     $increment_comment = "update $topic set replies = replies + 1 where id = ".$_GET['question_id']."";
    //     mysqli_query($con, $increment_comment);
    
    // get back to the site with the previous values
    //increment replies with 1





    $values = "topic_id=".$_GET['topic_id']."&question_id=".$_GET['question_id']."&question_name=".urlencode($_GET['question_name']);
    
    $URL="answers.php?".$values;
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    exit();

    }
?>