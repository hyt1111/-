<html><head><title>*** Join04 ***</title></head>
<body><table border="1">
<?php
$conn = mysqli_connect("127.0.0.1","root","mysqlpass","19rd142");
// テーブル名（左外部結合customer2 Join customer2）の表示
//同じテーブルを結合して順位付けを行う。
$res = mysqli_query($conn,"(SELECT X.C_Name,X.C_Yoshin,COUNT(*)
FROM customer2 AS X JOIN customer2 AS Y WHERE
X.C_Yoshin<=Y.C_Yoshin GROUP BY X.C_ID_Name)");
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