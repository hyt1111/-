<meta http-equiv = "content-type" content = "text/html; charset = utf-8">
<html>
	<head>
		<title>条件指定検索プログラム１</title>

		<script type = "text/javascript" language = "javascript">
			function onRadioButtonChange() {
				var flag = 0;

				check1 = document.form_input.radio1.checked;
				check2 = document.form_input.radio2.checked;
				check3 = document.form_input.radio3.checked;
				check4 = document.form_input.radio4.checked;
				check5 = document.form_input.radio5.checked;
				check6 = document.form_input.radio6.checked;

				if (check1 == true) {
					if(document.form_input.hani11.value == ""){
						flag = 1;
					}
				}
				else if (check2 == true) {
					if(document.form_input.hani21.value == ""){
						flag = 1;
					}
				}
				else if (check3 == true) {
					if(document.form_input.hani31.value == "" || document.form_input.hani32.value == ""){
						flag = 1;
					}
				}
				else if (check4 == true) {
					if(document.form_input.hani41.value == ""){
						flag = 1;
					}
				}
				else if (check5 == true) {
					if(document.form_input.hani51.value == ""){
						flag = 1;
					}
				}
				else if (check6 == true) {
					if(document.form_input.hani61.value == "" || document.form_input.hani62.value == ""){
						flag = 1;
					}
				}

				if(flag){
					window.alert('未入力項目があります。');
					return false; // 送信を中止
				}
				else{
					return true; // 送信を実行
				}
			}
		</script>
	</head>
	<body>
		<?php
			print	("<h1>条件指定検索プログラム１</h1>");
			print	("<h3>条件指定による検索</h3>");
			print	("<form method = 'post' action = 'jyoken01_syori.php' name = 'form_input' onSubmit = 'return onRadioButtonChange();'>");
				print	("<table border = '1'>");
					$comm1 = array();
					array_push($comm1, "倍数");
					array_push($comm1, "LIMIT");
					array_push($comm1, "OFFSET");
					array_push($comm1, "範囲指定");
					array_push($comm1, "");
					array_push($comm1, "");
					array_push($comm1, "");
					array_push($comm1, "");
					array_push($comm1, "");
					array_push($comm1, "");

					$comm2 = array();
					array_push($comm2, "<input type = 'number' name = 'baisuu'>");
					array_push($comm2, "<input type = 'number' name = 'limit'>");
					array_push($comm2, "<input type = 'number' name = 'offset'>");
					array_push($comm2, "<input type = 'radio' id = 'radio0' name = 'hani' value = 'hani0' checked>なし");
					array_push($comm2, "<input type = 'radio' id = 'radio1' name = 'hani' value = 'hani1'><input type = 'number' name = 'hani11'>超");
					array_push($comm2, "<input type = 'radio' id = 'radio2' name = 'hani' value = 'hani2'><input type = 'number' name = 'hani21'>未満");
					array_push($comm2, "<input type = 'radio' id = 'radio3' name = 'hani' value = 'hani3'><input type = 'number' name = 'hani31'>超<input type = 'number' name = 'hani32'>未満");
					array_push($comm2, "<input type = 'radio' id = 'radio4' name = 'hani' value = 'hani4'><input type = 'number' name = 'hani41'>以上");
					array_push($comm2, "<input type = 'radio' id = 'radio5' name = 'hani' value = 'hani5'><input type = 'number' name = 'hani51'>以下");
					array_push($comm2, "<input type = 'radio' id = 'radio6' name = 'hani' value = 'hani6'><input type = 'number' name = 'hani61'>以上<input type = 'number' name = 'hani62'>以下");

					for($i = 0; $i < 10; $i++){
						print	("<tr>");
						print	("<td>$comm1[$i]</td>");
						print	("<td>$comm2[$i]</td>");
						print	("</tr>");
					}
				print	("</table>");

				print	("<h3>追加検索</h3>");
				print	("<table border = '1'>");
					$comm3 = array();
					array_push($comm3, "<input type = 'checkbox' name = 'check1' value = 'checked'>");
					array_push($comm3, "<input type = 'checkbox' name = 'check2' value = 'checked'>");

					$comm4 = array();
					array_push($comm4, "平均値(AVG関数)");
					array_push($comm4, "データ個数(COUNT関数)");

					for($i = 0; $i < 2; $i++){
						print	("<tr>");
						print	("<td>$comm3[$i]</td>");
						print	("<td>$comm4[$i]</td>");
						print	("</tr>");
					}
				print	("</table>");

				print	("<br><br>");
				print	("<input type = 'submit' value = '検索' style = 'width:500px'>");
			print	("</form>");
		?>
	</body>
</html>
