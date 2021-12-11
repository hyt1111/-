<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** TRAN05 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");
//mysql_close($conn);
mysql_select_db("00RD000", $conn);

$sql = "SET AUTOCOMMIT=0";
$res = mysql_query($sql,$conn);

$sql = "INSERT INTO `customer` (`C_ID`, `C_ID_Name`, `C_Name`, `C_Address`, `C_Yoshin`, `C_Other`) VALUES
(20, 'C_020', 'サカド新店舗', '埼玉県比企郡鳩山町石坂', '800000', '特記なし')";
$res = mysql_query($sql,$conn);

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
mysql_close($conn);

?>
</table></body></html>
