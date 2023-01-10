<?php

if (isset($_GET['ajax'])) {
    $comment_id = $_GET['comment_id'];
    $user_id = $_GET['user_id'];

    require("connection.php");

    $search = "SELECT * from likes where comment_id = '$comment_id' and user_id = '$user_id' ";
    $result = mysqli_query($con, $search);
    $ok = mysqli_num_rows($result);

    $get_likes = "SELECT likes from comments where id = '$comment_id' ";
    $result_likes = mysqli_query($con, $get_likes);
    $row = mysqli_fetch_assoc($result_likes);
    $num_likes = $row['likes'];


    if ($ok != 0) {
        ///userul nu mai poate sa dea like
        ///sterg like-ul de la user
        $delete = "DELETE from likes where comment_id = '$comment_id' and user_id = '$user_id' ";
        mysqli_query($con, $delete);



        ///update tabel cu numarul vechi de like-uri
        $nou = $num_likes - 1;
        $update = "UPDATE comments set likes = '$nou' where id = '$comment_id' ";
        mysqli_query($con, $update);

        echo $nou;
    } else {
        ///adaug like-ul de la user

        $insert = "INSERT into likes(id, comment_id, user_id) values ('', '$comment_id', '$user_id')";
        mysqli_query($con, $insert);


        ///update tabel comment cu numarul nou de like-uri
        $nou = $num_likes + 1;
        $update = "UPDATE comments set likes = '$nou' where id = '$comment_id' ";
        mysqli_query($con, $update);


        echo $nou; 
    }
} else
    echo "false";

?>