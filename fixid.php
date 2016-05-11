<?
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;)'); 
error_reporting(E_ALL ^ E_NOTICE);
ini_set('date.timezone','Asia/Shanghai');

$iddata=$_GET["getid"];
$filename = 'urlid.txt';
file_put_contents($filename,$iddata);
echo "fix id ok";
/* $myfile = fopen("urlid.txt", "a+") or die("Unable to open file!");
$myfile="";
fwrite($myfile,$iddata);
fclose($myfile); */
?>