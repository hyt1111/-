<html><meta http-equiv="content-type" content="text/html;
charset=utf-8">
<head><title>*** Join01 ***</title></head><body>
<table border="1">
<?php
	$conn = mysqli_connect("127.0.0.1","root","mysqlpass","13rd054");
	$Table_name2 = "customer2";
	$Table_name4 = "uriage";
	
	// テーブル名(customer2 & customer)の表示
	$sql = "(SELECT * FROM $Table_name2 JOIN uriage ON customer2.C_ID_Name = $Table_name4.C_ID_Name)";
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