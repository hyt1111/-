<html><head><title>*** Join03 ***</title></head>
<body><table border="1">
<?php
$conn = mysqli_connect("127.0.0.1","root","mysqlpass","19rd142");
// テーブル名（ customer2 Join customer3）の表示
$res = mysqli_query($conn,"(SELECT * FROM customer2 AS X JOIN 
customer3 AS Y )");
print("<tr>");
for( $i = 0; $i < mysqli_num_fields($res); $i++){
    $table_name = mysqli_fetch_field_direct($res, $i);
    print ("<td>".$table_name->name."</td>");}
print("</tr>");
while($row = mysqli_fetch_array($res)){
    print("<tr>");
    for( $i = 0; $i < mysqli_num_fields($res); $i++ ){
        print( "<td>".$row[$i]."</td>" );}
    print("</tr>");
}
?>
</table></body></html>