<?php
$s=mysql_connect("localhost","root","mysqlpass")
or die("失敗です");
print "成功しました<BR>";
$sql = "SHOW TABLES FROM 00rd000";
$res = mysql_query($sql,$s);
while($kekka=mysql_fetch_array($res)){
print $kekka[0];
print "<BR>"; }
mysql_close($s);
?>
