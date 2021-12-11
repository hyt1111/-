<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** View04 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
//mysql_close($conn);
mysql_select_db("00RD000", $conn);


// テーブル名（Uriage & customer）の表示
//$sql = "(SELECT C_ID FROM Uriage) UNION (SELECT C_ID_Name FROM Customer)";

//$sql = "(SELECT X.C_Name,X.C_Yoshin,COUNT(*) FROM customer AS X JOIN customer2                                 AS Y WHERE X.C_Yoshin<=Y.C_Yoshin GROUP BY X.C_ID_Name)";

//$sql = "DROP VIEW View04";
//$res = mysql_query($sql,$conn);

$sql = "ALTER VIEW View04 AS SELECT C_Name,C_ID_Name FROM customer WHERE C_Yoshin>=200000 WITH CHECK OPTION";
//$sql = "CREATE VIEW View04 AS SELECT C_ID_Name,C_Name,C_Yoshin FROM customer WHERE C_Yoshin>=200000";
$res = mysql_query($sql,$conn);


$sql = "INSERT INTO View04 VALUES(0,'条件外',100000)";
$res = mysql_query($sql,$conn);



$sql = "SELECT * FROM View04";
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
