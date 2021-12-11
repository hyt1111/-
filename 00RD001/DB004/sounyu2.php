<?php
$s=mysql_connect("localhost","root","mysqlpass") or die("失敗です"); 
print "***成功しました***";
mysql_select_db("00rd001",$s);
mysql_query('INSERT INTO customer VALUES("30","Super太郎2","東京都新宿区1-2-3","555,000")');
mysql_query('INSERT INTO customer VALUES("31","Super太郎3","東京都新宿区1-2-3","555,000")');
mysql_close($s);
?>