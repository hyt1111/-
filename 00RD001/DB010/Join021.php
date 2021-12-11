<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** Join02 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("localhost","root","mysqlpass");
mysql_select_db("00RD001", $conn);


// テーブル名（customer2 & customer3）の内部結合の表示

$sql = "(SELECT customer2.C_ID_Name,customer3.C_Name FROM customer2 JOIN customer3 ON customer2.C_ID_Name=customer3.C_ID_Name)";
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
