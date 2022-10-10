<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Web Hacking Project</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<style>
	.dap_ins{
		text-align: center;
	}
	.reply_view{
		text-align: left;
	}
	</style>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="board_box">
	    <h3 class="title">
			게시판 > 내용보기
		</h3>
<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	//$id = $_GET['id'];
	$con = mysqli_connect("localhost", "root", "9902061", "sample");

	$sql = "select * from board where num=$num";
	//$sql3 = "select * from board_reply where id=$id AND idx=$bno";
	
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];
	$file_name    = $row["file_name"];
	$file_type    = $row["file_type"];
	$file_copied  = $row["file_copied"];
	$hit          = $row["hit"];
	$like 		  = $row["like"];
	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);
	$sid = $_SESSION['username'];

	//$new_hit = $hit + 1;
	//$sql = "update board set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);	
	$sql =mq("SELECT * FROM board WHERE num=".$num." AND hit_mem like '%".$sid."%'");
	$row = mysqli_fetch_array($sql);
	if($row){
	}else{
		$sql2=mq("UPDATE board SET hit_mem = CONCAT(hit_mem, ', ".$sid."') WHERE num = ".$num);
		$sql3=mq("UPDATE board SET `hit` = `hit` + 1 WHERE num = ".$num);
	}
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$name?> | <?=$regist_day?></span>
			</li>
			<li>
				<?php
					if($file_name) {
						$real_name = $file_copied;
						$file_path = "./data/".$real_name;
						$file_size = filesize($file_path);

						echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
			           	}
				?>
				<?=$content?>
			</li>		
	    </ul>
	    <div>
	    	추천수 : <?= $like;?>
	    </div>
	    <div>
	    	<form action='/WHPP/like.php' method='post'>
	    		<input type='hidden' value='<?= $_SESSION['userid'];?>' name='id'/>
	    		<input type='hidden' value='<?= $num;?>' name='num'/>
	    		<button type="submit">추천</button>
	    	</form>
	    </div>
	    <ul class="buttons">
				<li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
				<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
				<li><button onclick="location.href='board_form.php'">글쓰기</button></li>
		</ul>
	</div> <!-- board_box -->
 
 <!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="reply_ok.php?id=<?= $id;?>&num=<?=$num;?>" method="post">
			<input type="hidden" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디" value=<?= $_SESSION['username'];?>>
			<textarea name="content" class="reply_content" id="re_content" ></textarea>
			<button id="rep_bt" class="re_bt">댓글</button>
		</form>
	</div>


<div>
    <h2>댓글 목록</h2>
        <?php
            $sql3 = mq("select * from board_reply where con_num=".$num." order by date desc;");
            
            while( $row = mysqli_fetch_array($sql3) ){
            	echo "<div>".$row['name']."</div>";
            	echo "<div>".$row['content']."</div>";
            	echo "<div>".$row['date']."</div>";
            }
		?>
</div>
</section> 
</body>
</html>
