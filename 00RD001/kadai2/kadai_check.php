<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<title>商品オーダーシステム</title>
</head>
<body>
	商品オーダーシステム<br><br>
	<form method="post" action="kadai_check.php">
	商店名
	<?PHP
		$s = mysql_connect("localhost","root","mysqlpass") or die("失敗です");
		mysql_select_db("00rd000",$s);
		$re = mysql_query("select * from customer order by c_id");
		print "<select name='a1'>";
		while($kekka=mysql_fetch_array($re)){
			if($kekka[1] == $_POST["a1"]){
				print "<option selected>";
			}else{
				print "<option>";
			}
			print $kekka[1];
			print "</option>";
		}
		print "</select>";
		mysql_close($s);
	?>
	<br>

	商品名
	<?PHP
		$s = mysql_connect("localhost","root","mysqlpass") or die("失敗です");
		mysql_select_db("00rd000",$s);
		$re = mysql_query("select * from goods order by g_id");
		print "<select name='a2'>";
		while($kekka=mysql_fetch_array($re)){
			if($kekka[1] == $_POST["a2"]){
				print "<option selected>";
			}else{
				print "<option>";
			}
			print $kekka[1];
			print "</option>";
		}
		print "</select>";
		mysql_close($s);
	?>
	<br>

	個数　
	<?PHP
		print "<select name='a3'>";
		for($i=1;$i<10;$i++){
			if($i == $_POST["a3"]){
				print "<option selected>";
			}else{
				print "<option>";
			}
			print $i;
			print "</option>";
		}
		print "</select>";
	?>
	<br>
	<input type="submit" value="確認ボタン">
<br><br>

	<form method="post">
	単価
	<?PHP
		$s = mysql_connect("localhost","root","mysqlpass") or die("失敗です");
		mysql_select_db("00rd000",$s);
		$_name = $_POST["a2"];
		$re = mysql_query("select g_zaiko from goods where g_name = '$_name'");
		if($kekka=mysql_fetch_array($re)){
			$_zaiko = $kekka[0];
		}else{
		}
		$re = mysql_query("select g_price from goods where g_name = '$_name'");
		if($kekka=mysql_fetch_array($re)){
			$_price = $kekka[0];
		}else{
		}

		if ($_zaiko >= $_POST["a3"]){
			print "<input type='text' value='$_price'>";
		}else{
			print "<input type='text'>";
		}
		mysql_close($s);
	?>
	<br>

	合計金額
	<?PHP
		$s = mysql_connect("localhost","root","mysqlpass") or die("失敗です");
		mysql_select_db("00rd000",$s);
		$_name = $_POST["a2"];
		$re = mysql_query("select g_zaiko from goods where g_name = '$_name'");
		if($kekka=mysql_fetch_array($re)){
			$_zaiko = $kekka[0];
		}else{
		}
		$re = mysql_query("select g_price from goods where g_name = '$_name'");
		if($kekka=mysql_fetch_array($re)){
			$_price = $kekka[0];
		}else{
		}

		if ($_zaiko >= $_POST["a3"]){
			$_sum = $_price * $_POST["a3"];
			print "<input type='text' value='$_sum'>";
		}else{
			print "<input type='text'>";
		}
		mysql_close($s);
	?>
	<br>
	<input type="submit" value="実行ボタン">
	</form>
	</form>
</body>
</html>