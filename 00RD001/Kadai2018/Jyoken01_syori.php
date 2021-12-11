<meta http-equiv = "content-type" content = "text/html; charset = utf-8">
<html>
	<head>
		<title>条件指定検索プログラム１</title>
	</head>

	<style>
		table {
			border-color: #000000;
		}
		th {
			padding: 4px;
		}
		td {
			padding: 4px;
		}
		.arrow_div {
			width: 500px;
			text-align: center;
		}
		#arrow {
		}
	</style>
	<body>
		<?php
			$symbol1 = "";
			$symbol2 = "";
			$hani1   = "";
			$hani2   = "";
			$check1  = "";
			$check2  = "";

			$check_num = false;
			// 倍数データ取得
			if(!empty($_POST["baisuu"]) && preg_match("/^[0-9]+$/", $_POST["baisuu"])) {
				$baisuu = $_POST["baisuu"];
			} else {
				$baisuu = 1;
			}

			// 限度データ取得
			if(!empty($_POST["limit"]) && preg_match("/^[0-9]+$/", $_POST["limit"])) {
				$limit = "LIMIT ".$_POST["limit"];
			} else {
				$limit = "";
			}

			// オフセットデータ取得
			if(!empty($_POST["offset"]) && preg_match("/^[0-9]+$/", $_POST["offset"])) {
				$offset = "OFFSET ".$_POST["offset"];
			} else {
				$offset = "";
			}

			// ラジオボタンチェック番号取得
			if(!empty($_POST["hani"])) {
				$hani = $_POST["hani"];
			} else {
				$hani = 'hani0';
			}
			switch($hani){
				case "hani1":
					$symbol1 = ">";
					if(preg_match("/^[0-9]+$/", $_POST["hani11"])) {
						$hani1     = $_POST["hani11"];
						$check_num = true;
					}
					break;
				case "hani2":
					if(preg_match("/^[0-9]+$/", $_POST["hani21"])) {
						$symbol1   = "<";
						$hani1     = $_POST["hani21"];
						$check_num = true;
					}
					break;
				case "hani3":
					if(preg_match("/^[0-9]+$/", $_POST["hani31"]) && preg_match("/^[0-9]+$/", $_POST["hani32"])) {
						$symbol1   = ">";
						$symbol2   = "<";
						$hani1     = $_POST["hani31"];
						$hani2     = $_POST["hani32"];
						$check_num = true;
					}
					break;
				case "hani4":
					if(preg_match("/^[0-9]+$/", $_POST["hani41"])) {
						$symbol1   = ">=";
						$hani1     = $_POST["hani41"];
						$check_num = true;
					}
					break;
				case "hani5":
					if(preg_match("/^[0-9]+$/", $_POST["hani51"])) {
						$symbol1   = "<=";
						$hani1     = $_POST["hani51"];
						$check_num = true;
					}
					break;
				case "hani6":
					if(preg_match("/^[0-9]+$/", $_POST["hani61"]) && preg_match("/^[0-9]+$/", $_POST["hani62"])) {
						$symbol1   = ">=";
						$symbol2   = "<=";
						$hani1     = $_POST["hani61"];
						$hani2     = $_POST["hani62"];
						$check_num = true;
					}
					break;
				default:
					break;
			}

			// 平均値チェックボックス取得
			if(!empty($_POST["check1"])) {
				$check1 = $_POST["check1"];
			} else {
			}
			// データ個数チェックボックス取得
			if(!empty($_POST["check2"])) {
				$check2 = $_POST["check2"];
			} else {
			}

			print "<h1>検索結果</h1>";
			//*******************************************************************
				$s = mysqli_connect("localhost", "root", "mysqlpass", "00rd001");

				if (!$s) {
					print	("Error: Unable to connect to MySQL." . PHP_EOL);
					print	("Debugging errno: " . mysqli_connect_errno() . PHP_EOL);
					print	("Debugging error: " . mysqli_connect_error() . PHP_EOL);
					exit;
				}
			//*******************************************************************

			//*******************************************************************
				$sql = "SELECT C_ID as ID, C_Name as 会社名, C_Address as 住所, C_Yoshin as 与信限度額, C_Other as その他 FROM customer";
				$res = mysqli_query($s, $sql);
			//*******************************************************************

			// テーブル「customer」の全データを表示する。
			print	("<table border = ''>");
				print	("<caption>全データ</caption>");
				/*print	("<thead>");
					print	("<tr>");
						while($row = mysqli_fetch_assoc($res)) {
							print	("<th>".$row['name']."</th>");
						}
					print	("</tr>");
				print	("</thead>");*/
				print	("<thead>");
					print	("<tr>");
						print	("<th>ID</th>");
						print	("<th>会社名</th>");
						print	("<th>住所</th>");
						print	("<th>与信限度額</th>");
						print	("<th>その他</th>");
					print	("</tr>");
				print	("</thead>");
				print	("<tbody>");
					while($row = mysqli_fetch_array($res)) {
						print	("<tr>");
						for($i = 0; $i < mysqli_num_fields($res); $i++){
							print	("<td>".$row[$i]."</td>");
						}
						print	("</tr>");
					}
				print	("</tbody>");
			print	("</table>");
			mysqli_free_result($res);

			// 検索結果テーブルを作成・表示する
			if($hani == "hani0") {
				// 範囲指定なしの場合
				$sql_hani_nashi = "SELECT c_id as ID, c_name as 会社名, c_address as 住所, c_yoshin*$baisuu as 与信限度額, c_other as その他 FROM customer $limit $offset";
				$res = mysqli_query($s, $sql_hani_nashi);
				$check_num = true;
			} else {
				// 範囲指定ありの場合
				switch($hani){
					case "hani1":
						$sql_hani_ari = "SELECT c_id as ID, c_name as 会社名, c_address as 住所,c_yoshin*$baisuu as 与信限度額,c_other as その他 FROM customer WHERE c_yoshin $symbol1 $hani1";
						$res = mysqli_query($s, $sql_hani_ari);
						break;
					case "hani2":
						$sql_hani_ari = "SELECT c_id as ID, c_name as 会社名, c_address as 住所,c_yoshin*$baisuu as 与信限度額,c_other as その他 FROM customer WHERE c_yoshin $symbol1 $hani1";
						$res = mysqli_query($s, $sql_hani_ari);
						break;
					case "hani3":
						$sql_hani_ari = "SELECT c_id as ID, c_name as 会社名, c_address as 住所,c_yoshin*$baisuu as 与信限度額,c_other as その他 FROM customer WHERE c_yoshin $symbol1 $hani1 AND c_yoshin $symbol2 $hani2";
						$res = mysqli_query($s, $sql_hani_ari);
						break;
					case "hani4":
						$sql_hani_ari = "SELECT c_id as ID, c_name as 会社名, c_address as 住所,c_yoshin*$baisuu as 与信限度額,c_other as その他 FROM customer WHERE c_yoshin $symbol1 $hani1";
						$res = mysqli_query($s, $sql_hani_ari);
						break;
					case "hani5":
						$sql_hani_ari = "SELECT c_id as ID, c_name as 会社名, c_address as 住所,c_yoshin*$baisuu as 与信限度額,c_other as その他 FROM customer WHERE c_yoshin $symbol1 $hani1";
						$res = mysqli_query($s, $sql_hani_ari);
						break;
					case "hani6":
						$sql_hani_ari = "SELECT c_id as ID, c_name as 会社名, c_address as 住所,c_yoshin*$baisuu as 与信限度額,c_other as その他 FROM customer WHERE c_yoshin $symbol1 $hani1 AND c_yoshin $symbol2 $hani2";
						$res = mysqli_query($s, $sql_hani_ari);
						break;
					default:
						break;
				}
			}

			if($check_num == true) {
				print	("<br><br>");
				print	("<div class = 'arrow_div'>");
					print	("<font id = 'arrow'>↓↓↓</font>");
				print	("</div>");
				print	("<br><br>");
				if($hani == "hani0") {
					print	("MySQL文：".$sql_hani_nashi."<br><br>");
				} else {
					print	("MySQL文：".$sql_hani_ari."<br><br>");
				}
				// 条件検索したテーブル「customer」のデータを表示する。
				print	("<table border = '1' cellspacing = '0'>");
					print	("<caption>検索結果</caption>");
					/*print	("<thead>");
						print	("<tr>");
							while($row = mysqli_fetch_assoc($res)) {
								print	("<th>".$row['name']."</th>");
							}
						print	("</tr>");
					print	("</thead>");*/
					print	("<thead>");
						print	("<tr>");
							print	("<th>ID</th>");
							print	("<th>会社名</th>");
							print	("<th>住所</th>");
							print	("<th>与信限度額</th>");
							print	("<th>その他</th>");
						print	("</tr>");
					print	("</thead>");
					print	("<tbody>");
						while($row = mysqli_fetch_array($res)) {
							print	("<tr>");
							for($i = 0; $i < mysqli_num_fields($res); $i++){
								print	("<td>".$row[$i]."</td>");
							}
							print	("</tr>");
						}
					print	("</tbody>");
				print	("</table>");
				mysqli_free_result($res);

				print	("<br><br>");

				if($check1 == "checked" || $check2 == "checked") {
					print	("<table border = '1' cellspacing = '0'>");
						print	("<tr>");
							print	("<td>関数名</td>");
							print	("<td>値</td>");
						print	("</tr>");
						if($check1 == "checked"){
							//*********************************************
							$sql = "SELECT AVG(C_Yoshin*$baisuu) FROM customer";
							$res = mysqli_query($s, $sql);
							$kekka = mysqli_fetch_array($res);
							mysqli_free_result($res);
							//*********************************************
							print	("<tr>");
								print	("<td>AVG(C_Yoshin)</td>");
								print	("<td>$kekka[0]</td>");
							print	("</tr>");
						}
						if($check2 == "checked"){
							//*********************************************
							$sql = "SELECT COUNT(C_Yoshin) FROM customer";
							$res = mysqli_query($s, $sql);
							$kekka = mysqli_fetch_array($res);
							mysqli_free_result($res);
							//*********************************************
							print	("<tr>");
								print	("<td>COUNT(C_Yoshin)</td>");
								print	("<td>$kekka[0]</td>");
							print	("</tr>");
						}
					print	("</table>");
				}

				mysqli_close($s);

				//$haniを最後にパラメータから文字列に
				switch($hani) {
					case "hani1":
						$hani = "A超";
						break;
					case "hani2":
						$hani = "A未満";
						break;
					case "hani3":
						$hani = "A超B未満";
						break;
					case "hani4":
						$hani = "A以上";
						break;
					case "hani5":
						$hani = "A以下";
						break;
					case "hani6":
						$hani = "A以上B以下";
						break;
					default:
						$hani = "なし";
						break;
				}

				print	("<br>--------------------------条件--------------------------<br>");
				if(empty($baisuu)) {
					$baisuu = 'なし';
				}
				if(empty($limit)) {
					$limit = 'なし';
				}
				if(empty($offset)) {
					$offset = 'なし';
				}
				if(empty($hani1)) {
					$hani1 = 'なし';
				}
				if(empty($hani2)) {
					$hani2 = 'なし';
				}
				if(empty($check1)) {
					$check1 = 'なし';
				}
				if(empty($check2)) {
					$check2 = 'なし';
				}
				print	("倍数    = $baisuu<br>");
				print	("LIMIT   = $limit<br>");
				print	("OFFSET  = $offset<br>");
				print	("範囲指定= $hani<br>");
				print	("A       = $hani1<br>");
				print	("B       = $hani2<br>");
				print	("AVG     = $check1<br>");
				print	("COUNT   = $check2<br>");
				print	("-------------------------------------------------------<br>");

				print	("<br><br>");

				print	("<form method = 'post' action = 'jyoken01.php'>");
					print	("<input type = 'submit' name = 'back' value = '条件指定画面に戻る'>");
				print	("</form>");
			} else {
				print	("<br><br>");
				print	("入力値に不適切な値がありました。");
				print	("<br><br>");
				print	("<form method = 'post' action = 'jyoken01.php'>");
					print	("<input type = 'submit' name = 'back' value = '条件指定画面に戻る'>");
				print	("</form>");
			}
		?>
	</body>
</html>
