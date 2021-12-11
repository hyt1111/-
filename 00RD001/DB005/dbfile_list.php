<html>
<head><title>結果リソースから情報を得る</title></head> <body>
<table border="1">
<?php
$conn = mysql_connect("127.0.0.1", "root", "mysqlpass");
mysql_select_db("00rd000", $conn);
$sql = "SELECT * FROM customer";
$res = mysql_query($sql,$conn); print("<tr>");
for( $i = 0; $i < mysql_num_fields($res); $i++ ){
print( "<td>".mysql_field_name( $res, $i)."</td>" ); }
print("</tr>");
while($row = mysql_fetch_array($res)){
print("<tr>");
for( $i = 0; $i < mysql_num_fields($res); $i++ ){
print( "<td>".$row[$i]."</td>" ); }
print("</tr>"); }
?>
</table></body></html>
