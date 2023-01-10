<?php
    session_start();
    echo $_GET['topic_id']."  ";
    echo $_GET['question_id']."<br>";
    echo $_POST['comment']."<br>";

    //create table_name

    $table = "c".$_GET['topic_id']."_".$_GET['question_id'];
    

    //if the table doesnt exist then i need to create one
    $con = mysqli_connect('localhost', 'root', '', 'atestat');
    $result = $con->query("select * from ".$table."");
    if($result == false)
    {
        $create_table = "CREATE TABLE $table (
            id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username    VARCHAR(50) ,
            profile_pic VARCHAR(300), 
            the_comment TEXT,
            createdON DATE DEFAULT NOW()
        );";
        mysqli_query($con, $create_table);
    }
    
        $insert_comment = "insert into $table(id, username, profile_pic, the_comment, createdOn) values ('', '".$_SESSION['username']."', '".$_SESSION['pic']."' , '".$_POST['comment']."', NOW())";
        mysqli_query($con, $insert_comment);    
        echo $_POST['comment'];

        mysqli_query($con, "update login_form set replies = replies + 1 where username = '".$_SESSION['username']."'");

        $topic = "t".$_GET['topic_id'];
        $increment_comment = "update $topic set replies = replies + 1 where id = ".$_GET['question_id']."";
        mysqli_query($con, $increment_comment);
    
    //get back to the site with the previous values
    $values = "topic_id=".$_GET['topic_id']."&topic=".$_GET['topic']."&question_id=".$_GET['question_id']."&question_name=".urlencode($_GET['question_name']);
    $URL="http://localhost/PHPinVisualStudioCode/Techie/answers.php?".$values;
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    exit();
?>