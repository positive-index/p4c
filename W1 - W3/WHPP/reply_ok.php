<?php
    include ('db.php');
    session_start();
    $id = $_GET['id'];
    $num = $_GET['num'];
    $username = $_SESSION['username'];
    $date = date("Y-m-d (H:i)");
    $content=$_POST['content'];

    if($num && $username && $content){
        $sql = mq("INSERT INTO board_reply (con_num,id,name,content,date) values ('".$num."','".$id."','".$username."','".$content."','".$date."');");
        echo "<script>alert('댓글이 작성되었습니다.');history.back();</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.');
        history.back();</script>";
    }
 
?>