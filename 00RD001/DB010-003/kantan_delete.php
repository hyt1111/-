<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$conn=mysqli_connect("localhost","root","mysqlpass","00rdxxx") or die("
失敗しました");
print "接続OK！<BR>";
$b1_d=$_POST["b1"];
mysqli_query($conn,"DELETE FROM customer WHERE C_ID=$b1_d");
$re=mysqli_query($conn,"SELECT * FROM customer ORDER BY C_ID");
while($kekka=mysqli_fetch_array($re)){
print $kekka[0]; print " : ";
print $kekka[1]; print " : ";
print $kekka[2]; print " : ";
print $kekka[3]; print "<BR>";
}
mysqli_close($conn);
print "<BR><A HREF='kantan2.html'>トップメニューに戻ります</A>";
?>