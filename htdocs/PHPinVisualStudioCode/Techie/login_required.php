<?php 
    if(isset($_SESSION['username']) )
    {

    }
    else
    {
        //i need to login so i redirect you to login page
        $URL="http://localhost/PHPinVisualStudioCode/Techie/forum_login.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
?>