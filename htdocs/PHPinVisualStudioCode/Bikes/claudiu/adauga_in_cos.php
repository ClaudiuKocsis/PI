<?php


    session_start();

    require("connection.php");
    $marime = $_POST['marime'];
    $produs_id = $_GET['id'];
    $pret = $_GET['pret'];
    
    //mai intai caut daca am adaugat deja aceeasi bicicleta in cos, acelasi model inclusiv aceeasi marime inclusiv acelasi cumparator, daca marimea e diferita o adaug in cos
    $search = "select * from cos where id_produs = '".$produs_id."' and cumparator = '".$_SESSION['user_id']."' ";

    $result = mysqli_query($con, $search);


    if($result) //daca am gasit acelasi model, verific daca am mai introdus odata marimea aceasta
    {
        $gasit = 0;
        while($row = mysqli_fetch_assoc($result))
        {
            if($marime == $row['marime'])
            {
                $gasit = 1;
                $cantitate_noua = $row['cantitate'] + 1;
                $update = "update cos set cantitate = '".$cantitate_noua."', pret = '".$pret * $cantitate_noua."' where id_produs = '$produs_id' and marime = '$marime' ";
                mysqli_query($con, $update);
                break;
            }
        }
        if($gasit == 0) //inseamna ca trebuie sa introduc acest model in baza de date
        {
            $insert = "insert into cos(id, id_produs, cumparator, pret_initial, pret, cantitate, marime) values ('', '".$produs_id."', '".$_SESSION['user_id']."','$pret', '$pret', '1', '$marime')";
            mysqli_query($con, $insert);
        }
    }
    else//nu am mai gasit modelul, trebuie sa introduc bicicleta
    {
        $insert = "insert into cos(id, id_produs, cumparator, pret_initial, pret, cantitate, marime) values ('', '".$produs_id."', '".$_SESSION['user_id']."','$pret', '$pret', '1', '$marime')";
        mysqli_query($con, $insert);
    }

    $URL="cos.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
     
?>