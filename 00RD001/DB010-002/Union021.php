<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** Union01 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("localhost","root","mysqlpass");
mysql_select_db("00RD000", $conn);


// テーブル名（Uriage & customer2）の表示
//$sql = "(SELECT C_ID FROM Uriage) UNION (SELECT C_ID_Name FROM customer2)";
$sql = "(SELECT * FROM customer2) UNION (SELECT * FROM customer2)";
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
