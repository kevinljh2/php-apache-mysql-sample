<?
$myfile = fopen("chalong.txt", "w") or die("Unable to open file!");
fwrite($myfile,"#0");
fclose($myfile);
?>