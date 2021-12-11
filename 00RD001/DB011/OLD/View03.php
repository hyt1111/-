<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** View03 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
//mysql_close($conn);
mysql_select_db("00RD001", $conn);


// テーブル名（Uriage & customer）の表示
$sql = "DROP VIEW View03";
$res = mysql_query($sql,$conn);

$sql = "CREATE VIEW View03 AS SELECT customer.C_ID_Name,Uriage.C_Kingaku,customer.C_Yoshin FROM customer JOIN Uriage USING(C_ID_Name) WHERE customer.C_Yoshin>=200000";
$res = mysql_query($sql,$conn);

$sql = "SELECT * FROM View03";
$res = mysql_query($sql,$conn);


print("<tr>");
for( $i = 0; $i < mysql_num_fields($res); $i++ ){
    print( "<td>".mysql_field_name( $res, $i)."</td>" );
}
print("</tr>");
while($row = mysql_fetch_array($res)){
    print("<tr>");
    for( $i = 0; $i < mysql_num_fields($res); $i++ ){
        print( "<td>".$row[$i]."</td>" );
    }
    print("</tr>");
}
mysql_close($conn);

?>
</table></body></html>
