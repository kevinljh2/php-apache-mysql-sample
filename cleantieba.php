<?
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;)'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai');
print('<!DOCTYPE HTML>
<html>
<head>
	<title>3w-Tiebatest</title>
	<meta http-equiv=Content-Type content="text/html;charset=gb2312">
	<meta name="viewport" content="width=device-width, user-scalable=no" />
</head>
<body bgcolor="black">
<font color="#C0C0C0">');
$myfile = fopen("tieidnew.txt", "w") or die("Unable to open file!");
fwrite($myfile,"");
fclose($myfile);
echo "删除成功-".date('H:i:s');
echo "</body></html>"
?>