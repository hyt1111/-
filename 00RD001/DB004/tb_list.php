<?php
$conn=mysqli_connect("127.0.0.1","root","mysqlpass","00rd001") or die("失敗です"); 
print "成功しました";print "<BR>";
$sql = "SHOW TABLES FROM 00rd001";
$res = mysqli_query($conn ,$sql);
while($kekka=mysqli_fetch_array($res)){
print $kekka[0];
print "<BR>";}
mysqli_close($conn);

?>