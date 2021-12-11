<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$conn=mysqli_connect("localhost","root","mysqlpass","13rd054") or die("失
敗しました");
print "接続OK！<BR>";
$C_ID=$_POST["a0"];
$C_Name=$_POST["a1"];
$C_Address=$_POST["a2"];
$C_Yoshin=$_POST["a3"];
mysqli_query($conn,"INSERT INTO customer(C_ID,C_Name,C_Address,C_Yoshin)
VALUES('$C_ID','$C_Name','$C_Address','$C_Yoshin')");
$re=mysqli_query($conn,"SELECT * FROM customer ORDER BY C_ID");
while($kekka=mysqli_fetch_array($re)){
print $kekka[0]; print " : ";
print $kekka[1]; print " : ";
print $kekka[2]; print " : ";
print $kekka[3]; print "<BR>";
}
mysqli_close($conn);
print "<BR><A HREF='kantan2.html'>トップメニューに戻ります</A>";?>