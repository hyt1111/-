<html><meta http-equiv="content-type" content="text/html;
charset=utf-8">
<head><title>*** Join02 ***</title></head><body>
<table border="1">
<?php
	$conn = mysqli_connect("127.0.0.1","root","mysqlpass","00rd000");
	$Table_name2 = "customer2";
	$Table_name3 = "customer3";
	
	// テーブル名(内部結合 customer2 & customer3)の表示
	$sql = "(SELECT customer2.C_ID_Name, customer3.C_Name FROM $Table_name2 JOIN $Table_name3 ON customer2.C_ID_Name = $Table_name3.C_ID_Name)";
	$res = mysqli_query($conn,$sql);
	print("<tr>");
	for( $i = 0; $i < mysqli_num_fields($res); $i++){
		$table_name = mysqli_fetch_field_direct($res, $i);
		print ("<td>".$table_name->name."</td>");
	}
	print("</tr>");
	// テーブルの中身を表示
	while($row = mysqli_fetch_array($res)){
	print("<tr>");
		for( $i = 0; $i < mysqli_num_fields($res); $i++ ){
			print( "<td>".$row[$i]."</td>" );
		}
		print("</tr>");
	}
?>
</table></body></html>