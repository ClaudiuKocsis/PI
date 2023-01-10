<html>

    
        <center>

                <form action="post.php" method = "POST">
                    <h1 class="text_span text_design"> <i><b>Topic name</b></i> </h1>
                    <br>
                    <textarea type="text" placeholder="Type here the topic name" name="topic_name" style="width: 30%; height: 10%;" required></textarea>
                    <br><br>

                    <button type="submit" name = "submit" style="width: 30%;" class="btn-primary btn">Submit</button>
                </form>

        </center>
</html>
 
<?php
    if(isset($_POST['submit']))
    {      
        
        // echo $_POST['topic_name'];
        // echo $_POST['topic_content'];
        
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'atestat');
        
        $search_topics = "select * from topics";
        
        $result_topics = mysqli_query($con, $search_topics);
        
        if($result_topics)
            $num_of_topics = mysqli_num_rows($result_topics) + 1;
        else
            $num_of_topics = 1;
        
        $name = "t".$num_of_topics;

        $creator = $_SESSION['username'];
        $create_topic = "insert into topics (topic_id, topic_name, topic_creator, topic_questions, topic_date) values ('$num_of_topics', '".$_POST['topic_name']."', '$creator', '0', CURRENT_DATE())";
        
        mysqli_query($con, "update login_form set topics = topics + 1 where username = '".$_SESSION['username']."' ");


        //first i need to check if this topic table was already created
        $try = "select id from $name limit 1";
        $result_try = mysqli_query($con, $try);

        if($result_try == false)
        {
            //the table doesnt exist so i will create it
            //i need to create a tabel for every topic that contains all of the questions
            $create_topic_table = "CREATE TABLE $name (
                id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                question VARCHAR(999),
                creator VARCHAR(999),
                replies INT(9) DEFAULT 0,
                date_created DATE DEFAULT CURRENT_TIMESTAMP()
            );";
            mysqli_query($con, $create_topic_table);
        }

        // //and if it does exist i will just add the question to it
        // //now i have to fill in the question
        // $insert_question = "insert into $name (id, question, creator, replies, date_created) values ('', '$content', '$creator', '', CURRENT_DATE())";
        // mysqli_query($con, $insert_question);

        $result_create = mysqli_query($con, $create_topic);
        
        // go back to forum section
        $URL="http://localhost/PHPinVisualStudioCode/Techie/forum_section.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    }
    include("inner_page_bottom.php");
?>