<?php 
    session_start();
    if($_SESSION['username']){
?>
<html>
    <h1>logged in</h1>
    <h1>Hello
    <?php
        echo $_SESSION['username'];
        }else{
        
    ?></h1>
</html>


<html>
    error
</html>

<?php
    }
?>