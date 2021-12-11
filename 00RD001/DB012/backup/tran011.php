<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** TRAN01 ***</title></head>
<body><table border="1">
<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
//mysql_close($conn);
mysql_select_db("00RD000", $conn);

$sql = "SHOW CREATE TABLE customer2 \G";
$res = mysql_query($sql,$conn);


?>
</table></body></html>