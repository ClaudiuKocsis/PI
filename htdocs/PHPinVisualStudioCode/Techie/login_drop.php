<?php
    session_start();
    $_SESSION['return_page'] = "index.php";
    require("login_required.php");
    include("inner_page_top.php");
?>

<html>
    
</html>

<?php
    include("inner_page_bottom.php");

?>