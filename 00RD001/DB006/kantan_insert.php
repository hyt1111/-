<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$s=mysql_connect("localhost","root","mysqlpass") or die("失敗しました");
print "接続OK！<BR>";	
mysql_select_db("00rd001");
$C_ID=$_POST["a0"];
$C_Name=$_POST["a1"];
$C_Address=$_POST["a2"];
$C_Yoshin=$_POST["a3"];
mysql_query("INSERT INTO customer(C_ID,C_Name,C_Address,C_Yoshin) VALUES('$C_ID','$C_Name','$C_Address','$C_Yoshin')");

$re=mysql_query("SELECT * FROM customer ORDER BY C_ID");
while($kekka=mysql_fetch_array($re)){
	print $kekka[0];	print " : ";
	print $kekka[1];	print " : ";
	print $kekka[2];	print " : ";
	print $kekka[3];	print "<BR>";
}
mysql_close($s);
print "<BR><A HREF='kantan.html'>トップメニューに戻ります</A>";
?>
