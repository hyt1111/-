<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** Alter05　 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("localhost","root","mysqlpass");
mysql_select_db("07RD000", $conn);


// 条件に一致したレコードのコピー
$sql = "CREATE TABLE Uriage SELECT * FROM customer WHERE C_ID_Name LIKE '%C%'";
$res = mysql_query($sql,$conn);

// テーブル名（customer）の表示
$sql = "SELECT * FROM Uriage";
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
?>
</table></body></html>
