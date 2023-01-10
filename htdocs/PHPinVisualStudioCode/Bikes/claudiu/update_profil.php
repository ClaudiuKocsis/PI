<?php
    session_start();
    require("connection.php");
    $valori = ["username", "email", "telefon", "județ", "oraș", "stradă", "nr"];

    foreach($valori as $key)
    {
        if(isset($_GET[$key]))
        {
            $nou = $_GET[$key];
            $_SESSION[$key] = $nou;
            $change = "update login_form set $key = '$nou' where id = '".$_SESSION['user_id']."' ";
            mysqli_query($con, $change);
        }
    }
?>

<script>
    window.location.replace("profile.php");
</script>