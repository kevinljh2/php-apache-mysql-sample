<?
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai'); 
print('<!DOCTYPE HTML>
<html>
<head>
    <title>Long</title>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no" />
</head>
<body bgcolor="black">
<font color="#C0C0C0">');

$pid = $_GET["p"];
if ($pid=="")
{
	$pid="%E4%BB%A4";
}

$len=(strlen($pid))/3;
for ($i=0;$i<$len;$i++)
{
$url1="http://www.zhihuishan.com/bishun/?words=".urlencode(substr($pid,$i*3,3));
$data1=file_get_contents($url1);
$pos1=strpos($data1,'bishun-gif',0);
$pos2=strpos($data1,'<img src',$pos1+1);
$pos3=strpos($data1,'.gif',$pos2+1);
$bhurl.=substr($data1,$pos2,$pos3-$pos2).".gif\" />";
}
echo $bhurl;
echo "</body></html>"
?>