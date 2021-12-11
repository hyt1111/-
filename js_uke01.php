<html>
<head>
<meta charset="UTF-8">
</head>
	<body>
<?php
// DB接続
$conn = mysqli_connect("127.0.0.1","root", "mysqlpass", "19rd142") or die("失敗です");
$new_value = $_POST["new_value_okuri"];
$G_ID = $_POST["G_ID"];
$query = "UPDATE goods SET G_Price = $new_value WHERE G_ID = $G_ID";
$result = mysqli_query($conn, $query);
print("更新しました<BR>");
$re=mysqli_query($conn,"SELECT * FROM goods ORDER BY G_ID");
while($kekka=mysqli_fetch_array($re)){
print $kekka[0];
print " : ";
print $kekka[1];
print " : ";
print $kekka[2];
print " : ";
print $kekka[3];
print "<BR>";
}
mysqli_close($conn);
?>
</body>
</html>