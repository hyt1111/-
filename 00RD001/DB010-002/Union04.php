<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** Union04 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("localhost","root","mysqlpass");
mysql_select_db("00RD000", $conn);


// テーブル名（Uriage & customer）の表示
//$sql = "(SELECT C_ID FROM Uriage) UNION (SELECT C_ID_Name FROM Customer)";
//$sql = "(SELECT * FROM customer) UNION (SELECT * FROM customer2)";




// テーブル名（左外部結合customer Join customer2）の表示
$sql = “(SELECT X.C_Name,X.C_Yoshin,COUNT(*) FROM customer AS X
JOIN customer2 AS Y WHERE X.C_Yoshin<=Y.C_Yoshin GROUP BY
X.C_ID_Name)";
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
