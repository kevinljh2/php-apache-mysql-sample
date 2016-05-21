<?
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ALL ^ E_NOTICE);
print('<!DOCTYPE HTML>
<html>
<head>
    <title>Long</title>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no" />
    <meta http-equiv="refresh" content="15">
</head>
<body bgcolor="black">
<font color="#C0C0C0">');
$mailbool=false;
$url="http://lt.bbbaiu.com/pt/mem/ajax/casino/external/public/3819831?lang=zh-cn";
$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10); 
$data = curl_exec($ch); 
$game0=str_replace(array('"',"{","}","[","]"),"",$data);
$game1=explode("long_dragon:win:",$game0);
$game2=explode(",lose:",$game1[1]);
$game3=explode(",name:",substr($game2[0],5));
foreach ($game3 as $value) 
{
$namearr=explode(",choose_name:",$value);
$name1=$namearr[0];
$namearr1=explode(",count:",$namearr[1]);
$nametz=$namearr1[0];
$count=$namearr1[1];
$out1=$name1.",".$nametz.",".$count; 
$out2.=$out1."<br>";

if ($count>=9)
{
$mailbool=true;
}

}
$out3=json_decode('"'.$out2.'"');
echo $out3;
echo "</body></html>";

if ($mailbool==true)
{
$urla="http://kevinljh2-wp.daoapp.io/sendmail6.php?text=".$out3;
$cha = curl_init(); 
curl_setopt ($cha, CURLOPT_URL, $urla); 
curl_setopt ($cha, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($cha, CURLOPT_CONNECTTIMEOUT,10); 
$dataa = curl_exec($ch); 
}

?>
