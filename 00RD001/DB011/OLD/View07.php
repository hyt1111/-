<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** View07 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
//mysql_close($conn);
mysql_select_db("00RD000", $conn);


// テーブル名（Uriage & customer）の表示
//$sql = "(SELECT C_ID FROM Uriage) UNION (SELECT C_ID_Name FROM Customer)";

//$sql = "(SELECT X.C_Name,X.C_Yoshin,COUNT(*) FROM customer AS X JOIN customer2                                 AS Y WHERE X.C_Yoshin<=Y.C_Yoshin GROUP BY X.C_ID_Name)";

$sql = "DROP VIEW View01";
$res = mysql_query($sql,$conn);

$sql = "DROP VIEW View02";
$res = mysql_query($sql,$conn);

$sql = "DROP VIEW View03";
$res = mysql_query($sql,$conn);

mysql_close($conn);

?>
</table></body></html>
