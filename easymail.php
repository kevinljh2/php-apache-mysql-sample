<?php
ini_set('date.timezone','Asia/Shanghai');
$to = "2971282988@qq.com";
$subject =date('H:i:s');
$message =date('H:i:s');
$from = "kevinljh6@163.com";
mail($to,$subject,$message,$headers);
echo "Mail Sent-".date('H:i:s');
?>
