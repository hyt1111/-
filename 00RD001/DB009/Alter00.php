<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** Alter00 （0）　 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
mysql_select_db("00RD001", $conn);


// テーブル名（customer）の追加
$sql = "ALTER table customer add C_Other varchar(100)";
$res = mysql_query($sql,$conn);

// テーブル名（customer）の更新
$sql = "UPDATE customer set C_Other='特記なし'";
$res = mysql_query($sql,$conn);

// テーブル名（customer）の表示
$sql = "SELECT * FROM customer";
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
