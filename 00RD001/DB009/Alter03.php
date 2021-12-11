<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** Alter03 条件に一致したレコードを削除 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
mysql_select_db("00RD001", $conn);


// 条件に一致したレコードを削除
$sql = "DELETE FROM NEW_customer WHERE C_Yoshin<=200000";
$res = mysql_query($sql,$conn);

// テーブル名（customer）の表示
$sql = "SELECT * FROM NEW_customer";
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
