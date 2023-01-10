<?php
    if(isset($_SESSION['username']))
    {
        require('connection.php');
        $search = "select sum(cantitate) as numar from cos where cumparator = '".$_SESSION['user_id']."' ";
        $result = mysqli_query($con, $search);

        $row = mysqli_fetch_assoc($result);
        $_SESSION['produse_in_cos'] = $row['numar'];
    }
?>