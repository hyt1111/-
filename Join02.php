<html><meta http-equiv="content-type" content="text/html; charset=utf-8">
<head><title>***Union02***</title></head><body>
<table border="1">
<?php
$conn = mysqli_connect("127.0.0.1","root","mysqlpass","19rd142");
$Table_name2 = "customer2"; /*テーブル名設定（customer2) */
$Table_name4 = "uriage";
// テーブル名（内部結合 customer2 Join customer3）の表示
$res = mysqli_query($conn,"(SELECT customer2.C_ID_Name,customer3.C_Name FROM customer2 JOIN customer3 ON customer2.C_ID_Name=customer3.C_ID_Name)");
print("</tr>");
while($row = mysqli_fetch_array($res)){ 
	print("<tr>");
	for( $i = 0; $i < mysqli_num_fields($res); $i++ ){
		print( "<td>".$row[$i]."</td>" );
	} 
	print("</tr>");
}
?> 
</table></body></html>
