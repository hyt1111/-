<meta http-equiv = "content-type" content = "text/html; charset = utf-8">
<html>
	<head>
		<title>文書のタイトル</title>
	</head>
	<body>
	・商品名から単価を取り出すことができなかった。
		<?php
		$conn = mysqli_connect("127.0.0.1", "root", "mysqlpass", "00rd001") or die("失敗です");
		//全商店名を取得しC_nameへ
		$C_name = mysqli_query($conn, "SELECT C_Name FROM customer ORDER BY C_ID");
		//全商品名を取得しG_nameへ
		$G_name = mysqli_query($conn, "SELECT G_Name FROM goods ORDER BY G_ID");
		
		
		echo'
		<form name="selbox">
			商店名
			<select name="customer">
				<option value="">*商店選択</option>';
				while($kekka = mysqli_fetch_array($C_name)) {
					echo'<option value="">';print$kekka[0];echo'</option>';
				}
			echo'
			</select>

			<br>商品名
			<select name="goods" id = "goods" onchange="massSet()">
				<option value="">*商品選択</option>';
				while($kekka = mysqli_fetch_array($G_name)) {
					echo'<option value="">';print$kekka[0];echo'</option>';
				}
				
			echo'
			</select>
			
			<br>個数　
			<select name="number" id = "number">
				<option value="0">*個数</option>';
				$i = 1;
				while($i <= 100) {
					echo'<option value="$i">';print$i;echo'</option>';
					$i = $i + 1;
				}
			echo'
			</select>
			//確認ボタン
			<input type = "button" value = "確認" onclick = "setvalue()">
			
			
			<br>
			<br>単価　　
			<input type = "text" disabled size = "20" name = "tanka" value = "">
			<br>合計金額
			<input type = "text" disabled size = "20" name = "goukei" value = "">
			
			
			//実行ボタン
			<input type = "button" value = "実行" onclick = "setquery()">
			
		</form>';
		
		echo'<script>
		
		//確認ボタンを押したときに実行される
		function setvalue() {
			var element = document.getElementById("goods");';
			//$rec = document.selbox.number.selectIndex; //使用できず
			$rec = element.selectedIndex;
			$G_price = mysqli_query($conn, "SELECT G_Price FROM goods ORDER BY G_ID WHERE G_ID = '%$rec%'");
			$kekka = mysqli_fetch_array($G_price);
			//下記の文が実行できなかった。普通に定数を入れた場合は成功を確認した。成功したりしなかったりするパターンがありよくわからなかった
			echo 'document.selbox.tanka.value = ';$kekka[0];
			echo'
		}
		</script>';
		?>
	</body>
</html>