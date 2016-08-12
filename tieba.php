<?
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai');
print('<!DOCTYPE HTML>
<html>
<head>
	<title>Dao-Tieba</title>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no" />
</head>
<body bgcolor="black">
<font color="#C0C0C0">');
echo date('H:i:s');
	$iddata=$_GET["getid"];
	$id=explode(",",$iddata);
$data1=null;
$handle=null;
$handle=null;
$handle = @fopen("tiebaid.txt", "r");
$ii=0;
if ($handle) {
    while (!feof($handle)) {
		$buffer="";
        $buffer = fgets($handle, 4096);
		$temp="";
        $temp=explode("#",$buffer);
		$oid[$ii]=$temp[0];
		$olou[$ii]=$temp[1];
		$ii++;
		
    }
    fclose($handle);
}
FOR ($i =0; $i <count($id); $i++) 
{
$oldnew="";	
$idurl="http://tieba.baidu.com/mo/q---48F9208AB5F8EE681F4B142F8BE942EE%3AFG%3D1--1-1-0--2--wapp_1439010894807_308/m?pnum=1&kz=".$id[$i]."&see_lz=1";
//$data1 = file_get_contents($idurl);
$data1=fopen($idurl,"r");
/*  $ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $idurl); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$data1 = curl_exec($ch);   */ 
$ad_title1=strpos($data1,'<title>',0);
$ad_title2=strpos($data1,'>',$ad_title1);
$ad_title3=strpos($data1,'</title>',$ad_title2+1);
$str_title=substr($data1,$ad_title2+1,$ad_title3-$ad_title2-1);
$ad_lounum1=strpos($data1,'pnum',$ad_title3);
$ad_lounum2=strpos($data1,'value=',$ad_lounum1+1);
$ad_lounum3=strpos($data1,'/><input',$ad_lounum2+1);
$str_lounum="";
if ($ad_lounum1>0)
{
$str_lounum=substr($data1,$ad_lounum2+7,$ad_lounum3-$ad_lounum2-8);
}else
{
$str_lounum="1";
}
$str_newurl="";
$str_newurl="http://tieba.baidu.com/mo/q---48F9208AB5F8EE681F4B142F8BE942EE%3AFG%3D1--1-1-0--2--wapp_1439010894807_308/m?pnum=".$str_lounum."&kz=".$id[$i]."&see_lz=1";
$data1="";
$data1=$data1=fopen($str_newurl,"r");
//$data1= file_get_contents($str_newurl);

/*$ch = curl_init(); 
 curl_setopt ($ch, CURLOPT_URL, $str_newurl); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);  
$data1 = curl_exec($ch); */
$ad_lastlou1=strrpos($data1,'<div class="i">',0);
$ad_lastlou2=strpos($data1,'>',$ad_lastlou1+1);
$ad_lastlou3=strpos($data1,'це╝.',$ad_lastlou2+1);
$str_lastlou=substr($data1,$ad_lastlou2+1,$ad_lastlou3-$ad_lastlou2-1);
//echo "////".$str_lastlou."///////";
$gehang="";
if ($str_lastlou>$olou[$i])
{
	$oldnew="New";
	$newfiletext.="#".$str_lastlou."#".$str_title."#".$str_lounum."#".$id[$i]."\r\n";
	$gehang="--------------------------------------\r\n";
}
$jieguo.="<a href='http://tieba.baidu.com/mo/m?kz=".$id[$i]."&see_lz=1' style='text-decoration:none;color:white' target='_blank'>".$id[$i]."/".$str_title."/".$str_lastlou."Floor/".$str_lounum."Page".$oldnew."</a>"."<br>";
$jieguo2.=$id[$i]."#".$str_lastlou."#".$str_lounum."\r\n";
}
$jieguo3=$newfiletext.$gehang;
echo "-".date('H:i:s')."<br>".$jieguo;
echo "</body></html>";
$myfile = fopen("tiebaid.txt", "w") or die("Unable to open file!");
fwrite($myfile,$jieguo2);
fclose($myfile);
$myfile="";
$myfile = fopen("tieidnew.txt", "a") or die("Unable to open file!");
fwrite($myfile,$jieguo3);
fclose($myfile);
?>
