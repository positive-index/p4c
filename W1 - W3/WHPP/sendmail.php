<?php
$to = $_GET['form_user']; // 받는사람 메일주소 
$subject = "메일 인증";
$message = "인증번호는 ".$to." 입니다.";
$headers = "From: ".$to."\r\n";



$result=mail($to, $subject, $message, $headers);
if(!$result){
	echo error_get_last()['message'];;
}else{
	echo "메일을 보냈습니다.";
}
	
?>