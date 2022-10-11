<?php include $_SERVER['DOCUMENT_ROOT']."/WHPP/db.php";?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>Web Hacking Project</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>
<?php
	$category = $_GET['category'];
	$search_con = $_GET['search'];
?>



<h1><?php echo $category; ?> : <?php echo $search_con;?> 검색결과 </h1>
<h4 style ="margin-top:30px;"><a href='./board_list.php'>게시판</a></h4>
<ul id="board_list">
	<li>
		<span class="col1">번호</span>
		<span class="col2">제목</span>
		<span class="col3">글쓴이</span>
		<span class="col4">첨부</span>
		<span class="col5">등록일</span>
		<span class="col6">조회</span>
	</li>
<?php
	$page = $_GET['page'];
	if($category == 'subject')
	{

		$sql2 =mq("SELECT * FROM board WHERE subject like '%".$search_con."%' ORDER BY num DESC;");
		while( $row = mysqli_fetch_array($sql2) ){
			$num         = $row["num"];
			$id          = $row["id"];
			$name        = $row["name"];
			$subject     = $row["subject"];
			$content     = $row["content"];
			$regist_day  = $row["regist_day"];
			$hit         = $row["hit"];
			if ($row["file_name"])
				$file_image = "<img src='./img/file.gif'>";
			else
				$file_image = " ";
?>
			<li>
				<span class="col1"><?=$num?></span>
				<span class="col2"><a href="board_view.php?num=<?=$num;?>&page=<?=$page;?>"><?=$subject?></a></span>
				<span class="col3"><?=$name?></span>
				<span class="col4"><?=$file_image?></span>
				<span class="col5"><?=$regist_day?></span>
				<span class="col6"><?=$hit?></span>
			</li>	
<?php
        }

	}
	else if($category == 'name')
	{
		$sql2 =mq("SELECT * FROM board WHERE name like '%".$search_con."%' ORDER BY num DESC;");
		while( $row = mysqli_fetch_array($sql2) ){
			$num         = $row["num"];
			$id          = $row["id"];
			$name        = $row["name"];
			$subject     = $row["subject"];
			$content     = $row["content"];
			$regist_day  = $row["regist_day"];
			$hit         = $row["hit"];
			if ($row["file_name"])
				$file_image = "<img src='./img/file.gif'>";
			else
				$file_image = " ";

?>
			<li>
				<span class="col1"><?=$num?></span>
				<span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
				<span class="col3"><?=$name?></span>
				<span class="col4"><?=$file_image?></span>
				<span class="col5"><?=$regist_day?></span>
				<span class="col6"><?=$hit?></span>
			</li>	
<?php
        }
	}
	else if($category == 'content')
	{
		$sql2 =mq("SELECT * FROM board WHERE content like '%".$search_con."%' ORDER BY num DESC;");
		while( $row = mysqli_fetch_array($sql2) ){
			$num         = $row["num"];
			$id          = $row["id"];
			$name        = $row["name"];
			$subject     = $row["subject"];
			$content     = $row["content"];
			$regist_day  = $row["regist_day"];
			$hit         = $row["hit"];
			if ($row["file_name"])
				$file_image = "<img src='./img/file.gif'>";
			else
				$file_image = " ";
?>
			<li>
				<span class="col1"><?=$num?></span>
				<span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
				<span class="col3"><?=$name?></span>
				<span class="col4"><?=$file_image?></span>
				<span class="col5"><?=$regist_day?></span>
				<span class="col6"><?=$hit?></span>
			</li>	
<?php
        }
	}
?>
</ul>

</body>
</html>