<?
ini_set('user_agent','Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36'); 
error_reporting(0); 
$lei = $_GET["fl"];
if ($lei=="")
{
	$lei="jiaoyu9820";
}
$pid = $_GET["p"];
if ($pid=="")
{
	$pid=1;
}

$url="http://b2b.huangye88.com/dongguan/".$lei."/pn".$pid."/";
$source = file_get_contents($url);	
$data1=explode("<dt><h4><a href=\"",$source);

for ($i=1;$i<=20;$i++)
{
$url1=explode("/\" title=\"",$data1[$i])[0]."/company_contact.html";

if (strpos($url1,"/gongsi/")<=0)
{
try { 
$data2= file_get_contents($url1);
$data3=explode("<ul class=\"con-txt\"><li><label>",$data2)[1];
$data4=explode("</li></ul>",$data3)[0];
$data7=explode("<li><label>",$data4);

$data5=explode("<p class=\"small\" style=\"float:left;\">",$data2)[1];
$data6=explode("</p>",$data5)[0];
$iphone=str_replace(array("手机：</label>","</li>"),"",$data7[1]);
$cname=str_replace(array("公司名称：</label>","</li>"),"",$data7[2]);
$gphone=str_replace(array("电话：</label>","</li>"),"",$data7[3]);

if (strpos($gphone,"司主页")<=0 && $gphone!="")
{
$out.=$cname."#".$gphone."#".$iphone."#".$data6."@<br>";
}
}catch (Exception $e) 
{}

}else
{
try {
$data2= file_get_contents($url1);
$data3=explode("<td class=\"diff_td\">",$data2);	
$cnamedata=explode("title=\"",$data3[1])[1];
$cname=explode("\"",$cnamedata)[0];
$gszy="";
$iii=0;

for ($ii=2;$ii<count($data3);$ii++)
{   
 	if (strpos($data3[$ii],"司主营")>0 && $iii==0)
	{
	$gszy=str_replace(array("公司主营:&nbsp;</td><td>","</td></tr><tr>"),"",preg_replace("/\s/","",$data3[$ii]));
	$iii=1;
	}	
	
	if (strpos($data3[$ii],"司电话")>0)
	{
		$gtel1=str_replace(array("86-","公司电话:&nbsp;</td><td><spanstyle=\"color:red;\">","<span></td></tr><tr>"),"",preg_replace("/\s/","",$data3[$ii]));
		$gtel2=str_replace(array("860769","86769"),"0769-",$gtel1);
		$gtel=preg_replace("/\s/","",$gtel2);
	}
}

$out.=$cname."#".$gtel."##".$gszy."@<br>";
}catch (Exception $e) 
{}
}



}
echo $out;
?>