<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$s=mysql_connect("localhost","root","mysqlpass") or die("失敗しました");
print "接続OK！<BR>";
mysql_select_db("00rd001");
$c1_d=$_POST["c1"];
$re=mysql_query("SELECT * FROM customer WHERE C_ID LIKE
'%$c1_d%'");
while($kekka=mysql_fetch_array($re)){
print $kekka[0]; print " : ";
print $kekka[1]; print " : ";
print $kekka[2]; print " : ";
print $kekka[3]; print "<BR>";
}
mysql_close($s);
print "<BR><A HREF='kantan.html'>トップメニューに戻ります</A>";
?>
