<html>	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<head><title>*** Tran05 ***</title></head><body>
		<table border="1">
<?php
$conn = mysqli_connect("127.0.0.1","root","mysqlpass","00rd001");

$sql = "SET AUTOCOMMIT=1";
$res = mysqli_query($conn, $sql);

$sql = "INSERT INTO customer2 (C_ID, C_ID_Name, C_Name, C_Address, C_Yoshin, C_Other) VALUES (20, 'C_020', 'サカド新店舗', '埼玉県比企郡鳩山町石坂', '800000', '特記なし')";
$res = mysqli_query($conn, $sql);


$sql = "SELECT * FROM customer2";
$res = mysqli_query($conn, $sql);

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
