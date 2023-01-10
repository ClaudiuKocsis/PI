<?php
    session_start();
    include("inner_page_top.php");
?>

<html>
<center>

    <form action='post_question.php?topic_id=<?php echo $_GET['topic_id']?>&topic_name=<?php echo $_GET['topic_name']?>' method = "POST">
        <h1> <i><b>Type in your question</i></b></h1>
        <br>
        <textarea type="text" placeholder="Type in your question "name="question" style="width: 30%; height: 10%; resize: none" required></textarea>

        <br><br>
        <button type="submit" name = "submit" style="width: 30%;" class="btn-primary btn">Submit</button>

        
    </form>

</center>
</html>

<?php
    if(isset($_POST['submit'])){
    
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'atestat');

    $topic = "t".$_GET['topic_id'];
    $question = $_POST['question'];
    $creator = $_SESSION['username'];
    $insert_question = "insert into $topic (id, question, creator, replies, date_created) values ('', '$question', '$creator', '', CURRENT_DATE())";
    mysqli_query($con, $insert_question);


    //increment with one the total amount of questions
    $new_question = "update topics set topic_questions = topic_questions + 1 where topic_id = ".$_GET['topic_id']."";
    mysqli_query($con, $new_question);
    echo $question;

    $update_questions_profile = "update login_form set questions = questions + 1 where username = '".$creator."'";
    mysqli_query($con, $update_questions_profile);


    $URL="question_forum.php?topic_id=".$_GET['topic_id']."&topic_name=".$_GET['topic_name']."";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    include("inner_page_bottom.php");

?>