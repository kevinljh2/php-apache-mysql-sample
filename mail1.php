<?
ini_set('date.timezone','Asia/Shanghai');
$myfile = fopen("chalong.txt", "w") or die("Unable to open file!");
fwrite($myfile,"#1");
fclose($myfile);
echo "Send chalong OK-".date('H:i:s');
?>