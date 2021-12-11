<?php
$conn = mysqli_connect("127.0.0.1", "root", "mysqlpass", "13rd054") or die("失敗です");
print "成功しました"; print"<BR>";
$sql = "SHOW TABLES FROM 13rd054";
$res = mysqli_query($conn,$sql);
while($kekka=mysqli_fetch_array($res)){
print $kekka[0];
print "<BR>"; }
mysqli_close($conn);
?>