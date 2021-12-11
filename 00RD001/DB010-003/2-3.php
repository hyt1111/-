<meta http-equiv = "content-type" content = "text/html; charset = utf-8">
<html>
	<head>
		<title>文書のタイトル</title>
	</head>
	<body>
		<?php
		$conn = mysqli_connect("127.0.0.1", "root", "mysqlpass", "13rd054") or die("失敗です");
		print"Productテーブル<br>";

		print"
			<table border = '1'>//"1"ではエラーが起きるため、'1'に変更
				<tr>
					<th>Code</th><th>Name</th><th>Category</th><th>Price</th>
				</tr>";
		$re = mysqli_query($conn, "SELECT * FROM product ORDER BY Code");
		while($kekka = mysqli_fetch_array($re)) {
			print "<tr><td>";
			print $kekka[0];
			print"</td><td>";
			print $kekka[1];
			print"</td><td>";
			print $kekka[2];
			print"</td><td>";
			print $kekka[3];
			print"</td></tr>";
		}
		mysqli_close($conn);
		?>
	</body>
</html>