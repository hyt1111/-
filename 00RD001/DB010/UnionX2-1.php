<html>	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<head><title>*** Union01 ***</title></head><body>
		<table border="1">
<?php
$conn = mysqli_connect("127.0.0.1","root","mysqlpass","00rd001");
$Table_name2 = "customer2";
$Table_name3 = "customer3";

// テーブル名（customer2 & customer3）の表示
$res = mysqli_query($conn,"(SELECT * FROM $Table_name2) UNION (SELECT * FROM $Table_name3)");




	print("<tr>");
		for( $i = 0; $i < mysqli_num_fields($res); $i++){
		$table_name = mysqli_fetch_field_direct($res, $i);
		print	("<td>".$table_name->name."</td>");}
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
