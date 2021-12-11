<meta http-equiv = "content-type" content = "text/html; charset = utf-8">
<?php
$conn = mysqli_connect("127.0.0.1", "root", "mysqlpass", "13rd054") or die("失敗です");
print"接続OK！<br>";
$re = mysqli_query($conn, "SELECT * FROM customer ORDER BY C_ID");
while($kekka = mysqli_fetch_array($re)) {
	print $kekka[0];
	print":";
	print $kekka[1];
	print":";
	print $kekka[2];
	print":";
	print $kekka[3];
	print"<BR>";
}
mysqli_close($conn);
print"<br><A HREF = 'kantan2.html'>トップメニューに戻ります</A>";
?>