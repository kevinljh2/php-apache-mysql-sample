<?php
ini_set('date.timezone','Asia/Shanghai');
	require_once "email.class.php";

	$smtpserver = "smtp.163.com";
	$smtpserverport =25;
	$smtpusermail = "kevinljh7@163.com";
	$smtpemailto ="2971282988@qq.com";
	$smtpuser = "kevinljh7";
	$smtppass = "5533531531";
	$mailtitle =date("Y-m-d H:i:s");
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
