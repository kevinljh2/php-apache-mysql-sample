<?php
ini_set('date.timezone','Asia/Shanghai');
	/**
	 * ע�����ʼ��඼�Ǿ����Ҳ��Գɹ��˵ģ������ҷ����ʼ���ʱ��������ʧ�ܵ����⣬������¼����Ų飺
	 * 1. �û����������Ƿ���ȷ��
	 * 2. ������������Ƿ�������smtp����
	 * 3. �Ƿ���php���������⵼�£�
	 * 4. ��26�е�$smtp->debug = false��Ϊtrue��������ʾ������Ϣ��Ȼ����Ը��Ʊ�����Ϣ��������һ�´����ԭ��
	 * 5. ������ǲ��ܽ�������Է��ʣ�http://www.daixiaorui.com/read/16.html#viewpl 
	 *    ����������У���������Ҫ�ҵĴ𰸡�
	 */

	require_once "email.class.php";
	//******************** ������Ϣ ********************************
	$smtpserver = "smtp.163.com";//SMTP������
	$smtpserverport =25;//SMTP�������˿�
	$smtpusermail = "kevinljh7@163.com";//SMTP���������û�����
	$smtpemailto ="2971282988@qq.com";
	$smtpuser = "kevinljh7";//SMTP���������û��ʺ�
	$smtppass = "5533531531";//SMTP���������û�����
	$mailtitle =$_GET["text"];
	$mailcontent = "<h1>".$_GET["text"]."</h1>";//�ʼ�����
	$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
	//************************ ������Ϣ ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
	$smtp->debug = false;//�Ƿ���ʾ���͵ĵ�����Ϣ
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	if($state==""){
		echo "sorry! send mail wrong!";
		exit();
	}
	echo "send mail OK-".date('H:i:s');

?>