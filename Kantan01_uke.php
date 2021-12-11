<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>*** Kadai01_uke ***</title>
</head>
<body>
	<?php
		$conn = mysqli_connect("127.0.0.1", "root", "mysqlpass", "19rd142") or die("失敗です");
		$c_name = $_POST["c_name"];
		$g_name = $_POST["g_name"];
		$g_value = $_POST["g_value"];
		$goukei =  $_POST["goukei"];
		$c_sql = mysqli_query($conn,"SELECT * FROM customer  WHERE C_NAME='$c_name'");
		$g_sql = mysqli_query($conn, "SELECT * FROM goods WHERE G_PRICE = '$g_name'");
		$uriage = mysqli_fetch_array($c_sql)[5] + $goukei;
		$zaiko = mysqli_fetch_array($g_sql)[4] -  $g_value;

		if($zaiko < 0){
			print("在庫がありません");
		}else{
			mysqli_query($conn,"UPDATE customer SET C_URI= '$uriage' WHERE C_NAME='$c_name'");
			mysqli_query($conn,"UPDATE goods  SET G_ZAIKO= '$zaiko' WHERE G_PRICE = '$g_name'");
			print("購入完了");
		}
		mysqli_close($conn);
	?>
</body>
</html>