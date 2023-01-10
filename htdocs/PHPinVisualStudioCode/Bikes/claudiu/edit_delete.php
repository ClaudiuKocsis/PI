<?php
    require("connection.php");
    $id = $_GET['id'];


    ///get question_id and topic_id from this comment

    $search = "SELECT * from comments where id = '$id' ";
    $result = mysqli_query($con, $search);
    $row = mysqli_fetch_assoc($result);

    $topic_id = $row['topic_id'];
    $question_id = $row['question_id'];

    if($_GET['action'] == 'delete')
    {

        function delete_com($id)
        {
            require("connection.php");

            $command = "delete from comments where id = '$id' ";
            mysqli_query($con, $command);    
            
            $search = "SELECT * from comments where reply_id =  '$id' ";
            $result = mysqli_query($con, $search);
            while($row = mysqli_fetch_assoc($result))
            {
                    delete_com($row['id']);
            }
        }
        delete_com($id);


        ///update data base
        $search = "SELECT * from comments where topic_id = '$topic_id' and question_id = '$question_id' ";
        $result = mysqli_query($con, $search);
        $number = mysqli_num_rows($result);

        $update = "UPDATE questions set replies = '$number' where id = '$question_id' ";
        mysqli_query($con, $update);

    }
    else
    {
        $new_comment = $_GET['new_comment'];

        if($new_comment[0] == " ")
        {
            $new_comment = ltrim($new_comment, $new_comment[0]);
        }

        $command = "update comments set comment = '$new_comment' where id = '$id' ";
        mysqli_query($con, $command);
    }


?>
