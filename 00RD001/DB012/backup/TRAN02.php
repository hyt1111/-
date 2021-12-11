<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html><head><title>*** TRAN02 ***</title></head>
<body><table border="1">

<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");

//mysql_close($conn);
mysql_select_db("00RD000", $conn);

$sql = "ALTER TABLE customer ENGINE=InnoDB";
//$sql = "ALTER TABLE customer ENGINE=MYISAM";
$res = mysql_query($sql,$conn);

$sql = "SHOW CREATE TABLE customer";
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
