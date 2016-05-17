<?php
ini_set('date.timezone','Asia/Shanghai');
	require_once "email.class.php";

	$smtpserver = "smtp.163.com";
	$smtpserverport =25;
	$smtpusermail = "kevinljh6@163.com";
	$smtpemailto ="2971282988@qq.com";
	$smtpuser = "kevinljh6";
	$smtppass = "5533531531";
	$mailtitle =$_GET["tou"];
	$mailcontent = "<h1>".$_GET["text"]."</h1>";
	$mailtype = "HTML";

	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
	$smtp->debug = false;
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	if($state==""){
		echo "sorry! send mail wrong!";
		exit();
	}
	echo "send mail OK-".date('H:i:s');

?>
