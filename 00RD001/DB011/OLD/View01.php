<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** View01 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
//mysql_close($conn);
mysql_select_db("00RD001", $conn);


// テーブル名（Uriage & customer）の表示
//$sql = "(SELECT C_ID FROM Uriage) UNION (SELECT C_ID_Name FROM Customer)";

//$sql = "(SELECT X.C_Name,X.C_Yoshin,COUNT(*) FROM customer AS X JOIN customer2                                 AS Y WHERE X.C_Yoshin<=Y.C_Yoshin GROUP BY X.C_ID_Name)";

$sql = "DROP VIEW View01";
$res = mysql_query($sql,$conn);

$sql = "CREATE VIEW View01 AS SELECT C_ID,C_ID_Name,C_Name,C_Yoshin FROM customer";
$res = mysql_query($sql,$conn);

$sql = "SELECT * FROM View01";
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
