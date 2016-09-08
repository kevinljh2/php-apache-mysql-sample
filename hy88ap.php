<?
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36'); 
error_reporting(0); 
$lei = $_GET["fl"];
if ($lei=="")
{
	$lei="jiaoyu";
}

$url="http://b2b.huangye88.com/dongguan/".$lei."/pn1/";
$data = file_get_contents($url);	
$pos1=strpos($data,'<em>');
$pos2=strpos($data,'</em>',$pos1+1);
$ap=substr($data,$pos1+4,$pos2-$pos1-4);
echo $ap;

?>