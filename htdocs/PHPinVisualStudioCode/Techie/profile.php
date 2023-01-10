<?php
    session_start();
    $_SESSION['return_page'] = "profile.php";
    include("inner_page_top.php");
    require("login_required.php");

    require("connection.php");
    $_SESSION['error'] = "";
    
    
    if(isset($_SESSION['username'])){
        
        $seach_pic = "select pic from login_form where username = '".$_SESSION['username']."' ";
        $result_pic = mysqli_query($con, $seach_pic);
        $my_pic;
        if($result_pic){
        while ($row = mysqli_fetch_assoc($result_pic))
        {
            $my_pic = $row['pic'];
        }}
?>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .round_pic{
        border-radius: 50%;
    }
    /* table, th, td, tr{
            border: 1px solid black;
            text-align: center;
}     */
</style>
    

    <main>

            <div align = "center">
                <br><br><br>
                <img src="<?php echo $my_pic ?>" width="130" height="110" class = "round_pic"></img> 
                
                
                <?php 
                    $con = mysqli_connect('localhost', 'root', '', 'atestat');
                    $search_info = mysqli_query($con, "select * from login_form where username = '".$_SESSION['username']."'");
                    if($search_info){
                    while($row = mysqli_fetch_assoc($search_info))
                    {

                ?>
                        <table class="styled-table">
                            <tr>
                                <th colspan="2"><h3>My Account</h3></th>
                            </tr>
                            <tr>
                                <td><h3>Username</h3></td>
                                <td><h3><?php echo $row['username']?></h3></td>
                                </tr>
                                
                                <tr>
                                <td><h3>Email</h3></td>
                                <td><h3><?php echo $row['email']?></h3></td>
                                </tr>
                                
                                <tr>
                                <td><h3>Replies</h3></td>
                                <td><h3><?php echo $row['replies']?></h3></td>
                                </tr>
                                
                                <tr>
                                <td><h3>Likes</h3></td>
                                <td><h3><?php echo $row['likes']?></h3></td>
                                </tr>
                                
                                <tr>
                                <td><h3>Questions</h3></td>
                                <td><h3><?php echo $row['questions']?></h3></td>
                                </tr>
                                
                                <tr>
                                <!-- <td> <a href="profile.php?action=ci"> <h3>Change Profile Picture</h3> </a></td> -->
                                <td>
                                    <h3>
                                        Change Profile Picture
                                    </h3>
                                </td>
                                
                                <td align="center">
                                    <h3>
                                    <form action="profile.php?action=ci" method = "POST" enctype = "multipart/form-data">
                                           <input type="file" name = "image">
                                           <input type="submit" name="submit" value = "Change">
                                            <h3><?php echo $_SESSION['error']?></h3>
                                    </form>
                                    </h3>
                                </td>
                                </tr>

                                

                                
                            </table>
                <?php            
                        }
                        }
                ?>
                
                <a href="index.php?logout=true" class="btn btn-info btn-lg" style="width: 10%; height: 5%">
                    <span class="glyphicon glyphicon-log-out"></span> 
                    <h5>Log out</h5>
                </a>

            </div>
    </main>

</html>

<?php
    }
    else{
?>

<html>
    <main>

        <a href="forum_login.php?page=profile">Log in here</a>

    </main>
</html>

<?php
    }
    if(isset($_POST['submit'])){
        $errors = array();
        $allowd_e = array('png', 'jpg', 'jpeg');

        $file_name = $_FILES['image']['name'];
        $file_e = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $file_s = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        if(in_array($file_e, $allowd_e) === false){
            $errors[] = 'This file extension is not allowed';
            $_SESSION['error'] = $errors;
        }

        if($file_s > 20971520){
            $errors[] = 'File must be under 2 MB';
            $_SESSION['error'] = $errors;
        }

        if(empty($errors)){
            move_uploaded_file($file_tmp, 'assets/img/'.$file_name);
            $image_up = 'assets/img/'.$file_name;

            $change_pic = "update login_form set pic = '$image_up' where username = '".$_SESSION['username']."' ";
            mysqli_query($con, $change_pic); 

            //
            $URL="profile.php";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

        }
        else
        {
            foreach($errors as $error){
        ?>    

        <html>
                <script>
                        alert( "<?php echo $error ?>" );
                </script>
        </html>

        <?php    
                echo $error."<br>";
            }
        }
        
        //$con
        require("connection.php");
        // $change_pic = "update login_form set pic = '".$_POST['image']."' where username = '".$_SESSION['username']."'";
        // mysqli_query($con, $change_pic);
        
    }
    include("inner_page_bottom.php");
?>