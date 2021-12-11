<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head><title>*** Select （6）条件指定 ***</title></head>
<body>
<table border="1">
<?php
$conn = mysql_connect("127.0.0.1","root","mysqlpass");

mysql_select_db("00RD001", $conn);

$sql = "SELECT C_Name as 会社名,C_Yoshin*100 as 与信限度額 FROM customer LIMIT 100"; 
/*	$sql = "SELECT * FROM customer LIMIT 2"; */
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
</table>
</body>
</html>
