<?php
$s=mysqli_connect("127.0.0.1","root","mysqlpass","00rd001") or die("失敗です"); 
print "***成功しました***";

mysqli_query($s,'INSERT INTO customer VALUES("5","Super太郎1","東京都新宿区1-2-3","555,000")');
mysqli_query($s,'INSERT INTO customer VALUES("6","Super太郎2","東京都新宿区4-5-6","777,000")');
mysqli_close($s);
?>