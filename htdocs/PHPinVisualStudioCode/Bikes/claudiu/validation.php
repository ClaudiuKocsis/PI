<?php 
    session_start();
    $_SESSION['produse_in_cos'] = 0;

    // if(isset($_SESSION['username']))
    // {
    //     //header("location: http://localhost/PHPinVisualStudioCode/Techie/forum_section.php");
    // }
    // else{

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'bikes');

$email_or_username = $_POST['email_or_username_login'];
$password = $_POST['password_login'];

$search_with_mail = "select * from login_form where email = '$email_or_username' and password = '$password' ";
$search_with_username = "select * from login_form where username = '$email_or_username' and password = '$password'";

$result_email = mysqli_query($con, $search_with_mail);
$result_username = mysqli_query($con, $search_with_username);

$num_email = mysqli_num_rows($result_email);
$num_username = mysqli_num_rows($result_username);



if($num_email == 1 || $num_username == 1){
    echo "Login succesful";
    $_SESSION["username"] = $email_or_username;
    $return = $_SESSION['return_page'];
    
    while ($row = mysqli_fetch_array($result_email))
    {
        $_SESSION["id"] = $row["id"];
    }
    while ($row = mysqli_fetch_array($result_username))
    {
        $_SESSION["id"] = $row["id"];
    }
    if(isset($_SESSION["id"]))
    {
        echo $_SESSION["id"];
    }
    //after i got the id i can search for the rest
    $id = $_SESSION["id"];
    $search_by_id = "select * from login_form where id = '$id' ";

    $result_by_id = mysqli_query($con, $search_by_id);
    while($row = mysqli_fetch_array($result_by_id))
    {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        
        $_SESSION['telefon'] = $row['telefon'];
        $_SESSION['județ'] = $row['județ'];
        $_SESSION['oraș'] = $row['oraș'];
        $_SESSION['stradă'] = $row['stradă'];
        $_SESSION['nr'] = $row['nr'];

        $_SESSION['replies'] = $row['replies'];
        $_SESSION['score'] = $row['score'];
        $_SESSION['topics'] = $row['topics'];
        $_SESSION['pic'] = $row['pic'];

    }

    require("produse_in_cos.php");

    // $username = $_SESSION["username"];
    // $email = $_SESSION["email"];
    // echo "USERNAME IS $username \n";
    // echo "EMAIL IS $email \n";

    header("location: $return ");
    // if(isset($_GET['page']) && $_GET == "profile")
    // {
    //     header("location: http://localhost/PHPinVisualStudioCode/Techie/profile.php");
    // }
    // else
    // {
        
    //     header("location: http://localhost/PHPinVisualStudioCode/Techie/forum_section.php");
    // }
}
else
{
?>
    <!-- // echo "Your login credentials are incorect try again, redirecting to login form...";   
    // header("refresh: 3; url = forum_login.php?error=Your login credentials are incorect try again, redirecting to login form..."); -->

<html>

    <script>
            alert("Login credentials are incorect!");
            window.location.href = "forum_login.php";
    </script>
</html>

<?php
}

// }
?>