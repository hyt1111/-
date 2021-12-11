<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$conn=mysqli_connect("localhost","root","mysqlpass","13rd054") or die("失
敗しました");
print "接続OK！<BR>";
$c1_d=$_POST["c1"];
$re=mysqli_query($conn,"SELECT * FROM customer WHERE C_ID LIKE
'%$c1_d%'");
while($kekka=mysqli_fetch_array($re)){
print $kekka[0]; print " : ";
print $kekka[1]; print " : ";
print $kekka[2]; print " : ";
print $kekka[3]; print "<BR>";
}
mysqli_close($conn);
print "<BR><A HREF='kantan2.html'>トップメニューに戻ります</A>";
?>