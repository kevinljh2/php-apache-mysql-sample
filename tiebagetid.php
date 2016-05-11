<?
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727;)'); 
error_reporting(E_ALL ^ E_NOTICE);

$handle = @fopen("tiebapid.txt", "r");
if ($handle) {
    while (!feof($handle)) {
		$buffer="";
        $buffer = fgets($handle, 4096);
		if (strpos($buffer,'/',0)>0)
		{	
		$temp="";
        $temp=explode("/",$buffer);
        $jieguo.=$temp[0].",";
	    }
    }
    fclose($handle);
}

echo substr($jieguo,0,strlen($jieguo)-1);
?>