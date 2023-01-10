<?php 


$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'atestat');

$username = $_POST['username_signin'];
$email = $_POST['email_signin'];
$password = $_POST['password_signin'];
$password_check = $_POST['password_signin_check'];

$search_email = "select * from login_form where email = '$email' ";
$search_username = "select * from login_form where username = '$username'";
$search_id = "select * from login_form";

$result_email = mysqli_query($con, $search_email);
$result_username = mysqli_query($con, $search_username);
$result_id = mysqli_query($con, $search_id);

$num_email = mysqli_num_rows($result_email);
$num_username = mysqli_num_rows($result_username);
$num_of_users = mysqli_num_rows($result_id);

//sha1 for encrypting passwords

if($num_email == 1){
    echo "Email already taken, redirecting";
    header("refresh: 3; url = http://localhost/PHPinVisualStudioCode/Techie/forum_login.php"); 
}
else{
    if($num_username == 1){
        echo "Username already taken, redirecting";
        header("refresh: 3; url = http://localhost/PHPinVisualStudioCode/Techie/forum_login.php"); 
}
else{

    if($password != $password_check){
        echo "Passwords do not match, redirecting";
        header("refresh: 3; url = http://localhost/PHPinVisualStudioCode/Techie/forum_login.php"); 
}
else
{
    //the new user will have the id = num_of_users + 1
    $num_of_users += 1;
    $reg = "insert into login_form(id, username, email, password) values ('$num_of_users', '$username', '$email', '$password') ";
    mysqli_query($con, $reg);
    echo "Registration Successfull, u can go ahead and login";
    header("refresh: 3; url = http://localhost/PHPinVisualStudioCode/Techie/forum_login.php"); 
}
}
}
?>