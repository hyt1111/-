<html><meta http-equiv="content-type" content="text/html;
charset=utf-8"><head><title>*** 4-2 ***</title></head>
<body><table border="1">
<?php
$conn = mysqli_connect("127.0.0.1","root","mysqlpass","19rd142");
$Table_name2 = "product"; /*テーブル名設定（product) */
$Table_name3 = "denpyou"; /*テーブル名設定（denpyou) */
$res = mysqli_query($conn,"(SELECT denpyou.Code as 伝票番号,product.Code as 商品番号,product.Name as 商品名,product.Category as 種別,product.Price as 単価 ,denpyou.Quantity as 数量 FROM $Table_name2 JOIN denpyou ON product.Code= $Table_name3.Product_Code)");
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