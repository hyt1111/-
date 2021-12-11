<meta http-equiv = "content-type" content = "text/html; charset = utf-8">
<html>
	<head>
		<title>商品オーダーシステム</title>

		<script type="text/javascript"> 
			<!-- 
				/* 「実行」ボタンを押した場合 */
				function check(){
					if(window.confirm('オーダーしてよろしいですか？')){
						return true;
					}
					else{
						return false;
					}
				}
			-->
		</script>
	</head>
	<body>
		<?php
			// DB接続
			$conn = mysqli_connect("127.0.0.1", "root", "mysqlpass", "00rd001") or die("失敗です");

			if(isset($_POST["action"])&&$_POST["action"]==="実行") {
				/* 「実行」ボタンが押された場合のみ入る */
				$Shouten_ID = $_POST["P_Shouten_ID"];	// C_ID
				$P_G_ID     = $_POST["P_G_ID"];			// G_ID
				$P_number   = $_POST["P_number"];		// 指定した個数

				// 指定した商店名の売上を取得する
				$C_URI_check   = mysqli_query($conn, "SELECT C_URI FROM customer WHERE C_ID = $Shouten_ID");
				$C_URI_Check   = mysqli_fetch_array($C_URI_check);
				mysqli_free_result($C_URI_check);
				// 指定した商品の単価と在庫数を取得する
				$G_ZAIKO_check = mysqli_query($conn, "SELECT G_Price, G_ZAIKO FROM goods WHERE G_ID = $P_G_ID");
				$G_ZAIKO_Check = mysqli_fetch_array($G_ZAIKO_check);
				mysqli_free_result($G_ZAIKO_check);
				if($G_ZAIKO_Check[1] >= $P_number) {
					/* 指定した個数が在庫数以下の場合 */
					$update_URI   = $C_URI_Check[0] + ($P_number * $G_ZAIKO_Check[0]);
					$update_ZAIKO = $G_ZAIKO_Check[1] - $P_number;
					mysqli_query($conn, "UPDATE customer SET C_URI   = $update_URI WHERE   C_ID = $Shouten_ID");
					mysqli_query($conn, "UPDATE goods    SET G_ZAIKO = $update_ZAIKO WHERE G_ID = $P_G_ID");
					print('オーダーが完了しました。<br>');
				}
				else {
					/* 指定した個数が在庫数を超えた場合 */
					print('<script language = "javascript">alert("選択した個数分の在庫がありません。\n現在、この商品の在庫は'.$G_ZAIKO_Check[1].'個です。");</script>');
				}
			}
			else {
				$Shouten_ID = NULL;
				$P_G_ID     = NULL;
				$P_number   = NULL;
			}

			// 全商店名を取得しC_nameへ
			$C_name = mysqli_query($conn, "SELECT C_ID, C_Name FROM customer ORDER BY C_ID");
			// 全商品名を取得しG_nameへ
			$G_name = mysqli_query($conn, "SELECT G_ID, G_Name, G_Price, G_ZAIKO FROM goods ORDER BY G_ID");

			print('<form action = "" method = "POST" name = "selbox" onSubmit = "return check();">');
				print('<h2>商品オーダーシステム</h2>');
				print('商店名　：');
				print('<select name = "customer">');
					print('<optgroup label = "*商店選択*">');
					while($kekka = mysqli_fetch_array($C_name)) {
						if($Shouten_ID == $kekka[0]) {
							print('<option value = "'.$kekka[0].'" selected>'.$kekka[1].'</option>');
						}
						else {
							print('<option value = "'.$kekka[0].'">'.$kekka[1].'</option>');
						}
					}
					mysqli_free_result($C_name);
					print('</optgroup>');
				print('</select>');

				print('<br>商品名　：');
				print('<select name = "goods" id = "goods">');
					print('<optgroup label = "*商品選択*">');
					$i = 0;
					while($kekka = mysqli_fetch_array($G_name)) {
						if($P_G_ID == $kekka[0]) {
							print('<option value = "'.$kekka[0].'" selected>'.$kekka[1].'</option>');
						}
						else {
							print('<option value = "'.$kekka[0].'">'.$kekka[1].'</option>');
						}
						$Item_tanka[] = $kekka[2];	// 商品の単価を配列に格納
						$Item_ZAIKO[] = $kekka[3];	// 商品の在庫を配列に格納
					}
					mysqli_free_result($G_name);
					// 商品の単価データと在庫数をJavaScriptで使用するために、JSONに変換する
					$J_Item_tanka = json_encode($Item_tanka);
					$J_Item_ZAIKO = json_encode($Item_ZAIKO);
					print('</optgroup>');
				print('</select>');
				
				print('<br>個数　　：');
				print('<select name = "number" id = "number">');
					print('<optgroup label = "*個数*">');
					$i = 1;
					while($i <= 100) {
						if($P_number == $i) {
							print('<option value = "'.$i.'" selected>'.$i.'</option>');
						}
						else {
							print('<option value = "'.$i.'">'.$i.'</option>');
						}
						$i++;
					}
				print('</select>');
		?>
				<!-- 確認ボタン -->
				　　　　<input type = "button" value = "確認" onclick = "setvalue();">

				<br>
				<br>単価　　：
				<input type = "text" disabled size = "20" name = "tanka" id = "tanka" value = "">
				<br>合計金額：
				<input type = "text" disabled size = "20" name = "goukei" id = "goukei" value = "">

				<!-- 実行ボタン -->
				　<input name = "action" type = "submit" id = "submit" value = "実行" disabled/>

				<input type = "hidden" name = "P_Shouten_ID" id = "P_Shouten_ID" value = "" />
				<input type = "hidden" name = "P_G_ID"       id = "P_G_ID"       value = "" />
				<input type = "hidden" name = "P_number"     id = "P_number"     value = "" />
			</form>

			<script type="text/javascript">
				/* 確認ボタンを押したときに実行される */
				function setvalue() {
					<?php print('var tanka = '.$J_Item_tanka.';'); ?>									// PHPから送られてきた商品の単価データを取得する
					<?php print('var ZAIKO = '.$J_Item_ZAIKO.';'); ?>									// PHPから送られてきた商品の単価データを取得する
					var select_Shouten_ID = document.selbox.customer.value;								// 選択した商店のIDを取得する
					var select_G_ID       = document.selbox.goods.value;								// 選択した商品のIDを取得する
					var select_G_index    = document.selbox.goods.selectedIndex;						// 選択した商品の順番を取得する
					var select_number     = document.selbox.number.value;								// 選択した個数を取得する

					if(ZAIKO[select_G_index] >= select_number) {
						document.getElementById("tanka").value  = tanka[select_G_index];					// 単価ボックスに値を入れる
						document.getElementById("goukei").value = tanka[select_G_index] * select_number;	// 合計ボックスに値を入れる

						document.getElementById("P_Shouten_ID").value  = select_Shouten_ID;					// POSTで送る商店のIDを入れる
						document.getElementById("P_G_ID").value        = select_G_ID;						// POSTで送る商品のIDを入れる
						document.getElementById("P_number").value      = select_number;						// POSTで送る個数を入れる

						document.getElementById("submit").disabled     = false;								// 「確認」ボタンを押すと「実行」ボタンを押せるようにする
					}
					else {
						alert("選択した個数分の在庫がありません。\n現在、この商品の在庫は" + ZAIKO[select_G_index] + "個です。");
					}
				}
			</script>
	</body>
</html>