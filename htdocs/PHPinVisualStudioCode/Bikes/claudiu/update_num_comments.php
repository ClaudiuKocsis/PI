<?php
    require("connection.php");
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
    }

    $search = "SELECT * from comments where id = '$id' ";
    $result = mysqli_query($con, $search);
    $row = mysqli_fetch_assoc($result);

    $topic_id = $row['topic_id'];
    $question_id = $row['question_id'];

    ///update data base
    $search = "SELECT * from comments where topic_id = '$topic_id' and question_id = '$question_id' ";
    $result = mysqli_query($con, $search);
    $number = mysqli_num_rows($result);

    $update = "UPDATE questions set replies = '$number' where id = '$question_id' ";
    mysqli_query($con, $update);

?>