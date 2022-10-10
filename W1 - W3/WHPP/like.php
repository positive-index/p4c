<?php include $_SERVER['DOCUMENT_ROOT']."/WHPP/db.php";
	$id=$_POST['id'];
	$num=$_POST['num'];
	$sql =mq("SELECT * FROM board WHERE num=".$num." AND like_mem like '%".$id."%'");
	$row = mysqli_fetch_array($sql);
	if($row){
		echo "<script>alert('이미 추천했습니다.');history.back();</script>";
	}else{
		$sql2=mq("UPDATE board SET like_mem = CONCAT(like_mem, ', ".$id."') WHERE num = ".$num);
		$sql3=mq("UPDATE board SET `like` = `like` + 1 WHERE num = ".$num);
		echo "<script>alert('추천했습니다.');history.back();</script>";
	}
	


?>