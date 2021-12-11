<html><meta http-equiv="content-type" content="text/html;
charset=utf-8">
<head><title>*** Alter （1） ***</title></head><body>
<table border="1">
<?php
	$conn = mysqli_connect("127.0.0.1","root","mysqlpass","13rd054");
	$Table_name = "customer";
	
	// テーブル名(customer)の更新
	$sql = "UPDATE customer set C_Other='高信頼'where C_Yoshin>=300000";
	$res = mysqli_query($conn,$sql);
	
	// テーブル名(customer)の表示
	$res = mysqli_query($conn,"SELECT * FROM $Table_name");
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