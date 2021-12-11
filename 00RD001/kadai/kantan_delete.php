<?php
$s=mysql_connect("localhost","root","mysqlpass") or die("失敗しました");
print "接続完了。<BR>";
mysql_select_db("07ru099");
$b1_d=$_POST["b1"];
mysql_query("DELETE FROM customer WHERE C_ID=$b1_d");
$re=mysql_query("SELECT * FROM customer ORDER BY C_ID");
while($kekka=mysql_fetch_array($re)){
print $kekka[0];
print " : ";
print $kekka[1];
print " : ";
print $kekka[2];
print "<BR>";
}
mysql_close($s);
print "<BR><A HREF='kantan.html'>トップメニュー</A>";
?>