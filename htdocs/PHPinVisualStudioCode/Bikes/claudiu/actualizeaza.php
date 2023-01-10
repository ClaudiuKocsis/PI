<?php 
    require("connection.php");
    for($i = 0; ; $i++)
    {
        if(isset($_GET[$i]))
        {
            // echo $_GET[$i]."<br>";

            $change = $_GET[$i];
            mysqli_query($con, $change);
        }
        else
            break;
    }

    //daca utilizatorul a schimbat marimea la mai multe biciclete verific daca acum am biciclete in cos de acelasi model si aceeasi marime 
    //caut dubluri

    $search = "SELECT id, id_produs, cumparator, marime, COUNT(*) as identice from cos group by id_produs, cumparator, marime order by id_produs asc";
    $result = mysqli_query($con, $search);

    $search_all_bikes = "SELECT * from cos order by id_produs asc";
    $result_all_bikes = mysqli_query($con, $search_all_bikes);
    
    while($row = mysqli_fetch_assoc($result))
    {
        $total = 0;
        $cantitate = 0;
        $delete_bike = [];
        for($i = 1; $i <= $row['identice']; $i++)
        {
            $bike = mysqli_fetch_assoc($result_all_bikes);
            $cantitate += $bike['cantitate'];
            if($i > 1)
            {
                array_push($delete_bike, $bike['id']);
            }
        }
        $total = $bike['pret_initial'] * $cantitate;
        
        $id_original = $row['id'];
        $update_original = "UPDATE cos set pret = '$total', cantitate = '$cantitate' where id = '$id_original' ";
        mysqli_query($con, $update_original);

        //now i need to delete the replicas
        for($i = 0; $i < count($delete_bike); $i++)
        {
            $id_to_delete = $delete_bike[$i];
            $remove_bike = "DELETE from cos where id = '$id_to_delete'  ";
            mysqli_query($con, $remove_bike);
        }


    }



    $URL="cos.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
?>