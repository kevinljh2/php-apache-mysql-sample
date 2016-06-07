<?
$url="http://lt.v1bet.net/pt/mem/ajax/casino/external/public/69?lang=zh-cn";
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

}

$out3=json_decode('"'.$out2.'"');
echo $out3;

?>
